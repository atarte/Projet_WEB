USE GroupeCat_Test


DELIMITER |

-- ================================================================= CANDIDATURE
-- Affichage Entreprise
DROP PROCEDURE IF EXISTS Affichage_Entreprise |
CREATE PROCEDURE Affichage_Entreprise (IN page INT)
BEGIN
    SELECT Id_Entreprise AS id,
	   Nom AS nom,
	   Nombre_Accepter AS stagiaire,
       Email AS email,
	   s.Secteur AS secteur
    FROM Entreprise
    INNER JOIN Secteur s
    ON Entreprise.Id_Secteur = s.Id_Secteur
    LIMIT page, 10;
END |

-- Affichage des adresses des entreprises
DROP PROCEDURE IF EXISTS Affichage_AdresseEntreprise |
CREATE PROCEDURE Affichage_AdresseEntreprise ()
BEGIN
    SELECT Reside.Id_Entreprise AS id_entreprise,
       Reside.Id_Adresse AS id_adresse,
       a.Adresse AS adresse,
       v.Ville AS ville,
       v.Code_Postal AS CP,
       r.Region AS region,
       p.Pays AS pays
    FROM Reside
    INNER JOIN Adresse a
    ON Reside.Id_Adresse = a.id_Adresse
    INNER JOIN Ville v
    ON a.Id_Ville = v.Id_Ville
    INNER JOIN Region r
    ON v.Id_Region = r.Id_Region
    INNER JOIN Pays p
    ON r.Id_Region = p.Id_Pays;
END |


-- Get Secteur
SELECT Id_Secteur AS id, Secteur AS secteur FROM Secteur

-- Get Region
SELECT Id_Region As id, Region AS region FROM Region


-- Création Entreprise
-- DROP PROCEDURE IF EXISTS Creation_Entreprise |
-- CREATE PROCEDURE Creation_Entreprise (IN nom VARCHAR(50), IN email VARCHAR(50),
-- IN nb_accepter INT, IN id_secteur INT, IN ville VARCHAR(50), IN cp VARCHAR(50),
-- IN adresse VARCHAR(50))
-- BEGIN
--     DECLARE id_ville_nouv INT;
--     DECLARE id_ville INT;
--     DECLARE id_adresse INT;
--     DECLARE id_entreprise INT;
--
--     INSERT INTO Entreprise (Nom, Email, Nombre_Accepter, Id_Secteur)
--     VALUES (nom, email, nb_accepter, id_secteur);
--
--     SELECT LAST_INSERT_ID() INTO id_entreprise;
--
--     IF Ville.Ville != ville THEN
--
--     INSERT INTO Ville (Ville, Code_Postal, Id_Region)
--     VALUES (ville, cp, id_region);
--     SELECT LAST_INSERT_ID() INTO id_ville_nouv;
--     INSERT INTO Adresse (Adresse, Id_Ville)
--     VALUES (adresse, id_ville_nouv);
--
--     ELSE
--
--     SELECT Id_Ville INTO Id_ville FROM Ville
--     WHERE Ville = ville;
--     INSERT INTO Adresse (Adresse, Id_Ville)
--     VALUES (adresse, Id_ville);
--
--     END IF;
--
--     SELECT LAST_INSERT_ID() INTO id_adresse;
--
--     INSERT INTO Reside (Id_Adresse, Id_Entreprise)
--     VALUES (id_adresse, id_entreprise);
--
-- END |

DROP PROCEDURE IF EXISTS Creation_EntrepriseInex |
CREATE PROCEDURE Creation_EntrepriseInex (IN nom VARCHAR(50), IN email VARCHAR(50),
IN nb_accepter INT, IN id_secteur INT, IN ville VARCHAR(50), IN cp VARCHAR(50),
IN region VARCHAR(50), IN adresse VARCHAR(50))
BEGIN
    DECLARE id_ville_nouv INT;
    DECLARE id_adresse INT;
    DECLARE id_entreprise INT;
    DECLARE id_region INT;

    INSERT INTO Entreprise (Nom, Email, Nombre_Accepter, Id_Secteur)
    VALUES (nom, email, nb_accepter, id_secteur);

    SELECT LAST_INSERT_ID() INTO id_entreprise;

    SELECT Id_region INTO id_region FROM Region WHERE Region = region;

    INSERT INTO Ville (Ville, Code_Postal, Id_Region)
    VALUES (ville, cp, id_region);

    SELECT LAST_INSERT_ID() INTO id_ville_nouv;

    INSERT INTO Adresse (Adresse, Id_Ville)
    VALUES (adresse, id_ville_nouv);

    SELECT LAST_INSERT_ID() INTO id_adresse;

    INSERT INTO Reside (Id_Adresse, Id_Entreprise)
    VALUES (id_adresse, id_entreprise);

END |


DROP PROCEDURE IF EXISTS Creation_EntrepriseEx |
CREATE PROCEDURE Creation_EntrepriseEx (IN nom VARCHAR(50), IN email VARCHAR(50),
IN nb_accepter INT, IN id_secteur INT, IN ville VARCHAR(50), IN cp VARCHAR(50),
IN adresse VARCHAR(50))
BEGIN
    DECLARE id_ville_nouv INT;
    DECLARE id_ville INT;
    DECLARE id_adresse INT;
    DECLARE id_entreprise INT;

    INSERT INTO Entreprise (Nom, Email, Nombre_Accepter, Id_Secteur)
    VALUES (nom, email, nb_accepter, id_secteur);

    SELECT LAST_INSERT_ID() INTO id_entreprise;

    SELECT Id_Ville INTO Id_ville FROM Ville
    WHERE Ville = ville;

    INSERT INTO Adresse (Adresse, Id_Ville)
    VALUES (adresse, Id_ville);

    SELECT LAST_INSERT_ID() INTO id_adresse;

    INSERT INTO Reside (Id_Adresse, Id_Entreprise)
    VALUES (id_adresse, id_entreprise);

END |
