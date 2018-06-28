<?php

/*************************
 * Local settings for league with ID = 6
 *************************/
 
/* General */

$settings['league_name'] = 'Rugby League'; // Name of the site or the league name if only one league is being managed.
$settings['forum_url']   = 'http://www.daventryvaulters.co.uk/forum/viewforum.php?f=53'; // URL of league forum, if you have such. If not then leave this empty, that is = '' (two quotes only).
$settings['stylesheet']  = 1;                  // Default is 1. OBBLM CSS stylesheet for non-logged in guests. Currently stylesheet 1 and 2 are the only existing stylesheets.
$settings['lang']        = 'en-GB';            // Default language. Existing: en-GB, es, de, fr.
$settings['fp_links']    = true;               // Default is true. Generate coach, team and player links on the front page?
$settings['welcome']     = 'Welcome to Rugby Blood Bowl League.<br><br>Contact <b>lordgabriel</b> on The Daventry Vaulters Forum and he will create you an account and give you your login details.<br><br>Login to this page then use your Coaches Corner (CC) to create your starting team.<br><br>Once you will be automatically entered into the next League that starts.';
$settings['rules']       = '<a href=http://www.level10.org/wiki/index.php/Main_Page>Blood Bowl Rules Wiki</a>';
$settings['leegmgr_botocs'] = False;

/* Standings pages */

$settings['standings']['length_players'] = 400;  // Number of entries on the general players standings table.
$settings['standings']['length_teams']   = 30;  // Number of entries on the general teams   standings table.
$settings['standings']['length_coaches'] = 30;  // Number of entries on the general coaches standings table.

/* Front page messageboard */

$settings['fp_messageboard']['length']               = 15;    // Number of entries on the front page message board.
$settings['fp_messageboard']['show_team_news']       = true; // Default is true. Show team news on the front page message board.
$settings['fp_messageboard']['show_match_summaries'] = true; // Default is true. Show match summaries on the front page message board.

/*
    The below settings define which boxes to show on the right side of the front page.
    
    Note, every box MUST have a unique 'box_ID' number.
    The box IDs are used to determine the order in which the boxes are shown on the front page.
    The box with 'box_ID' = 1 is shown at the top of the page, the box with 'box_ID' = 2 is displayed underneath it and so forth.
*/

/* Front page tournament standings boxes */

$settings['fp_standings'] = array(
    # This will display a standings box of the top teams in tournament with ID = 38
    array(
        'id'     => 59,
        'box_ID' => 1,
        'type'   => 'tournament',
        'HRS'    => 5,		
        'title'  => 'Dvision 1',
        'length' => 15,
        # Format: "Displayed table column name" => "OBBLM field name".
                'fields' => array('Name' => 'name',  'P' => 'played', 'W' => 'won', 'D' => 'draw', 'L' => 'lost', 'TDCAS' => 'tdcas', 'PTS' => 'pts'),
    ),

);

/* Front page latest games boxes */

$settings['fp_latestgames'] = array(
    # This will display a latest games box for the node (league, division or tournament) with ID = 3
    array(
        'id'     => 7,
        'box_ID' => 2,
        // Please note: 'type' may be either one of: 'league', 'division' or 'tournament'
        'type'   => 'league', # This sets the node to be a league. I.e. this will make a latest games box for the league with ID = 6
        'title'  => 'Recent games for Stunty League',
        'length' => 8,
    ),
);

/* Front page leaders boxes */

$settings['fp_leaders'] = array(
    # Please note: You can NOT make expressions out of leader fields e.g.: 'field' => 'cas+td'
    # This will display a 'most CAS' player leaders box for the tournament with ID = xx
    array(
        'id'     => 59,
        'box_ID' => 3,
		'type'      => 'tournament', # This sets the node to be a tournament. I.e. this will make a leaders box for the tournament with ID = 1		
        'show_team' => true, # Show player's team name?
        'title'  => 'Most Dangerous Players',  
        'field'  => 'cas',
        'length' => 3,
    ),
    # This will display a 'most TD' player leaders box for the tournament with ID = xx
    array(
        'id'     => 59,
        'box_ID' => 4,
		'type'      => 'tournament', # This sets the node to be a tournament. I.e. this will make a leaders box for the tournament with ID = 1		
        'show_team' => true, # Show player's team name?
        'title'  => 'Most Touchdowns Scored',  
        'field'  => 'td',
        'length' => 3,
    ),
	# This will display a 'most CP' player leaders box for the tournament with ID = xx
    array(
        'id'     => 59,
        'box_ID' => 5,
		'type'      => 'tournament', # This sets the node to be a tournament. I.e. this will make a leaders box for the tournament with ID = 1		
        'show_team' => true, # Show player's team name?
        'title'  => 'Most Completed Passes',  
        'field'  => 'cp',
        'length' => 3,
    ),
		# This will display a 'most SPP' player leaders box for the tournament with ID = xx
    array(
        'id'     => 59,
        'box_ID' => 6,
		'type'      => 'tournament', # This sets the node to be a tournament. I.e. this will make a leaders box for the tournament with ID = 1		
        'show_team' => true, # Show player's team name?
        'title'  => 'Man of the Season',  
        'field'  => 'spp',
        'length' => 3,
    ),
);



?>
