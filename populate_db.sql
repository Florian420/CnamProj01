USE quizzit;

/*Insert Utilisateur*/
insert into Utilisateur (nom, prenom, login, mdp, admin) values ('nomAdmin', 'prenomAdmin', 'admin', 'password', TRUE);

/*Insert Theme*/
insert into Theme (libelleTheme) values ('Mathématiques');
insert into Theme (libelleTheme) values ('Français');

/*Insert Module*/
insert into Module (libelleModule, idTheme) values ('addition', 1);
insert into Module (libelleModule, idTheme) values ('soustraction', 1);
insert into Module (libelleModule, idTheme) values ('multiplication', 1);
insert into module (libelleModule, idTheme) values ('conjugaison', 2);
insert into module (libelleModule, idTheme) values ('orthographe', 2);
insert into module (libelleModule, idTheme) values ('grammaire', 2);

/*Insert Question*/
insert into question (libelleQuestion , idModule) values ('2 + 3', 1);
insert into question (libelleQuestion , idModule) values ('22 + 33', 1);
insert into question (libelleQuestion , idModule) values ('33 + 63', 1);
insert into question (libelleQuestion , idModule) values ('24 + 39', 1);
insert into question (libelleQuestion , idModule) values ('72 + 43', 1);
insert into question (libelleQuestion , idModule) values ('26 + 34', 1);
insert into question (libelleQuestion , idModule) values ('28 + 66', 1);
insert into question (libelleQuestion , idModule) values ('11 + 55', 1);
insert into question (libelleQuestion , idModule) values ('55 + 66', 1);
insert into question (libelleQuestion , idModule) values ('33 + 44', 1);
insert into question (libelleQuestion , idModule) values ('88 + 566', 1);
insert into question (libelleQuestion , idModule) values ('1 + 99', 1);
insert into question (libelleQuestion , idModule) values ('34 + 83', 1);
insert into question (libelleQuestion , idModule) values ('21 + 44', 1);
insert into question (libelleQuestion , idModule) values ('44 + 23', 1);
insert into question (libelleQuestion , idModule) values ('29 + 35', 1);
insert into question (libelleQuestion , idModule) values ('100 + 34', 1);
insert into question (libelleQuestion , idModule) values ('99 + 55', 1);
insert into question (libelleQuestion , idModule) values ('44 + 99', 1);
insert into question (libelleQuestion , idModule) values ('55 + 32', 1);
insert into question (libelleQuestion , idModule) values ('3  - 3', 2);
insert into question (libelleQuestion , idModule) values ('23 - 12', 2);
insert into question (libelleQuestion , idModule) values ('34 - 31', 2);
insert into question (libelleQuestion , idModule) values ('43 - 3', 2);
insert into question (libelleQuestion , idModule) values ('55 - 12', 2);
insert into question (libelleQuestion , idModule) values ('88 - 55', 2);
insert into question (libelleQuestion , idModule) values ('55 - 78', 2);
insert into question (libelleQuestion , idModule) values ('99 - 44', 2);
insert into question (libelleQuestion , idModule) values ('888 - 56', 2);
insert into question (libelleQuestion , idModule) values ('44 - 9', 2);
insert into question (libelleQuestion , idModule) values ('98 - 8', 2);
insert into question (libelleQuestion , idModule) values ('222 - 111', 2);
insert into question (libelleQuestion , idModule) values ('43 - 3', 2);
insert into question (libelleQuestion , idModule) values ('99 - 55', 2);
insert into question (libelleQuestion , idModule) values ('55 - 11', 2);
insert into question (libelleQuestion , idModule) values ('23 - 3', 2);
insert into question (libelleQuestion , idModule) values ('89 - 77', 2);
insert into question (libelleQuestion , idModule) values ('45 - 22', 2);
insert into question (libelleQuestion , idModule) values ('65 - 21', 2);
insert into question (libelleQuestion , idModule) values ('34 - 34', 2);
insert into question (libelleQuestion , idModule) values ('3 x 3', 3);
insert into question (libelleQuestion , idModule) values ('4 x 2', 3);
insert into question (libelleQuestion , idModule) values ('5 x 5', 3);
insert into question (libelleQuestion , idModule) values ('4 x 2', 3);
insert into question (libelleQuestion , idModule) values ('4 x 1', 3);
insert into question (libelleQuestion , idModule) values ('9 x 3', 3);
insert into question (libelleQuestion , idModule) values ('3 x 4', 3);
insert into question (libelleQuestion , idModule) values ('3 x 2', 3);
insert into question (libelleQuestion , idModule) values ('1 x 3', 3);
insert into question (libelleQuestion , idModule) values ('5 x 4', 3);
insert into question (libelleQuestion , idModule) values ('6 x 5', 3);
insert into question (libelleQuestion , idModule) values ('7 x 6', 3);
insert into question (libelleQuestion , idModule) values ('8 x 3', 3);
insert into question (libelleQuestion , idModule) values ('9 x 3', 3);
insert into question (libelleQuestion , idModule) values ('1 x 2', 3);
insert into question (libelleQuestion , idModule) values ('2 x 3', 3);
insert into question (libelleQuestion , idModule) values ('4 x 4', 3);
insert into question (libelleQuestion , idModule) values ('5 x 5', 3);
insert into question (libelleQuestion , idModule) values ('6 x 6', 3);
insert into question (libelleQuestion , idModule) values ('7 x 1', 3);
insert into question (libelleQuestion , idModule) values ('8 x 8', 3);

/*Insert Reponse*/
insert into reponse (libelleReponse, isTrue, idQuestion) values ('5',true,1);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('3',false,1);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('7',false,1);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('6',false,1);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('55',true,2);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('34',false,2);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('79',false,2);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('66',false,2);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('99',true,3);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('32',false,3);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('88',false,3);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('91',false,3);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('36',true,4);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('33',false,4);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('75',false,4);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('46',false,4);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('115',true,5);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('133',false,5);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('75',false,5);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('96',false,5);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('60',true,6);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('33',false,6);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('75',false,6);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('96',false,6);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('94',true,7);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('93',false,7);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('77',false,7);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('96',false,7);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('66',true,8);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('77',false,8);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('69',false,8);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('96',false,8);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('121',true,9);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('130',false,9);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('169',false,9);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('96',false,9);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('77',true,10);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('130',false,10);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('69',false,10);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('96',false,10);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('654',true,11);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('630',false,11);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('569',false,11);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('796',false,11);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('100',true,12);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('30',false,12);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('69',false,12);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('96',false,12);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('117',true,13);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('30',false,13);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('69',false,13);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('96',false,13);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('65',true,14);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('30',false,14);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('69',false,14);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('96',false,14);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('67',true,15);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('40',false,15);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('79',false,15);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('96',false,15);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('64',true,16);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('50',false,16);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('79',false,16);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('96',false,16);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('134',true,17);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('250',false,17);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('149',false,17);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('296',false,17);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('154',true,18);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('150',false,18);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('179',false,18);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('196',false,18);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('143',true,19);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('150',false,19);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('130',false,19);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('196',false,19);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('87',true,20);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('150',false,20);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('130',false,20);
insert into reponse (libelleReponse, isTrue, idQuestion) values ('196',false,20);



