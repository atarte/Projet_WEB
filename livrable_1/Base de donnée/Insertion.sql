-- Insertion dans la table Users
INSERT INTO Users (Id_Users, Nom, Prenom, Email, Password) VALUES
(NULL, admin, admin, admin, admin);


-- Insertion dans la table Droit
INSERT INTO Droit (Id_Users, Id_Role, Entreprise, Offre, Pilote, Delegue, Etudiant, Candidature) VALUES
(1, 1, 'true', 'true', 'true', 'true', 'true', 'true' );


-- Insertion dans la table Role
INSERT INTO Role (Id_Role, Role) VALUES
(NULL, `Administrateur`),
(NULL, `Pilote`),
(NULL, `Délégué`),
(NULL, `Etudiant`);


-- Insertion dans la table Type_Promotion
INSERT INTO Type_Promotion (Id_Type_Promotion, Type_Promotion) VALUES
(NULL, `Informatique`),
(NULL, `Systèmes Electriques et Electroniques Embarquées`),
(NULL, `Généraliste`),
(NULL, `Bâtiment et Travaux Publics`);


-- Insertion dans la table Promotion
INSERT INTO Promotion (Id_Promotion, Promotion) VALUES
(NULL, `CPI A1`),
(NULL, `CPI A2`),
(NULL, `FISE Info A3`),
(NULL, `FISE Info A4`),
(NULL, `FISE Info A5`),
(NULL, `FISE Gen A3`),
(NULL, `FISE Gen A4`),
(NULL, `FISE Gen A5`),
(NULL, `FISA Info A3`),
(NULL, `FISA Info A4`),
(NULL, `FISA Info A5`),
(NULL, `FISA Gen A3`),
(NULL, `FISA Gen A4`),
(NULL, `FISA Gen A5`),
(NULL, `FISA S3E A3`),
(NULL, `FISA S3E A4`),
(NULL, `FISA S3E A5`),
(NULL, `FISA BTP A3`),
(NULL, `FISA BTP A4`),
(NULL, `FISA BTP A5`);


-- Insertion de la table Pays
INSERT INTO Pays (Id_Pays, Pays) VALUES 
(NULL, `France`);


-- Insertion dans la table Region
INSERT INTO Region (Id_Region, Region, Id_Pays) VALUES
(NULL, `Provence-Alpes-Côte d'Azur`, '1'),
(NULL, `Languedoc-Roussillon`, '1'),
(NULL, `MIdi-Pyrénées`, '1'),
(NULL, `Aquitaine`, '1'),
(NULL, `Poitou-Charentes`, '1'),
(NULL, `Limousin`, '1'),
(NULL, `Auvergne`, '1'),
(NULL, `Rhône-Alpes`, '1'),
(NULL, `Pays-De-La-Loire`, '1'),
(NULL, `Centre`, '1'),
(NULL, `Bourgogne`, '1'),
(NULL, `Franche-Comté`, '1'),
(NULL, `Bretagne`, '1'),
(NULL, `Base-Normandie`, '1'),
(NULL, `Haute-Normandie`, '1'),
(NULL, `Ile-De-France`, '1'),
(NULL, `Champagne-Ardenne`, '1'),
(NULL, `Lorraine`, '1'),
(NULL, `Alsace`, '1'),
(NULL, `Picardie`, '1'),
(NULL, `Nord-Pas-De-Calais`, '1'),
(NULL, `Corse`, '1'),


-- Insertion dans la table Ville
INSERT INTO Ville (Id_Ville, Ville, Code_Postale Id_Region) VALUES
(NULL, `Nice`, `06000` `1`),
(NULL, `Aix-en-Provence`, `13545`, `1`),
(NULL, `Montpellier`, `34000`, `2`),
(NULL, `Toulouse`, `31000`, `3`),
(NULL, `Pau`, `64000`, `4`),
(NULL, `Bordeaux`, `33070`, `4`),
(NULL, `Grenoble`, `38000`, `8`),
(NULL, `Lyon`, `69000`, `8`),
(NULL, `Angoulême`, `16000`, `5`),
(NULL, `La Rochelle`, `17000`, `5`),
(NULL, `Châteauroux`, `36000`, `10`),
(NULL, `Nantes`, `44307`, `9`),
(NULL, `Saint-Nazaire`, `44603`, `9`),
(NULL, `Le Mans`, `72000`, `9`),
(NULL, `Brest`, `29200`, `13`),
(NULL, `Orléans`, `45100`, `10`),
(NULL, `Dijon`, `21231`, `11`),
(NULL, `Caen`, `14000`, `14`),
(NULL, `Rouen`, `76000`, `15`),
(NULL, `Reims`, `51100`, `17`),
(NULL, `Arras`, `62000`, `21`),
(NULL, `Lille`, `59000`, `21`),
(NULL, `Nancy`, `54000`, `18`),
(NULL, `Strasbourg`, `67000`, `19`),
(NULL, `Paris Nanterre`, `92023` `16`),
(NULL, `Sophia-Antipolis`, `06560`, `1`),
(NULL, `Labege`, `31670`, `3`),
(NULL, `Meylan`, `38240`, `8`),
(NULL, `Ecully`, `69134`, `8`),
(NULL, `La couronne`, `16400`, `5`),
(NULL, `Lagord`, `17140`, `5`),
(NULL, `Quetigny`, `21800`, `11`),
(NULL, `Hérouville-Saint-Clair`, `14200`, `14`),
(NULL, `Saint-Etienne-du-Rouvray`, `76800`, `15`),
(NULL, `Villiers les Nancy`, `54600`, `18`),
(NULL, `Lingolsheim`, `67380`, `19`),
(NULL, `Mauguio`, `34130`, `2`);


-- Insertion dans la table Centre
INSERT INTO Centre (Id_Centre, Centre, Id_Adresse) VALUES
(NULL, `Nice`, `1`),
(NULL, `Aix-en-Provence`, `2`),
(NULL, `Montpellier`, `3`),
(NULL, `Toulouse`, `4`),
(NULL, `Pau`, `5`),
(NULL, `Bordeaux`, `6`),
(NULL, `Grenoble`, `7`),
(NULL, `Lyon`, `8`),
(NULL, `Angoulême`, `9`),
(NULL, `La Rochelle`, `10`),
(NULL, `Châteauroux`, `11`),
(NULL, `Nantes`, `12`),
(NULL, `Saint-Nazaire`, `13`),
(NULL, `Le Mans`, `14`),
(NULL, `Brest`, `15`),
(NULL, `Orléans`, `16`),
(NULL, `Dijon`, `17`),
(NULL, `Caen`, `18`),
(NULL, `Rouen`, `19`),
(NULL, `Reims`, `20`),
(NULL, `Arras`, `21`),
(NULL, `Lille`, `22`),
(NULL, `Nancy`, `23`),
(NULL, `Strasbourg`, `24`),
(NULL, `Paris Nanterre`, `25`);


-- Insertion dans la table Adresse
INSERT INTO Adresse (Id_Adresse, Adresse, Id_Ville) VALUES
(NULL, `Buropolis 1, 1240 Route des Dolines`, `26`);
(NULL, `Europôle de l’Arbois Pavillon Martel BP 30`, `2`),
(NULL, `Immeuble Le Quatrième Zone Aéroportuaire de Montpellier Méditerranée`, `37`),
(NULL, `16 rue Magellan`, `27`),
(NULL, `8 rue des Frères d’Orbigny`, `5`),
(NULL, `Immeuble le Phénix, 264 boulevard Godard CS 90113`, `6`),
(NULL, `7 chemin du vieux chêne Inovallée`, `28`),
(NULL, `19 avenue Guy de Collongue`, `29`),
(NULL, `Pôle d’excellence, 40 route de la Croix du Milieu`, `30`),
(NULL, `Bâtiment Lab In’Tech, 8 rue Isabelle Autissier`, `31`),
(NULL, `2 allée Jean Vaillé`, `11`),
(NULL, `1 avenue Augustin Louis Cauchy, La Chantrerie`, `12`),
(NULL, `Boulevard de l’Université`, `13`),
(NULL, `44 avenue Frédéric Auguste Bartholdi`, `14`),
(NULL, `2 avenue de Provence`, `15`),
(NULL, `1 allée du Titane`, `16`),
(NULL, `22 B rue du Cap Vert`, `32`),
(NULL, `Campus EPOPEA, 4 place Boston CITIS bat. Ambassadeur`, `33`),
(NULL, `80 rue Edmund Halley, Rouen Madrillet Innovation`, `34`),
(NULL, `7 bis avenue Robert Schuman`, `20`),
(NULL, `7 rue DIderot`, `21`),
(NULL, `Campus Arts et Métiers, 8 Bd Louis XIV`, `22`),
(NULL, `2 bis rue de Crédence`, `35`),
(NULL, `2 allée des Foulons, Parc des Tanneries BP 50016`, `36`),
(NULL, `93 boulevard de La Seine CS 40177`, `25`);


-- Insertion dans la table Secteur
INSERT INTO Secteur (Id_Secteur, Secteur) VALUES
(NULL, `Agroalimentaire`),
(NULL, `Bois / Papier / Carton / Imprimerie`),
(NULL, `Chimie / Parachimie`),
(NULL, `Electronique / Eléctricité`),
(NULL, `Industrie pharlaceutique`),
(NULL, `Machines et équipement / Automobile`),
(NULL, `Plastique / Caoutchouc`),
(NULL, `Textile / Habillement / Chaussure`),
(NULL, `Banque / Assurance`),
(NULL, `BTP / Matériaux de construction`),
(NULL, `Commerce / Négoce / Distribution`),
(NULL, `Edition / Communication / Multimédia`),
(NULL, `Etudes et conseils`),
(NULL, `Informatique / Télécoms`),
(NULL, `Métallurgie / Travail du métal`),
(NULL, `Service aux entreprises`),
(NULL, `Transports / Logistique`);

