<?php

/*
 *  Copyright (c) Nicholas Mossor Rathmann <nicholas.rathmann@gmail.com> 2009. All Rights Reserved.
 *
 *
 *  This file is part of OBBLM.
 *
 *  OBBLM is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  OBBLM is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

/*
    DEV NOTE: 
        These constants really should be replaced by the T_[OBJ|NODE]_* constants,
        but this poses in no way any problems and thus the priority to change these is virtually none.
*/
define('STATS_PLAYER', T_OBJ_PLAYER);
define('STATS_TEAM',   T_OBJ_TEAM);
define('STATS_COACH',  T_OBJ_COACH);
define('STATS_RACE',   T_OBJ_RACE);
define('STATS_STAR',   T_OBJ_STAR);
# Match groupings (nodes):
define('STATS_MATCH',    T_NODE_MATCH);
define('STATS_TOUR',     T_NODE_TOURNAMENT);
define('STATS_DIVISION', T_NODE_DIVISION);
define('STATS_LEAGUE',   T_NODE_LEAGUE);

// Translation between MySQL column match data references in the match_data table to PHP STATS_* constants.
$STATS_TRANS = array(
    STATS_PLAYER    => 'match_data.f_player_id',
    STATS_TEAM      => 'match_data.f_team_id',
    STATS_COACH     => 'match_data.f_coach_id',
    STATS_RACE      => 'match_data.f_race_id',

    STATS_MATCH     => 'match_data.f_match_id',
    STATS_TOUR      => 'match_data.f_tour_id',
    STATS_DIVISION  => 'match_data.f_did',
    STATS_LEAGUE    => 'match_data.f_lid',
);

class Stats
{


public static function getRaw($obj, array $filter, $grp, $n, array $sortRule, $setAvg)
{
    global $core_tables, $relations_obj, $relations_node, $objFields_extra, $objFields_init;
    
    $mv_keys = array(
        T_OBJ_PLAYER => 'f_pid',
        T_OBJ_STAR   => 'f_pid',
        T_OBJ_TEAM   => 'f_tid',
        T_OBJ_COACH  => 'f_cid',
        T_OBJ_RACE   => 'f_rid',
        T_NODE_TOURNAMENT => 'f_trid',
        T_NODE_DIVISION   => 'f_did',
        T_NODE_LEAGUE     => 'f_lid',
    );
    $mv_tables = array(
        T_OBJ_PLAYER => 'mv_players',
        T_OBJ_STAR   => 'mv_players',
        T_OBJ_TEAM   => 'mv_teams',
        T_OBJ_COACH  => 'mv_coaches',
        T_OBJ_RACE   => 'mv_races',
    );

    $ALL_TIME = (count(array_intersect(array_keys($filter),array_keys($relations_node))) == 0);
    
    global $cols_mv, $objFields_val0, $val0; # Dirty but efficient trick to make global from within function.
    $tbl_name_norm = $relations_obj[$obj]['tbl'];
    $tbl_name_mv   = $mv_tables[$obj];
    $cols_norm = array_keys($core_tables[$tbl_name_norm]);
    $cols_mv   = array_filter(array_keys($core_tables[$tbl_name_mv]), create_function('$c', 'return !preg_match(\'/^f_/\', $c);'));
    ###
    $objFields_val0 = array_merge(
        array_key_exists($obj, $objFields_init) ? $objFields_init[$obj] : array(),
        array_key_exists($obj, $objFields_extra) ? $objFields_extra[$obj] : array()
    );
    $val0 = ($ALL_TIME && !empty($objFields_val0)) ? '(in_array($c,array_keys($objFields_val0)) ? "'.$tbl_name_norm.'.".$objFields_val0[$c]."+" : "")' : '""';
    ###
    $cols_norm_sqlsel = implode(',', array_map(
        create_function('$c', $f1='
            global $cols_mv, $objFields_val0; 
            return '.$val0.'."'.$tbl_name_norm.'.$c AS \'".((in_array($c,$cols_mv))?"rg_":"")."$c\'\\n";'
        ), 
        $cols_norm)
    );
    $cols_mv_sqlsel = implode(',', array_map(
        create_function('$c', $f2='
            global $objFields_avg, $objFields_val0; 
            return "IFNULL(".'.$val0.'."SUM('.$tbl_name_mv.'.$c)'.(($setAvg) ? '".(in_array($c,$objFields_avg) ? "/SUM('.$tbl_name_mv.'.played)" : "")."' : "").',0) AS \'mv_$c\'\\n";'
        ), 
        $cols_mv)
    );
  
    if (!empty($sortRule)) {
        for ($i = 0; $i < count($sortRule); $i++) {
            $str = $sortRule[$i];
#            $str = preg_replace('/mv\_/', $tbl_name_mv.'.', $str); # MV fields.
#            $str = preg_replace('/rg\_/', $tbl_name_norm.'.', $str); # Regular/all-time fields
            $sortRule[$i] = substr($str, 1, strlen($str)) .' '. (($str[0] == '+') ? 'ASC' : 'DESC');
        }
    }
    
    $query = "SELECT $cols_mv_sqlsel,$cols_norm_sqlsel FROM $tbl_name_norm LEFT JOIN $tbl_name_mv ON ".$mv_keys[$obj].'='.$relations_obj[$obj]['id'];

    $and = false;
    if (!empty($filter)) {
        $query .= " WHERE ";
        foreach ($filter as $filter_key => $id) {
            if (is_numeric($id) && is_numeric($filter_key)) {
                $query .= (($and) ? ' AND ' : ' ').(($obj == $filter_key) ? $relations_obj[$filter_key]['id'] : $mv_keys[$filter_key])." = $id ";
                $and = true;
            }
        }
    }

    $query .= " 
        ".((!empty($grp))       ? " GROUP BY ".$relations_obj[$grp]['id'] : '')." 
        ".((!empty($sortRule))  ? ' ORDER BY '.implode(', ', $sortRule) : '')." 
        ".((is_numeric($n))     ? " LIMIT $n" : '')." 
    ";

    $ret = array();
    if (($result = mysql_query($query)) && is_resource($result) && mysql_num_rows($result) > 0) {
        while ($r = mysql_fetch_assoc($result)) {
            array_push($ret, $r);
        }
    }
#    echo $query;
    return $ret;
}

/***************
 *   Pull out leaders of a specific stat (or multiple).
 ***************/
public static function getLeaders($obj, $node, $node_id, array $stats, $N, $setAvg = false)
{
    return self::getRaw($obj, ($node) ? array($node => $node_id) : array(), $obj, $N, $stats, $setAvg);
}

/***************
 *   Fetches summed data from match_data by applying the filter specifications.
 ***************/
public static function getStats($obj, $obj_id, $node, $node_id, $setAvg)
{
    return self::getRaw($obj, array($obj => $obj_id, $node => $node_id), false,false,array(),$setAvg);
}

/***************
 *   Returns object (team, coach, player and race) stats in array form ready to be assigned as respective object properties/fields.
 ***************/
public static function getAllStats($obj, $obj_id, $node, $node_id, $setAvg = false)
{
    list($ach) = Stats::getStats($obj, $obj_id, $node, $node_id, $setAvg);
    $stats = array_merge($ach, array());
    return $stats;
}

/*
 *
 *  The below methods use the by ($obj, $obj_id) against ($opp_obj, $opp_obj_id) in ($node, $node_id) format for fetching data.
 *  $obj and $obj_id are required!
 *
 */

public static function getMatches($obj, $obj_id, $node, $node_id, $opp_obj, $opp_obj_id, $n = false, $mkObjs = false, $getUpcomming = false)
{
    $matches = array(); // Return structure.
    
    if ($opp_obj && $opp_obj_id) {list($from,$where,$tid,$tid_opp) = Stats::buildCrossRefQueryComponents($obj, $obj_id, $node, $node_id, $opp_obj, $opp_obj_id);}
    else                         {list($from,$where,$tid)          = Stats::buildQueryComponents($obj, $obj_id, $node, $node_id);}

    $query = "
        SELECT 
            DISTINCT(match_id) AS 'match_id', 
            IF((team1_id = $tid AND team1_score > team2_score) OR (team2_id = $tid AND team1_score < team2_score), 'W', IF(team1_score = team2_score, 'D', 'L')) AS 'result' 
        FROM ".implode(', ', $from)." 
        WHERE 
                date_played IS ".(($getUpcomming) ? '' : 'NOT')." NULL 
            AND match_id > 0 
            AND ".implode(' AND ', $where)." 
        ORDER BY date_played DESC ".(($n) ? " LIMIT $n" : '');
    $result = mysql_query($query);
    if (is_resource($result) && mysql_num_rows($result) > 0) {
        while ($r = mysql_fetch_assoc($result)) {
            if ($mkObjs) {
                $m = new Match($r['match_id']);
                $m->result = $r['result'];
                $matches[] = $m;
            }
            else {
                $matches[] = $r['match_id'];
            }
        }
    }

    return $matches;
}

/***************
 *   Below are query builder helper functions.
 ***************/
private static function buildQueryComponents($obj, $obj_id, $node, $node_id, $TTS = '') # TTS = Teams Table Suffix
{
    /*
        Builds query components allowing you to address specific groups of matches in the "matches" table.
        For example if wanted matches by team_id = 5 then set $obj = STATS_TEAM and $obj_id = 5, 
            if further matches only from a specific node type are wanted, say division_id = 7, then set $node = STATS_DIVISION with $node_id = 7.

        
        $TTS (teams table suffix):
        Because this function can be used to compile two query sets via buildCrossRefQueryComponents() and joined we need to be able to 
            differentiate between two different "teams" tables, for example, which we can do by allowing custom suffixes for all tables.
        The name "TEAMS table suffix" is a little misleading - just forget it says "teams", it's for all tables, not just "teams" tables.
    */
    
    $from = array('matches','tours','divisions'); // We don't need to add the "leagues" table, since league IDs can be referenced via the "f_lid" key in the divisions table.
    $where = array("matches.f_tour_id = tours.tour_id", "tours.f_did = divisions.did");
    if ($node && $node_id) {
        switch ($node)
        {
            case STATS_TOUR:        $where[] = "matches.f_tour_id   = $node_id"; break;
            case STATS_DIVISION:    $where[] = "tours.f_did         = $node_id"; break;
            case STATS_LEAGUE:      $where[] = "divisions.f_lid     = $node_id"; break;
        }
    }

    switch ($obj)
    {
        case STATS_PLAYER:  
            array_push($from, "teams AS teams$TTS", "players AS players$TTS"); # Also use $TTS for players table: If not included calling buildCrossRefQueryComponents() will accidentally create two tables with identical names (if comparing two players).
            $tid = "teams$TTS.team_id";
            array_push($where, "players$TTS.player_id = $obj_id", "players$TTS.owned_by_team_id = $tid");
            
            // We must add the below, else above is equivalent to the player's team match stats. Ie. matches this player did not compete in will be counted as played!
            $from[]    = "(SELECT DISTINCT(f_match_id) AS 'p_mid' FROM match_data WHERE f_player_id = $obj_id AND mg IS FALSE) AS pmatches$TTS"; # Also use $TTL here, same reason as above for players table.
            $where[]   = "match_id = pmatches$TTS.p_mid";
            break;
            
        case STATS_TEAM:
//            array_push($from, "");
            $tid = $obj_id;
//            array_push($where, "");
            break;
            
        case STATS_RACE:
            array_push($from, "teams AS teams$TTS");
            $tid = "teams$TTS.team_id";
            array_push($where, "teams$TTS.f_race_id = $obj_id");
            break;
            
        case STATS_COACH:  
            array_push($from, "teams AS teams$TTS");
            $tid = "teams$TTS.team_id";
            array_push($where, "teams$TTS.owned_by_coach_id = $obj_id");
            break;
    }
    
    $where[] = "(team1_id = $tid OR team2_id = $tid)";

    return array($from,$where,$tid);
}

private static function buildCrossRefQueryComponents($obj, $obj_id, $node, $node_id, $opp_obj, $opp_obj_id)
{
    /*
        Like buildQueryComponents() but allows further filtering by selected only those matches which 
            has a specific opponent of STATS_* type = $opp_obj with ID = $opp_obj_id.
    */

    // As ordinarally done, when not cross referencing:
    list($from,$where,$tid) = Stats::buildQueryComponents($obj, $obj_id, $node, $node_id);
    
    // Now filter matches only showing those against a specific opponent:
    list($from_opp,$where_opp,$tid_opp) = Stats::buildQueryComponents($opp_obj, $opp_obj_id, $node, $node_id, '2');
    $where[] = "(team1_id = $tid_opp OR team2_id = $tid_opp)";
    $from = array_merge($from, array_values(array_diff($from_opp, $from)));
    $where = array_merge($where, array_values(array_diff($where_opp, $where)));

    return array($from,$where,$tid,$tid_opp);
}

}

?>
