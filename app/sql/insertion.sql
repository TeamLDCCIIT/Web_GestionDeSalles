TRUNCATE TABLE reservation;
TRUNCATE TABLE salles;
TRUNCATE TABLE utilisateur;
TRUNCATE TABLE campus;

INSERT INTO campus(nom, adresse, tel) VALUES('ANGERS', 'nowhere', 'notel');
INSERT INTO campus(nom, adresse, tel) VALUES('PARIS', 'in paris', '0611223344');


INSERT INTO utilisateur(login, password, nom, prenom, groupe)
VALUES('tlegacque', '306331a6fe5c4bb7a01317402fd1b44b4927c118c450085491f294f5d3b290b6', 'LE GACQUE', 'Tristan', 'user');
INSERT INTO utilisateur(login, password, nom, prenom, groupe)
VALUES('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'ADMIN', 'Admin', 'admin');

INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Broglie', 'B007', 1, 'Amphi', 0) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Langevin', 'A316', 1, 'Amphi', 3) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Descartes', 'B116', 1, 'Lab. Informatique', 1) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Chambre Anéchoïde', 'B216', 1, 'Lab. Electronique', 2) ;

INSERT INTO reservation(id_utilisateur, debut, fin)
VALUES(1, '2017-01-02', '2017-01-03');
