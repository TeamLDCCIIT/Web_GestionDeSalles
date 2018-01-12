Drop table if exists Reservation;
Drop table if exists Utilisateur;
Drop table if exists Salles;
Drop table if exists Campus;

Create table Campus(
	id_campus smallint NOT NULL auto_increment,
	nom Varchar(40) NOT NULL,
	adresse Varchar(100) NOT NULL,
	tel CHAR(10) NOT NULL,
	PRIMARY KEY(id_campus)
	);

Create table Salles(
	id_salle smallint NOT NULL auto_increment,
	nom Varchar(40) NOT NULL,
	code CHAR(4) NOT NULL,
	id_campus smallint,
	type_salle Varchar(40),
	etage CHAR(3) NOT NULL,
	PRIMARY KEY(id_salle),
	FOREIGN KEY(id_campus) REFERENCES Campus(id_campus)
	);

Create table Utilisateur(
	id_utilisateur smallint NOT NULL auto_increment,
	id_campus smallint,
	login Varchar(40) NOT NULL,
	password Varchar(64) NOT NULL,
	nom Varchar(40) NOT NULL,
	prenom Varchar(40) NOT NULL,
	groupe Varchar(40) NOT NULL,
	PRIMARY KEY(id_utilisateur),
	FOREIGN KEY (id_campus) REFERENCES CAMPUS(id_campus)
	);

Create table Reservation(
	id_res smallint NOT NULL auto_increment,
	id_salle smallint,
	id_utilisateur smallint,
	debut DATE NOT NULL,
	fin DATE NOT NULL,
	PRIMARY KEY(id_res),
	FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur),
	FOREIGN KEY(id_salle) REFERENCES Salles(id_salle)
	);