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





