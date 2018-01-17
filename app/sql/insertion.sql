TRUNCATE TABLE reservation RESTART IDENTITY;
TRUNCATE TABLE salles RESTART IDENTITY CASCADE;
TRUNCATE TABLE utilisateur RESTART IDENTITY CASCADE;
TRUNCATE TABLE campus RESTART IDENTITY CASCADE;


/*insertion des campus*/
INSERT INTO campus(nom, adresse, tel) VALUES('ANGERS', '10 Boulevard Jean Jeanneteau', '0241866767');
INSERT INTO campus(nom, adresse, tel) VALUES('PARIS', '22\-23 Quai du Président Carnot', '0141120500');
INSERT INTO campus(nom, adresse, tel) VALUES('DIJON', '97 Rue de Talant','0380582010');


/*insertion des utilisateurs*/
/*mdp = le prénom, hachage = sha-256*/
INSERT INTO utilisateur(login, password, nom, prenom, groupe, id_campus)
VALUES('tlegacque', '306331a6fe5c4bb7a01317402fd1b44b4927c118c450085491f294f5d3b290b6', 'LE GACQUE', 'Tristan', 'user', 1);


INSERT INTO utilisateur(login, password, nom, prenom, groupe, id_campus)
VALUES('alefort', '8c4fd8b2c24ffcc223dbf09088bd79734e8404cd4d9e90fc418ecb490622d1ca', 'LEFORT', 'Alexis', 'user', 1);


INSERT INTO utilisateur(login, password, nom, prenom, groupe, id_campus)
VALUES('acvergote', '685203ae11bc5f847f19ac567f569712780e2b01daf82e94d3db6a534b2ee43f', 'VERGOTE', 'Anne\-claire', 'user', 1);


INSERT INTO utilisateur(login, password, nom, prenom, groupe, id_campus)
VALUES('cmerand', 'c06f5d9112e70a0521967f3ab5651dc448b04275d19b356a2e8ece4e2449320c', 'MERAND', 'Céline', 'user', 1);


INSERT INTO utilisateur(login, password, nom, prenom, groupe, id_campus)
VALUES('jsoulard', 'e352295313877c67718746ee25fbd68e6b5dd6dc622c297000572540c0b78f07', 'SOULARD', 'Jérémie', 'user', 1);


INSERT INTO utilisateur(login, password, nom, prenom, groupe, id_campus)
VALUES('fmigne', '231b0997d6ba040db9728a5cece5414d636e94c590418c08dff7df232861351f', 'MIGNE', 'Florent', 'user', 1);


INSERT INTO utilisateur(login, password, nom, prenom, groupe, id_campus)
VALUES('jzwolinski', '4ff17bc8ee5f240c792b8a41bfa2c58af726d83b925cf696af0c811627714c85', 'ZWOLINSKI', 'Jean', 'user', 1);


INSERT INTO utilisateur(login, password, nom, prenom, groupe, id_campus)
VALUES('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'ADMIN', 'Admin', 'admin', 1);


/*insertion des salles ANGERS*/
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Broglie', 'B007', 1, 'Amphi', 0);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Langevin', 'A316', 1, 'Amphi', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Descartes', 'B116', 1, 'Lab. Informatique', 1);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Chambre Anéchoïde', 'B216', 1, 'Lab. Electronique', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Afrique', 'B110', 1, 'Salle de reunion', 1);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Ameriques', 'C108', 1, 'Salle de classe', 1);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Ampere', 'B304', 1, 'Lab. Electronique', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Antarctique', 'A115', 1, 'Salle de reunion', 1);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Anjou', 'DS02', 1, 'Amphi', 0);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Asie', 'B213', 1, 'Salle de reunion', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Bardin', 'A116', 1, 'Lab. Electronique', 1);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Bell', 'A401', 1, 'Salle de classe', 4);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Bernouilli', 'A402', 1, 'Salle de classe', 4);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Blondel', 'A205', 1, 'Lab. Electronqiue', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Bode', 'B204', 1, 'Lab. Electronique', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Bohr', 'A411', 1, 'Salle de classe', 4);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Boole', 'A209', 1, 'Lab. Electronqiue', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Bragg', 'B119', 1, 'Lab. Informatique', 1);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Branly', 'B313', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Carnot', 'B211', 1, 'Lab. Electronique', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Cauchy', 'B114', 1, 'Lab. Informatique', 1);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Coulomb', 'A403', 1, 'Salle de classe', 4);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Curie', 'A404', 1, 'Salle de classe', 4);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Dickens', 'B316', 1, 'Lab. Electronique', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Dirac', 'B009', 1, 'Amphi', 0);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Edison', 'B314', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Einstein', 'A307', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Espace Saint Aubin', 'C304', 1, 'Salle de reunion', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Euler', 'B005', 1, 'Lab. Informatique', 0);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Europe', 'A022', 1, 'Salle de reunion', 0);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Faraday', 'B308', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Fermi', 'B008', 1, 'Amphi', 0);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Floyd', 'A206', 1, 'Lab. Electronique', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Fourier', 'B115', 1, 'Lab. Informatique', 1);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Fresnel', 'B305', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Galilee', 'A413', 1, 'Salle de classe', 4);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Gallois', 'B405', 1, 'Salle de classe', 4);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Gauss', 'B118', 1, 'Lab. Informatique', 1);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Heisenberg', 'A303', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Hoare', 'A207', 1, 'Lab. Electronique', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Jeanneteau', 'D002', 1, 'Amphi', 0);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Joule', 'B311', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Kalman', 'C207', 1, 'Lab. Electronique', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Kelvin', 'A412', 1, 'Salle de classe', 4);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Laennec', 'C206', 1, 'Lab. Electronique', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Landau', 'A314', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Laplace', 'B309', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Leprince Ringuet', 'A304', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Marconi', 'C205', 1, 'Lab. Electronique', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Maxwell', 'B219', 1, 'Lab. Electronique', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Meitner', 'A405', 1, 'Salle de classe', 4);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Michelson', 'B306', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Von Neumann', 'A208', 1, 'Lab. Electronique', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Newton', 'A315', 1, 'Salle de classe', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Nyquist', 'B205', 1, 'Lab. Electronique', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Oceanie', 'C001', 1, 'Salle de reunion', 0);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Pascal', 'B113', 1, 'Lab. Informatique', 1);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Plank', 'A306', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Ramanujan', 'B404', 1, 'Salle de classe', 4);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Riemann', 'B111', 1, 'Lab. Informatique', 1);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Schrodinger', 'A308', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Shakespeare', 'B315', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Shannon', 'B312', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Siemens', 'B312', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Taylor', 'B108', 1, 'Lab. Informatique', 1);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Tesla', 'B317', 1, 'Salle de classe', 3);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Turing', 'A107', 1, 'Lab. Informatique', 1);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Volta', 'B209', 1, 'Lab. Electronique', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Watt', 'A204', 1, 'Lab. Electronique', 2);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Weierstrass', 'B006', 1, 'Amphi', 0);
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Wiener', 'B310', 1, 'Salle de classe', 3);


/*insertion des salles PARIS*/
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Salle de formations', '0', 2, '', 0) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Foyer', '1', 2, '', 0) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('S1', '2', 2, 'Salle de classe', 1) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('S2', '3', 2, 'Salle de classe', 1) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('S3', '4', 2, 'Salle de classe', 1) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('S5', '5', 2, 'Salle de classe', 1) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('S6', '6', 2, 'Salle de classe', 1) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('labo 1', '7', 2, 'Lab. Informatique', 1) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('labo 2', '8', 2, 'Lab. Informatique', 1) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('labo 3', '9', 2, 'Lab. Informatique', 1) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('SDR 1', '10', 2, 'Salle de reunion', 1) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('SDR 2', '11', 2, 'Salle de reunion', 1) ;


/*insertion des salles DIJON*/
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('P1', '1', 3, 'Salle de classe', 1) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('P2', '2', 3, 'Salle de classe', 1) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Salle de reunion', '3', 3, 'Salle de reunion', 1) ;
INSERT INTO salles(nom, code, id_campus, type_salle, etage)
VALUES('Bureau', '4', 3, 'Bureau', 1) ;


/*insertion des reservations*/
INSERT INTO reservation(id_salle,id_utilisateur, debut, fin)
VALUES(1,1, '2017-01-02 14:59:54', '2017-01-03 12:34:10');
INSERT INTO reservation(id_salle,id_utilisateur, debut, fin)
VALUES(2,2, '2018-01-12 14:59:54', '2018-01-13 12:34:10');
INSERT INTO reservation(id_salle,id_utilisateur, debut, fin)
VALUES(2,3, '2018-04-20 12:34:10', '2018-04-20 14:59:54');
INSERT INTO reservation(id_salle,id_utilisateur, debut, fin)
VALUES(10,4, '2018-02-02 12:34:10', '2018-02-02 14:59:54');