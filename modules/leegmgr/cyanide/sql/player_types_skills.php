<?php

$_t_player_types_skills = 
'
DROP TABLE IF EXISTS "Player_Type_Skills";
CREATE TABLE Player_Type_Skills (ID INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,idPlayer_Types INTEGER ,idSkill_Listing INTEGER ,DESCRIPTION VARCHAR(255) );
';

$_dat_palyer_types_skills = 
"
INSERT INTO player_type_skills VALUES (1, 2, 7, 'Human Catcher Dodge');
INSERT INTO player_type_skills VALUES (2, 2, 6, 'Human Catcher Catch');
INSERT INTO player_type_skills VALUES (3, 3, 47, 'Human Thrower Pass');
INSERT INTO player_type_skills VALUES (4, 3, 61, 'Human Thrower Sure Hands');
INSERT INTO player_type_skills VALUES (5, 4, 30, 'Human Blitzer Block');
INSERT INTO player_type_skills VALUES (6, 5, 31, 'Human Ogre Bone-Head');
INSERT INTO player_type_skills VALUES (7, 5, 13, 'Human Ogre Mighty Blow');
INSERT INTO player_type_skills VALUES (8, 5, 63, 'Human Ogre Thick Skull');
INSERT INTO player_type_skills VALUES (9, 5, 64, 'Human Ogre Throw Team-Mate');
INSERT INTO player_type_skills VALUES (10, 5, 44, 'Human Ogre Loner');
INSERT INTO player_type_skills VALUES (11, 6, 30, 'Dwarf Blocker Block');
INSERT INTO player_type_skills VALUES (12, 6, 63, 'Dwarf Blocker Thick Skull');
INSERT INTO player_type_skills VALUES (13, 6, 57, 'Dwarf Blocker Tackle');
INSERT INTO player_type_skills VALUES (14, 7, 61, 'Dwarf Runner Sure Hands');
INSERT INTO player_type_skills VALUES (15, 7, 63, 'Dwarf Runner Thick Skull');
INSERT INTO player_type_skills VALUES (16, 8, 63, 'Dwarf Blitzer Thick Skull');
INSERT INTO player_type_skills VALUES (17, 8, 30, 'Dwarf Blitzer Block');
INSERT INTO player_type_skills VALUES (18, 9, 30, 'Dwarf TrollSlayer Block');
INSERT INTO player_type_skills VALUES (19, 9, 63, 'Dwarf TrollSlayer Thick Skull');
INSERT INTO player_type_skills VALUES (20, 9, 26, 'Dwarf TrollSlayer Dauntless');
INSERT INTO player_type_skills VALUES (21, 9, 36, 'Dwarf TrollSlayer Frenzy');
INSERT INTO player_type_skills VALUES (27, 12, 6, 'Wood Elf Catcher Catch');
INSERT INTO player_type_skills VALUES (28, 12, 7, 'Wood Elf Catcher Dodge');
INSERT INTO player_type_skills VALUES (29, 13, 47, 'Wood Elf Thrower Pass');
INSERT INTO player_type_skills VALUES (30, 14, 30, 'Wood Elf Wardancer Block');
INSERT INTO player_type_skills VALUES (31, 14, 7, 'Wood Elf Wardancer Dodge');
INSERT INTO player_type_skills VALUES (32, 14, 11, 'Wood Elf Wardancer Leap');
INSERT INTO player_type_skills VALUES (33, 15, 13, 'Wood Elf Treeman Mighty Blow');
INSERT INTO player_type_skills VALUES (34, 15, 44, 'Wood Elf Treeman Loner');
INSERT INTO player_type_skills VALUES (35, 15, 17, 'Wood Elf Treeman Stand Firm');
INSERT INTO player_type_skills VALUES (36, 15, 58, 'Wood Elf Treeman Strong Arm');
INSERT INTO player_type_skills VALUES (37, 15, 63, 'Wood Elf Treeman Thick Skull');
INSERT INTO player_type_skills VALUES (38, 15, 64, 'Wood Elf Treeman ThrowTeam-Mate');
INSERT INTO player_type_skills VALUES (39, 15, 20, 'Wood Elf Treeman Take Root');
INSERT INTO player_type_skills VALUES (40, 17, 47, 'Skaven Thrower Pass');
INSERT INTO player_type_skills VALUES (41, 17, 61, 'Skaven Thrower Sure Hands');
INSERT INTO player_type_skills VALUES (42, 18, 7, 'Skaven Gutter Runner Dodge');
INSERT INTO player_type_skills VALUES (43, 19, 30, 'Skaven Blitzer Block');
INSERT INTO player_type_skills VALUES (44, 20, 36, 'Skaven Rat Ogre Frenzy');
INSERT INTO player_type_skills VALUES (45, 20, 13, 'Skaven Rat Ogre Mighty Blow');
INSERT INTO player_type_skills VALUES (46, 20, 44, 'Skaven Rat Ogre Loner');
INSERT INTO player_type_skills VALUES (47, 20, 49, 'Skaven Rat Ogre Prehensive Tail');
INSERT INTO player_type_skills VALUES (48, 20, 67, 'Skaven Rat Ogre Wild Animal');
INSERT INTO player_type_skills VALUES (49, 22, 52, 'Orc Goblin Right Stuff');
INSERT INTO player_type_skills VALUES (50, 22, 7, 'Orc Goblin Dodge');
INSERT INTO player_type_skills VALUES (51, 22, 59, 'Orc Goblin Stunty');
INSERT INTO player_type_skills VALUES (52, 23, 47, 'Orc Thrower Pass');
INSERT INTO player_type_skills VALUES (53, 23, 61, 'Orc Thrower Sure Hands');
INSERT INTO player_type_skills VALUES (54, 25, 30, 'Orc Blitzer Block');
INSERT INTO player_type_skills VALUES (55, 26, 44, 'Orc Troll Loner');
INSERT INTO player_type_skills VALUES (56, 26, 18, 'Orc Troll Always Hungry');
INSERT INTO player_type_skills VALUES (57, 26, 13, 'Orc Troll Mighty Blow');
INSERT INTO player_type_skills VALUES (58, 26, 51, 'Orc Troll Really Stupid');
INSERT INTO player_type_skills VALUES (59, 26, 19, 'Orc Troll Regeneration');
INSERT INTO player_type_skills VALUES (60, 26, 64, 'Orc Troll Throw Team-Mate');
INSERT INTO player_type_skills VALUES (61, 27, 59, 'Lizardman Skink Stunty');
INSERT INTO player_type_skills VALUES (62, 27, 7, 'Lizardman Skink Dodge');
INSERT INTO player_type_skills VALUES (63, 29, 44, 'Lizardman Kroxigor Loner');
INSERT INTO player_type_skills VALUES (64, 29, 13, 'Lizardman Kroxigor Mighty Blow');
INSERT INTO player_type_skills VALUES (65, 29, 31, 'Lizardman Kroxigor Bone-Head');
INSERT INTO player_type_skills VALUES (66, 29, 49, 'Lizardman Kroxigor PrehensiveTail');
INSERT INTO player_type_skills VALUES (67, 29, 63, 'Lizardman Kroxigor Thick Skull');
INSERT INTO player_type_skills VALUES (68, 30, 52, 'Goblin Gob Right Stuff');
INSERT INTO player_type_skills VALUES (69, 30, 7, 'Goblin Gob Dodge');
INSERT INTO player_type_skills VALUES (70, 30, 59, 'Goblin Gob Stunty');
INSERT INTO player_type_skills VALUES (71, 31, 54, 'Goblin Looney Secret Weapon');
INSERT INTO player_type_skills VALUES (72, 31, 59, 'Goblin Looney Stunty');
INSERT INTO player_type_skills VALUES (73, 31, 46, 'Goblin Looney No Hands');
INSERT INTO player_type_skills VALUES (74, 31, 25, 'Goblin Looney Chainsaw');
INSERT INTO player_type_skills VALUES (81, 34, 63, 'Chaos Minotaur Thick Skull');
INSERT INTO player_type_skills VALUES (82, 34, 13, 'Chaos Minotaur Mighty Blow');
INSERT INTO player_type_skills VALUES (83, 34, 15, 'Chaos Minotaur Horns');
INSERT INTO player_type_skills VALUES (84, 34, 36, 'Chaos Minotaur Frenzy');
INSERT INTO player_type_skills VALUES (85, 34, 44, 'Chaos Minotaur Loner');
INSERT INTO player_type_skills VALUES (86, 34, 67, 'Chaos Minotaur Wild Animal');
INSERT INTO player_type_skills VALUES (87, 32, 15, 'Chaos Beastman Horns');
INSERT INTO player_type_skills VALUES (88, 36, 44, 'Champion Grashnak Loner');
INSERT INTO player_type_skills VALUES (89, 36, 36, 'Champion Grashnak Frenzy');
INSERT INTO player_type_skills VALUES (90, 36, 15, 'Champion Grashnak Horns');
INSERT INTO player_type_skills VALUES (91, 36, 13, 'Champion Grashnak MBlow');
INSERT INTO player_type_skills VALUES (92, 36, 63, 'Champion Grashnak TSkull');
INSERT INTO player_type_skills VALUES (93, 37, 44, 'Champion Griff Loner');
INSERT INTO player_type_skills VALUES (94, 37, 30, 'Champion Griff Block');
INSERT INTO player_type_skills VALUES (95, 37, 7, 'Champion Griff Dodge');
INSERT INTO player_type_skills VALUES (96, 37, 35, 'Champion Griff Fend');
INSERT INTO player_type_skills VALUES (97, 37, 8, 'Champion Griff Sprint');
INSERT INTO player_type_skills VALUES (98, 37, 60, 'Champion Griff SFeet');
INSERT INTO player_type_skills VALUES (99, 38, 44, 'Champion Grim Loner');
INSERT INTO player_type_skills VALUES (100, 38, 36, 'Champion Grim Frenzy');
INSERT INTO player_type_skills VALUES (101, 38, 30, 'Champion Grim Block');
INSERT INTO player_type_skills VALUES (102, 38, 13, 'Champion Grim MBlow');
INSERT INTO player_type_skills VALUES (103, 38, 63, 'Champion Grim TSkull');
INSERT INTO player_type_skills VALUES (104, 38, 26, 'Champion Grim Dauntless');
INSERT INTO player_type_skills VALUES (105, 40, 44, 'Champion Jordell Loner');
INSERT INTO player_type_skills VALUES (106, 40, 30, 'Champion Jordell Block');
INSERT INTO player_type_skills VALUES (107, 40, 7, 'Champion Jordell Dodge');
INSERT INTO player_type_skills VALUES (108, 40, 28, 'Champion Jordell DivinCatch');
INSERT INTO player_type_skills VALUES (109, 40, 11, 'Champion Jordell Leap');
INSERT INTO player_type_skills VALUES (110, 40, 56, 'Champion Jordell SideStep');
INSERT INTO player_type_skills VALUES (112, 39, 44, 'Champion HeadSpliter Loner');
INSERT INTO player_type_skills VALUES (113, 39, 36, 'Champion HeadSpliter Frenzy');
INSERT INTO player_type_skills VALUES (114, 39, 13, 'Champion HeadSpliter MBlow');
INSERT INTO player_type_skills VALUES (115, 39, 49, 'Champion HeadSpliter Prehensile');
INSERT INTO player_type_skills VALUES (116, 41, 44, 'Champion Ripper Loner');
INSERT INTO player_type_skills VALUES (117, 41, 13, 'Champion Ripper MBlow');
INSERT INTO player_type_skills VALUES (118, 41, 37, 'Champion Ripper Grab');
INSERT INTO player_type_skills VALUES (119, 41, 19, 'Champion Ripper Regen');
INSERT INTO player_type_skills VALUES (120, 41, 64, 'Champion Ripper Throwteam');
INSERT INTO player_type_skills VALUES (121, 42, 44, 'Champion Slibli Loner');
INSERT INTO player_type_skills VALUES (122, 42, 30, 'Champion Slibli Block');
INSERT INTO player_type_skills VALUES (123, 42, 37, 'Champion Slibli Grab');
INSERT INTO player_type_skills VALUES (124, 42, 38, 'Champion Slibli Guard');
INSERT INTO player_type_skills VALUES (125, 42, 17, 'Champion Slibli StandFirm');
INSERT INTO player_type_skills VALUES (126, 43, 44, 'Champion Varag Loner');
INSERT INTO player_type_skills VALUES (127, 43, 30, 'Champion Varag Block');
INSERT INTO player_type_skills VALUES (128, 43, 13, 'Champion Varag MBlow');
INSERT INTO player_type_skills VALUES (129, 43, 63, 'Champion Varag TSkull');
INSERT INTO player_type_skills VALUES (130, 43, 41, 'Champion Varag JumpUp');
INSERT INTO player_type_skills VALUES (131, 44, 18, 'Goblin Troll Always Hungry');
INSERT INTO player_type_skills VALUES (132, 44, 44, 'Goblin Troll Loner');
INSERT INTO player_type_skills VALUES (133, 44, 13, 'Goblin Troll Mighty Blow');
INSERT INTO player_type_skills VALUES (134, 44, 51, 'Goblin Troll Really Stupid');
INSERT INTO player_type_skills VALUES (135, 44, 19, 'Goblin Troll Regeneration');
INSERT INTO player_type_skills VALUES (136, 44, 64, 'Goblin Troll Throw Team-Mate');
INSERT INTO player_type_skills VALUES (137, 45, 54, 'Gob Pogo');
INSERT INTO player_type_skills VALUES (138, 45, 7, 'Gob Pogo');
INSERT INTO player_type_skills VALUES (139, 45, 27, 'Gob Pogo');
INSERT INTO player_type_skills VALUES (140, 45, 11, 'Gob Pogo');
INSERT INTO player_type_skills VALUES (141, 45, 32, 'Gob Pogo');
INSERT INTO player_type_skills VALUES (142, 45, 59, 'Gob Pogo');
INSERT INTO player_type_skills VALUES (143, 46, 54, 'Gob Fanatic');
INSERT INTO player_type_skills VALUES (144, 46, 76, 'Gob Fanatic');
INSERT INTO player_type_skills VALUES (145, 46, 46, 'Gob Fanatic');
INSERT INTO player_type_skills VALUES (146, 46, 59, 'Gob Fanatic');
INSERT INTO player_type_skills VALUES (147, 48, 29, 'Elf Noir Runner');
INSERT INTO player_type_skills VALUES (148, 49, 55, 'Elf Noir Assasins');
INSERT INTO player_type_skills VALUES (149, 49, 77, 'Elf Noir Assassin');
INSERT INTO player_type_skills VALUES (150, 50, 30, 'Elf Noir Blitzer');
INSERT INTO player_type_skills VALUES (151, 51, 36, 'Elf Noir Furie');
INSERT INTO player_type_skills VALUES (152, 51, 7, 'Elf Noir Furie');
INSERT INTO player_type_skills VALUES (153, 51, 41, 'Elf Noir Furie');
INSERT INTO player_type_skills VALUES (154, 52, 44, 'Champion Horkon');
INSERT INTO player_type_skills VALUES (155, 52, 7, 'Champion Horkon');
INSERT INTO player_type_skills VALUES (156, 52, 11, 'Champion Horkon');
INSERT INTO player_type_skills VALUES (157, 52, 70, 'Champion Horkon');
INSERT INTO player_type_skills VALUES (158, 52, 55, 'Champion Horkon');
INSERT INTO player_type_skills VALUES (159, 52, 77, 'Champion Horkon');
INSERT INTO player_type_skills VALUES (160, 10, 22, 'Deathroller');
INSERT INTO player_type_skills VALUES (161, 10, 27, 'Deathroller');
INSERT INTO player_type_skills VALUES (162, 10, 40, 'Deathroller');
INSERT INTO player_type_skills VALUES (163, 10, 13, 'Deathroller');
INSERT INTO player_type_skills VALUES (164, 10, 46, 'Deathroller');
INSERT INTO player_type_skills VALUES (165, 10, 54, 'Deathroller');
INSERT INTO player_type_skills VALUES (166, 10, 17, 'Deathroller');
INSERT INTO player_type_skills VALUES (167, 53, 44, 'Champion Morg Loner');
INSERT INTO player_type_skills VALUES (168, 53, 30, 'Champion Morg Block');
INSERT INTO player_type_skills VALUES (169, 53, 13, 'Champion Morg Mighty Blow');
INSERT INTO player_type_skills VALUES (170, 53, 63, 'Champion Morg Thick Skull');
INSERT INTO player_type_skills VALUES (171, 53, 64, 'Champion Morg Throw Team Mate');
";
?>