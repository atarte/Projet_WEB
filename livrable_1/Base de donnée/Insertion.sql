-- Insertion dans la table Type_Promotion
INSERT INTO Type_Promotion (Id_Type_Promotion, Type_Promotion) VALUES
(1, 'Informatique'),
(2, 'Systèmes Electriques et Electroniques Embarquées'),
(3, 'Généraliste'),
(4, 'Bâtiment et Travaux Publics');


-- Insertion dans la table Promotion
INSERT INTO Promotion (Id_Promotion, Promotion) VALUES
(1, 'CPI A1'),
(2, 'CPI A2'),
(3, 'FISE Info A3'),
(4, 'FISE Info A4'),
(5, 'FISE Info A5'),
(6, 'FISE Gen A3'),
(7, 'FISE Gen A4'),
(8, 'FISE Gen A5'),
(9, 'FISA Info A3'),
(10, 'FISA Info A4'),
(11, 'FISA Info A5'),
(12, 'FISA Gen A3'),
(13, 'FISA Gen A4'),
(14, 'FISA Gen A5'),
(15, 'FISA S3E A3'),
(16, 'FISA S3E A4'),
(17, 'FISA S3E A5'),
(18, 'FISA BTP A3'),
(19, 'FISA BTP A4'),
(20, 'FISA BTP A5');


-- Insertion de la table Pays
INSERT INTO Pays (Id_Pays, Pays) VALUES
(1, 'France');


-- Insertion dans la table Region
INSERT INTO Region (Id_Region, Region, Id_Pays) VALUES
(1, 'Provence-Alpes-Côte d Azur', 1),
(2, 'Languedoc-Roussillon', 1),
(3, 'Midi-Pyrénées', 1),
(4, 'Aquitaine', 1),
(5, 'Poitou-Charentes', 1),
(6, 'Limousin', 1),
(7, 'Auvergne', 1),
(8, 'Rhône-Alpes', 1),
(9, 'Pays-De-La-Loire', 1),
(10, 'Centre', 1),
(11, 'Bourgogne', 1),
(12, 'Franche-Comté', 1),
(13, 'Bretagne', 1),
(14, 'Base-Normandie', 1),
(15, 'Haute-Normandie', 1),
(16, 'Ile-De-France', 1),
(17, 'Champagne-Ardenne', 1),
(18, 'Lorraine', 1),
(19, 'Alsace', 1),
(20, 'Picardie', 1),
(21, 'Nord-Pas-De-Calais', 1),
(22, 'Corse', 1);


-- Insertion dans la table Ville
INSERT INTO Ville (Id_Ville, Ville, Code_Postal, Id_Region) VALUES
(1, 'Nice', 06000, 1),
(2, 'Aix-en-Provence', 13545, 1),
(3, 'Montpellier', 34000, 2),
(4, 'Toulouse', 31000, 3),
(5, 'Pau', 64000, 4),
(6, 'Bordeaux', 33070, 4),
(7, 'Grenoble', 38000, 8),
(8, 'Lyon', 69000, 8),
(9, 'Angoulême', 16000, 5),
(10, 'La Rochelle', 17000, 5),
(11, 'Châteauroux', 36000, 10),
(12, 'Nantes', 44307, 9),
(13, 'Saint-Nazaire', 44603, 9),
(14, 'Le Mans', 72000, 9),
(15, 'Brest', 29200, 13),
(16, 'Orléans', 45100, 10),
(17, 'Dijon', 21231, 11),
(18, 'Caen', 14000, 14),
(19, 'Rouen', 76000, 15),
(20, 'Reims', 51100, 17),
(21, 'Arras', 62000, 21),
(22, 'Lille', 59000, 21),
(23, 'Nancy', 54000, 18),
(24, 'Strasbourg', 67000, 19),
(25, 'Paris Nanterre', 92023, 16),
(26, 'Sophia-Antipolis', 06560, 1),
(27, 'Labege', 31670, 3),
(28, 'Meylan', 38240, 8),
(29, 'Ecully', 69134, 8),
(30, 'La couronne', 16400, 5),
(31, 'Lagord', 17140, 5),
(32, 'Quetigny', 21800, 11),
(33, 'Hérouville-Saint-Clair', 14200, 14),
(34, 'Saint-Etienne-du-Rouvray', 76800, 15),
(35, 'Villiers les Nancy', 54600, 18),
(36, 'Lingolsheim', 67380, 19),
(37, 'Mauguio', 34130, 2);


-- Insertion dans la table Adresse
INSERT INTO Adresse (Id_Adresse, Adresse, Id_Ville) VALUES
(1, 'Buropolis 1, 1240 Route des Dolines', 26),
(2, 'Europôle de l’Arbois Pavillon Martel BP 30', 2),
(3, 'Immeuble Le Quatrième Zone Aéroportuaire de Montpellier Méditerranée', 37),
(4, '16 rue Magellan', 27),
(5, '8 rue des Frères d’Orbigny', 5),
(6, 'Immeuble le Phénix, 264 boulevard Godard CS 90113', 6),
(7, '7 chemin du vieux chêne Inovallée', 28),
(8, '19 avenue Guy de Collongue', 29),
(9, 'Pôle d’excellence, 40 route de la Croix du Milieu', 30),
(10, 'Bâtiment Lab In’Tech, 8 rue Isabelle Autissier', 31),
(11, '2 allée Jean Vaillé', 11),
(12, '1 avenue Augustin Louis Cauchy, La Chantrerie', 12),
(13, 'Boulevard de l’Université', 13),
(14, '44 avenue Frédéric Auguste Bartholdi', 14),
(15, '2 avenue de Provence', 15),
(16, '1 allée du Titane', 16),
(17, '22 B rue du Cap Vert', 32),
(18, 'Campus EPOPEA, 4 place Boston CITIS bat. Ambassadeur', 33),
(19, '80 rue Edmund Halley, Rouen Madrillet Innovation', 34),
(20, '7 bis avenue Robert Schuman', 20),
(21, '7 rue DIderot', 21),
(22, 'Campus Arts et Métiers, 8 Bd Louis XIV', 22),
(23, '2 bis rue de Crédence', 35),
(24, '2 allée des Foulons, Parc des Tanneries BP 50016', 36),
(25, '93 boulevard de La Seine CS 40177', 25);


-- Insertion dans la table Centre
INSERT INTO Centre (Id_Centre, Centre, Assist_Nom, Assist_Prenom, Assist_Mail, Id_Adresse) VALUES
(1, 'Nice', 'Monterne', 'Amélie', 'antoniobananaperceptron@gmail.com', 1),
(2, 'Aix-en-Provence', 'Fibi', 'Julien', 'antoniobananaperceptron@gmail.com', 2),
(3, 'Montpellier', 'Carb', 'Alex', 'antoniobananaperceptron@gmail.com', 3),
(4, 'Toulouse', 'Péro', 'David', 'antoniobananaperceptron@gmail.com', 4),
(5, 'Pau', 'Free', 'Covid', 'antoniobananaperceptron@gmail.com', 5),
(6, 'Bordeaux', 'Mascario', 'Basil', 'antoniobananaperceptron@gmail.com', 6),
(7, 'Grenoble', 'Hydroalcolyque', 'Gel', 'antoniobananaperceptron@gmail.com', 7),
(8, 'Lyon', 'Barrière', 'Gaston', 'antoniobananaperceptron@gmail.com', 8),
(9, 'Angoulême', 'Virus', 'Corona', 'antoniobananaperceptron@gmail.com', 9),
(10, 'La Rochelle', 'Martie', 'Aurélie', 'antoniobananaperceptron@gmail.com', 10),
(11, 'Châteauroux', 'Mystère', 'Martin', 'antoniobananaperceptron@gmail.com', 11),
(12, 'Nantes', 'Gadget', 'Rocky', 'antoniobananaperceptron@gmail.com', 12),
(13, 'Saint-Nazaire', 'Lorier', 'Lily', 'antoniobananaperceptron@gmail.com', 13),
(14, 'Le Mans', 'Doo', 'Scooby', 'antoniobananaperceptron@gmail.com', 14),
(15, 'Brest', 'Tortue', 'Gérard', 'antoniobananaperceptron@gmail.com', 15),
(16, 'Orléans', 'Cars', 'Antonin', 'antoniobananaperceptron@gmail.com', 16),
(17, 'Dijon', 'De Dijon', 'Cendrillon', 'antoniobananaperceptron@gmail.com', 17),
(18, 'Caen', 'Fèbre', 'Fabien', 'antoniobananaperceptron@gmail.com', 18),
(19, 'Rouen', 'Parker', 'George', 'antoniobananaperceptron@gmail.com', 19),
(20, 'Reims', 'Parmesan', 'Gile', 'antoniobananaperceptron@gmail.com', 20),
(21, 'Arras', 'Du Mont', 'Xavier', 'antoniobananaperceptron@gmail.com', 21),
(22, 'Lille', 'Testi', 'Hugo', 'antoniobananaperceptron@gmail.com', 22),
(23, 'Nancy', 'Valé', 'Zoé', 'antoniobananaperceptron@gmail.com', 23),
(24, 'Strasbourg', 'Serbe', 'Sandra', 'antoniobananaperceptron@gmail.com', 24),
(25, 'Paris Nanterre', 'Weber', 'Nathaniel', 'antoniobananaperceptron@gmail.com', 25);


-- Insertion dans la table Secteur
INSERT INTO Secteur (Id_Secteur, Secteur) VALUES
(1, 'Agroalimentaire'),
(2, 'Bois / Papier / Carton / Imprimerie'),
(3, 'Chimie / Parachimie'),
(4, 'Electronique / Eléctricité'),
(5, 'Industrie pharlaceutique'),
(6, 'Machines et équipement / Automobile'),
(7, 'Plastique / Caoutchouc'),
(8, 'Textile / Habillement / Chaussure'),
(9, 'Banque / Assurance'),
(10, 'BTP / Matériaux de construction'),
(11, 'Commerce / Négoce / Distribution'),
(12, 'Edition / Communication / Multimédia'),
(13, 'Etudes et conseils'),
(14, 'Informatique / Télécoms'),
(15, 'Métallurgie / Travail du métal'),
(16, 'Service aux entreprises'),
(17, 'Transports / Logistique');


-- Insertion dans la table Statut
INSERT INTO Statut (Id_Statut, Statut) VALUES
(1, 'Administrateur'),
(2, 'Pilote'),
(3, 'Délégué'),
(4, 'Etudiant');


-- Insertion dans la table Users
INSERT INTO Users (Id_Users, Nom, Prenom, Email, Passwd, Id_Pilote, ID_Centre, Id_Promotion, ID_Type_Promotion) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', NULL, NULL, NULL, NULL),
(2, 'menhaj', 'lamyae', 'lmenhaj@cesi.fr', '1234', NULL, 1, NULL, NULL),
(3, 'gaddouri', 'radhia', 'rgaddouri@cesi.fr', '1234', NULL, NULL, NULL, NULL),
(4, 'silva roriz', 'catarina', 'catarinasilvaroriz@viacesi.fr', '1234', 2, 1, 1, 2);


-- Insertion dans la table Droit
INSERT INTO Droit (Id_Users, Id_Statut, Entreprise, Offre, Pilote, Delegue, Etudiant, Candidature) VALUES
(1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 2, 1, 1, 2),
(3, 3, 1, 1, 1, 1, 1, 1),
(4, 4, 1, 2, 2, 2, 2, 1);
