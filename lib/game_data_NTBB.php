<?php

/*
 *  Copyright (c) Daniel Straalman <email is protected> 2009-2010. All Rights Reserved.
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

 
To enable these races you do not need to manually edit the game data as stated above — files are also provided with these races.
Simply open the header.php file and change the line
require_once('lib/game_data_lrb6.php');
require_once('lib/game_data_NTBB.php'); */

require('lib/game_data_lrb6.php');

/*
 * Game data replacement for Narrow Tier Blood Bowl rules (NTBB).
 */

// Changes to present teams/positionals from LRB6 to NTBB 2012.
/*
$DEA['Amazon']['players']['Blitzer']['norm'] = array ('G', 'A', 'S'); 				//Amazons Gain Normal Access to A
$DEA['Amazon']['players']['Blitzer']['doub'] = array ('P'); 						//Amazons Gain Normal Access to A (Removed from Doubles Skills)
$DEA['Amazon']['players']['Blitzer']['def'] = array (23, 14); 						//Amazons Blitzers Lose Block and Gain Wrestle
$DEA['Amazon']['players']['Catcher']['def'] = array (23, 20, 21); 					//Amazons Catchers Gain Diving Catch
$DEA['Amazon']['players']['Linewoman']['norm'] = array ('G', 'A'); 					//Amazons Gain Normal Access to A
$DEA['Amazon']['players']['Linewoman']['doub'] = array ('S', 'P'); 					//Amazons Gain Normal Access to A (Removed from Doubles Skills)
$DEA['Amazon']['players']['Thrower']['norm'] = array ('G', 'A', 'P'); 				//Amazons Gain Normal Access to A
$DEA['Amazon']['players']['Thrower']['doub'] = array ('S'); 						//Amazons Gain Normal Access to A (Removed from Doubles Skills)
$DEA['Dwarf']['players']['Troll Slayer']['def'] = array (2, 5, 53, 59);				//Dwarf Troll Slayer Lose Block and Gain Juggernaught
$DEA['Orc']['players']['Blitzer']['cost'] = 90000; 									//Orc Blitzer Increase Price to 90k (+10k)
$DEA['Undead']['players']['Mummy']['def'] = array (51, 103); 						//Undead Mummy Lose Mighty Blow and Gain Grab
$DEA['Wood Elf']['players']['Wardancer']['def'] = array (23, 4, 25); 				//Elf Wardancer become Dodge, Leap, Fend
$DEA['Underworld']['other']['rr_cost'] = 60000; 									//Underworld ReRolls reduced to 60k (-10k)
$DEA['Vampire']['players']['Thrall']['def'] = array (59); 							//Vampire Thralls Gain Thick Skull
																					//Halfling Catchers added to gamedata.php currently set to QTY=0
$DEA['Halfling']['players']['Halfling Lineman']['av'] = 7; 							//Halfling Lineman AV Increased to 7 (+1)
$DEA['Ogre']['other']['rr_cost'] = 60000; 											//Ogre ReRolls reduced to 60k (-10k)
$DEA['Ogre']['players']['Ogre']['cost'] = 130000; 									//Ogre Ogres Cost Reduced to 130k (-10k)
$DEA['Ogre']['players']['Snotling']['ma'] = 6; 										//Ogre Snotlind MA Increased to 6 (+1)
$DEA['Ogre']['players']['Snotling']['av'] = 6; 										//Ogre Snotlind AV Increased to 6 (+1)
$DEA['Slann']['players']['Blitzer']['cost'] = 100000; 								//Slann Blitzer cost reduced to 100k (-10k)
$DEA['Goblin']['players']['Troll']['def'] = array (90, 54, 102, 103, 110);			//Gobling Trolls lose Loner
$DEA['Goblin']['players']['Looney']['def'] = array (27, 95, 105, 108);			    //Goblin Secret Weapons Gain Sneaky Git
$DEA['Goblin']['players']['Fanatic']['def'] = array (27, 91, 100, 105, 108);			
$DEA['Goblin']['players']['Bombardier']['def'] = array (27, 93, 23, 105, 108);
$DEA['Goblin']['players']['Looney']['cost'] = 50000;								//Goblin Secret Weapons Gain 10k cost
$DEA['Goblin']['players']['Fanatic']['cost'] = 80000;
$DEA['Goblin']['players']['Bombardier']['cost'] = 50000;
*/


// Changes to inducements from LRB6 to CRP+.
$inducements['Wizard']['cost'] = 200000; # CRP+ Value.
$inducements['Wizard']['reduced_cost'] = 200000; # CRP+ Value.
 
$DEA['Human']['players']['Ogre']['cost'] = 130000; 									//Human Ogre Reduced to 130k (-10k)
$DEA['Human']['players']['Catcher']['av'] = 8; 										//Human Catcher AV Increased to 8 (+1)
$DEA['Khemri']['players']['Thro-Ra']['def'] = array (45, 103, 12, 59); 				//Khemri Thro-Ra Gain Thick Skull
$DEA['Khemri']['players']['Blitz-Ra']['def'] = array (1, 103, 59); 					//Khemri Thro-Ra Gain Thick Skull
$DEA['Khemri']['players']['Tomb Guardian']['def'] = array (50, 103); 				//Khemri Tomb Guardians Lose Decay and Gain Break Tackle
$DEA['Khemri']['players']['Tomb Guardian']['cost'] = 110000; 						//Khemri Tomb Guardians cost increased to 110k (+10k)
$DEA['Khemri']['players']['Tomb Guardian']['av'] = 8; 								//Khemri Tomb Guardians AV Reduced to 8 (-1)
?>
