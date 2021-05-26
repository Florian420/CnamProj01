CREATE DATABASE IF NOT EXISTS QuizzIT;
CHARACTER SET = 'utf8'
COLLATE = 'utf8_general_ci';

CREATE TABLE Theme
(idTheme int  not null  AUTO_INCREMENT,
libelleTheme varchar(50) not null,
primary key (idTheme));

CREATE TABLE Module
(idModule int not null AUTO_INCREMENT,
libelleModule varchar(50) not null,
nbQuestion int not null,
scoreTotal int,
primary key (idModule),
idTheme int not null,
foreign key (idTheme) references Theme(idTheme) );

CREATE TABLE Question
(idQuestion int not null AUTO_INCREMENT,
libelleQuestion varchar(150) not null,
primary key (idQuestion),
idModule int not null,
foreign key (idModule) references Module(idModule));

CREATE TABLE Utilisateur
(idUtilisateur int not null AUTO_INCREMENT,
nom varchar(50) not null,
prenom varchar(50) not null,
login varchar(50) not null,
mdp varchar(50) not null,
admin boolean,
primary key (idUtilisateur));

CREATE TABLE Stat
(idStat int not null AUTO_INCREMENT,
score int,
idUtilisateur int not null,
idModule int not null ,
primary key (idStat),
foreign key (idUtilisateur) references Utilisateur(idUtilisateur),
foreign key (idModule) references Module(idModule));

CREATE TABLE Reponse
(idReponse int not null AUTO_INCREMENT,
libelleReponse varchar(100) not null,
isTrue boolean,
idQuestion int not null ,
primary key (idReponse),
foreign key (idQuestion) references Question(idQuestion));

CREATE TABLE ReponseUtilisateur
(idUtilisateur int not null,
idReponse int not null ,
primary key(idUtilisateur, idReponse),
foreign key (idReponse) references Reponse(idReponse),
foreign key (idUtilisateur) references Utilisateur(idUtilisateur));
