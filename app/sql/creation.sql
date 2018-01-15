Drop table if exists Reservation CASCADE;
Drop table if exists Utilisateur CASCADE;
Drop table if exists Salles CASCADE;
Drop table if exists Campus CASCADE;

Create table Campus(
	id_campus SERIAL,
	nom Varchar(40) NOT NULL,
	adresse Varchar(100) NOT NULL,
	tel CHAR(10) NOT NULL,
	PRIMARY KEY(id_campus)
	);

Create table Salles(
	id_salle SERIAL,
	nom Varchar(40) NOT NULL,
	code CHAR(4) NOT NULL,
	id_campus smallint,
	type_salle Varchar(40),
	etage SMALLINT NOT NULL,
	PRIMARY KEY(id_salle),
	FOREIGN KEY(id_campus) REFERENCES Campus(id_campus)
	);

Create table Utilisateur(
	id_utilisateur SERIAL,
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
	id_res SERIAL,
	id_salle smallint NOT NULL,
	id_utilisateur smallint NOT NULL,
	debut TIMESTAMP NOT NULL,
	fin TIMESTAMP NOT NULL,
	PRIMARY KEY(id_res),
	FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur),
	FOREIGN KEY(id_salle) REFERENCES Salles(id_salle),
	CHECK(debut<fin)
	);