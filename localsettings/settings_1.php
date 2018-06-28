<?php

/*************************
 * Local settings for league with ID = 1
 *************************/

/*********************
 *   General
 *********************/

$settings['league_name'] = 'Daventry Vaulters League'; // Name of the site or the league name if only one league is being managed.
$settings['league_url']      = 'http://www.daventryvaulters.co.uk/forum/viewforum.php?f=53'; // URL of league forum, if you have such. If not then leave this empty, that is = '' (two quotes only).
$settings['league_url_name'] = 'Forum';   // Button text for league URL.
$settings['stylesheet']      = 1;                  // Default is 1. OBBLM CSS stylesheet for non-logged in guests. Currently stylesheet 1 is the only existing stylesheet.
$settings['lang']            = 'en-GB';            // Default language. Existing: en-GB, es-ES, de-DE, fr-FR, it-IT.
$settings['fp_links']        = true;               // Default is true. Generate coach, team and player links on the front page?
$settings['welcome']     = '<p>Welcome to The Daventry Vaulters Blood Bowl League.</p>
<p>Contact Harroguk on The Daventry Vaulters Forum and he will create you an account and give you your login details.</p>
<p>Login to this page then use your Coaches Corner (CC) to create your starting team.</p>
<p>Once you will be automatically entered into the next League that starts.</p>';
$settings['rules']           = '<p>In order to cover the associated costs of running the Leauge there is a entrance fee for each <b>20 Week/10 Round</b> season. Please use the PayPal module below to pay your entry fee of £5.</p> 

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="Q25GS76MMHQFA">
<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal — The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>





<p>This fee is used to cover the costs of the website and website software, trohpy for the winner of the league and the engraving on the trophy, ancillary items used for tournaments such as StreetBowl Boards as well as many other minor things that cost a little bit of money, all those little bits add up to too much for my pocket. <br><br> --Harroguk</p>
';
$settings['tourlist_foldup_fin_divs'] = false; // Default is false. If true the division nodes in the tournament lists section will automatically be folded up if all child tournaments in that division are marked as finished.
$settings['tourlist_hide_nodes'] = array('league', 'division', 'tournament'); // Default is array('league', 'division', 'tournament'). In the section tournament lists these nodes will be hidden if their contents (children) are finished. Example: If 'division' is chosen here, and all tours in a given division are finished, then the division entry will be hidden.

/*********************
 *   Rules
 *********************/

// Please use the boolean values "true" and "false" wherever default values are boolean.

$rules['max_team_players']      = 16;       // Default is 16.
$rules['static_rerolls_prices'] = false;    // Default is "false". "true" forces re-roll prices to their un-doubled values.
$rules['player_refund']         = 0;        // Player sell value percentage. Default is 0 = 0%, 0.5 = 50%, and so on.
$rules['journeymen_limit']      = 11;       // Until a team can field this number of players, it may fill team positions with journeymen.
$rules['post_game_ff']          = false;    // Default is false. Allows teams to buy and drop fan factor even though their first game has been played.

$rules['initial_treasury']      = 1000000;  // Default is 1000000.
$rules['initial_rerolls']       = 0;        // Default is 0.
$rules['initial_fan_factor']    = 0;        // Default is 0.
$rules['initial_ass_coaches']   = 0;        // Default is 0.
$rules['initial_cheerleaders']  = 0;        // Default is 0.

// For the below limits, the following applies: -1 = unlimited. 0 = disabled.
$rules['max_rerolls']           = -1;       // Default is -1.
$rules['max_fan_factor']        = 9;        // Default is 9.
$rules['max_ass_coaches']       = -1;       // Default is -1.
$rules['max_cheerleaders']      = -1;       // Default is -1.

/*********************
 *   Standings pages
 *********************/

$settings['standings']['length_players'] = 150;  // Number of entries on the general players standings table.
$settings['standings']['length_teams']   = 30;  // Number of entries on the general teams   standings table.
$settings['standings']['length_coaches'] = 30;  // Number of entries on the general coaches standings table.

/*********************
 *   Front page messageboard
 *********************/

$settings['fp_messageboard']['length']               = 20;    // Number of entries on the front page message board.
$settings['fp_messageboard']['show_team_news']       = true; // Default is true. Show team news on the front page message board.
$settings['fp_messageboard']['show_match_summaries'] = true; // Default is true. Show match summaries on the front page message board.

/*********************
 *   Front page boxes
 *********************/

/*
    The below settings define which boxes to show on the right side of the front page.

    Note, every box MUST have a UNIQUE 'box_ID' number.
    The box IDs are used to determine the order in which the boxes are shown on the front page.
    The box with 'box_ID' = 1 is shown at the top of the page, the box with 'box_ID' = 2 is displayed underneath it and so forth.
*/

/*********************
 *   Front page: tournament standings boxes
 *********************/

$settings['fp_standings'] = array(
    # This will display a standings box of the top 6 teams in tournament with ID = x
    array(
        'id'     => 1,
        'box_ID' => 1,
        'type'   => 'tournament',
        'HRS'    => 5,		
        'title'  => '1st Division',
        'length' => 6,
		'infocus' => true, # If true a random team from the standings will be selected and its top players displayed.
        # Format: "Displayed table column name" => "OBBLM field name".
                'fields' => array('Name' => 'name',  'P' => 'played', 'W' => 'won', 'D' => 'draw', 'L' => 'lost', 'TDCAS' => 'tdcas', 'PTS' => 'pts'),
    ),
	array(
        'id'     => 2,
        'box_ID' => 2,
        'type'   => 'tournament',
        'HRS'    => 5,	
        'title'  => '2nd Division',
        'length' => 10,
		'infocus' => false,
        # Format: "Displayed table column name" => "OBBLM field name".
                'fields' => array('Name' => 'name',  'P' => 'played', 'W' => 'won', 'D' => 'draw', 'L' => 'lost', 'TDCAS' => 'tdcas', 'PTS' => 'pts'),
    ),
/*	array(
        'id'     => 106,
        'box_ID' => 3,
        'type'   => 'tournament',
        'HRS'    => 5,	
        'title'  => '3rd Division',
        'length' => 8,
		'infocus' => false,
        # Format: "Displayed table column name" => "OBBLM field name".
                'fields' => array('Name' => 'name',  'P' => 'played', 'W' => 'won', 'D' => 'draw', 'L' => 'lost', 'TDCAS' => 'tdcas', 'PTS' => 'pts'),
    ),
/*	array(
        'id'     => 99,
        'box_ID' => 4,
        'type'   => 'tournament',
        'HRS'    => 5,	
        'title'  => '4th Division',
        'length' => 6,
		'infocus' => false,
        # Format: "Displayed table column name" => "OBBLM field name".
                'fields' => array('Name' => 'name',  'P' => 'played', 'W' => 'won', 'D' => 'draw', 'L' => 'lost', 'TDCAS' => 'tdcas', 'PTS' => 'pts'),
    ),
	array(
        'id'     => 72,
        'box_ID' => 5,
        'type'   => 'tournament',
        'HRS'    => 5,	
        'title'  => '5th Division',
        'length' => 6,
        # Format: "Displayed table column name" => "OBBLM field name".
                'fields' => array('Name' => 'name',  'P' => 'played', 'W' => 'won', 'D' => 'draw', 'L' => 'lost', 'TDCAS' => 'tdcas', 'PTS' => 'pts'),
    ),*/
);

/*********************
 *   Front page: leaders boxes
 *********************/

/* Front page leaders boxes */

$settings['fp_leaders'] = array(
    # Please note: You can NOT make expressions out of leader fields e.g.: 'field' => 'cas+td'
    # This will display a 'most CAS' player leaders box for the tournament with ID = xx
    array(
        'id'     => 3,
        'box_ID' => 7,
		'type'      => 'league', # This sets the node to be a tournament. I.e. this will make a leaders box for the tournament with ID = 1		
        'show_team' => true, # Show player's team name?
        'title'  => 'Headbashers, Most Casualties',  
        'field'  => 'cas',
        'length' => 10,
    ),
			# This will display a 'most Kills' player leaders box for the tournament with ID = xx
    array(
        'id'     => 3,
        'box_ID' => 8,
		'type'      => 'league', # This sets the node to be a tournament. I.e. this will make a leaders box for the tournament with ID = 1		
        'show_team' => true, # Show player's team name?
        'title'  => 'Exterminators, Most Kills',  
        'field'  => 'ki',
        'length' => 10,
    ),

    # This will display a 'most TD' player leaders box for the tournament with ID = xx
    array(
        'id'     => 3,
        'box_ID' => 9,
		'type'      => 'league', # This sets the node to be a tournament. I.e. this will make a leaders box for the tournament with ID = 1		
        'show_team' => true, # Show player's team name?
        'title'  => 'Scoring Machines, Most TD',  
        'field'  => 'td',
        'length' => 10,
    ),

	# This will display a 'most CP' player leaders box for the tournament with ID = xx
    array(
        'id'     => 3,
        'box_ID' => 10,
		'type'      => 'league', # This sets the node to be a tournament. I.e. this will make a leaders box for the tournament with ID = 1		
        'show_team' => true, # Show player's team name?
        'title'  => 'Eagle Eyes, Most CP',  
        'field'  => 'cp',
        'length' => 10,
    ),

		# This will display a 'most SPP' player leaders box for the tournament with ID = xx
    array(
        'id'     => 3,
        'box_ID' => 11,
		'type'      => 'league', # This sets the node to be a tournament. I.e. this will make a leaders box for the tournament with ID = 1		
        'show_team' => true, # Show player's team name?
        'title'  => 'Superstars, Most SPP',  
        'field'  => 'spp',
        'length' => 10,
    ),
		# This will display a 'most Games Played' player leaders box for the tournament with ID = xx
    array(
        'id'     => 3,
        'box_ID' => 12,
		'type'      => 'league', # This sets the node to be a tournament. I.e. this will make a leaders box for the tournament with ID = 1		
        'show_team' => true, # Show player's team name?
        'title'  => 'Lifers, Most Games Played',  
        'field'  => 'played',
        'length' => 10,
    ),


);

/*********************
 *   Front page: event boxes
 *********************/

$settings['fp_events'] = array(
    /*
        Event boxes can show for any league, division or tournament the following:
            dead        - recent dead players
            sold        - recent sold players
            hired       - recent hired players
            skills      - recent player skill picks
    */
	    array(
        'id'        => 3,
        'box_ID'    => 14,
        // Please note: 'type' may be either one of: 'league', 'division' or 'tournament'
        'type'      => 'league', # This sets the node to be a tournament. I.e. this will make an event box for the tournament with ID = 1
        'title'     => 'Recently Skilled Up',
        'content'   => 'skills',
        'length'    => 6,
    ),
		array(
        'id'        => 3,
        'box_ID'    => 15,
        // Please note: 'type' may be either one of: 'league', 'division' or 'tournament'
        'type'      => 'league', # This sets the node to be a tournament. I.e. this will make an event box for the tournament with ID = 1
        'title'     => 'Recently Killed',
        'content'   => 'dead',
        'length'    => 6,
    ),
	    array(
        'id'        => 3,
        'box_ID'    => 16,
        // Please note: 'type' may be either one of: 'league', 'division' or 'tournament'
        'type'      => 'league', # This sets the node to be a tournament. I.e. this will make an event box for the tournament with ID = 1
        'title'     => 'Recently Retired',
        'content'   => 'sold',
        'length'    => 6,
    ),

		    array(
        'id'        => 3,
        'box_ID'    => 17,
        // Please note: 'type' may be either one of: 'league', 'division' or 'tournament'
        'type'      => 'league', # This sets the node to be a tournament. I.e. this will make an event box for the tournament with ID = 1
        'title'     => 'Recently Hired',
        'content'   => 'hired',
        'length'    => 6,
    ),
);

/*********************
 *   Front page: latest games boxes
 *********************/

$settings['fp_latestgames'] = array(
    # This will display a latest games box for the node (league, division or tournament) with ID = 3
    array(
        'id'     => 1,
        'box_ID' => 6,
        // Please note: 'type' may be either one of: 'league', 'division' or 'tournament'
        'type'   => 'league', # This sets the node to be a league. I.e. this will make a latest games box for the league with ID = 3
        'title'  => 'Recent games for The Daventry Vaulters',
        'length' => 7,
    ),
);

