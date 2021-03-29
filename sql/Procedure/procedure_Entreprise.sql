USE GroupeCat_Test


DELIMITER |

-- ================================================================= CANDIDATURE
-- Affichage Entreprise

DROP PROCEDURE IF EXISTS Affichage_Entreprise |
CREATE PROCEDURE Affichage_Entreprise (IN page INT)
BEGIN
    SELECT
    e.Id_Entreprise AS id,
    e.Nom AS nom,
    e.Email AS email,
    e.Nombre_Accepter AS nombre,
    s.Secteur AS secteur,
    z.Id_Adresse AS id_ad,
    z.Adresse AS adresse,
    z.Id_Ville AS id_vil,
    z.Ville AS ville,
    z.Code_Postal AS code_p,
    z.Id_Region AS id_reg,
    z.Region AS region,
    z.Id_Pays AS id_pa,
    z.Pays AS pays
    FROM Reside
    INNER JOIN Entreprise e
    ON Reside.Id_Entreprise = e.Id_Entreprise
    INNER JOIN
    SELECT
        Adresse.Id_Adresse,
        Adresse.Adresse,
        v.Id_Ville,
        v.Ville,
        v.Code_Postal,
        v.Id_Region,
        v.Region,
        v.Id_Pays,
        v.Pays
    FROM (
        SELECT
            Ville.Id_Ville,
            Ville.Ville,
            Ville.Code_Postal,
            r.Id_Region,
            r.Region,
            r.ID_Pays,
            r.Pays
        FROM (
            SELECT
                Region.Id_region,
                Region.Region,
                p.Id_Pays,
                p.Pays
            FROM Pays p
            INNER JOIN Region
            ON p.Id_Pays = Region.Id_Pays
        ) r
        INNER JOIN Ville
        ON r.Id_Region = Ville.Id_Region
    ) v
    INNER JOIN Adresse
    ON v.Id_ville = Adresse.Id_Ville
    ) z
    ON Reside.Id_Adresse = z.Id_Adresse
    INNER JOIN Secteur s
    ON e.Id_Secteur = s.Id_Secteur
    LIMIT page, 10;
END |


DROP PROCEDURE IF EXISTS Creation_EntrepriseInex |
CREATE PROCEDURE Creation_EntrepriseInex (IN nom VARCHAR(50), IN email VARCHAR(50),
IN nb_accepter INT, IN id_secteur INT, IN ville VARCHAR(50), IN cp VARCHAR(50),
IN region VARCHAR(50), IN adresse VARCHAR(50))
BEGIN
    DECLARE id_ville_nouv INT;
    DECLARE id_adresse INT;
    DECLARE id_entreprise INT;
    DECLARE id_region INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
    END;

    INSERT INTO Entreprise (Nom, Email, Nombre_Accepter, Id_Secteur)
    VALUES (nom, email, nb_accepter, id_secteur);

    SELECT LAST_INSERT_ID() INTO @id_entreprise;

    SELECT Region.Id_Region INTO @id_region FROM Region WHERE Region.Region = region;

    INSERT INTO Ville (Ville, Code_Postal, Id_Region)
    VALUES (ville, cp, @id_region);

    SELECT LAST_INSERT_ID() INTO @id_ville_nouv;

    INSERT INTO Adresse (Adresse, Id_Ville)
    VALUES (adresse, @id_ville_nouv);

    SELECT LAST_INSERT_ID() INTO @id_adresse;

    INSERT INTO Reside (Id_Adresse, Id_Entreprise)
    VALUES (@id_adresse, @id_entreprise);
END |


DROP PROCEDURE IF EXISTS Creation_EntrepriseEx |
CREATE PROCEDURE Creation_EntrepriseEx (IN nom VARCHAR(50), IN email VARCHAR(50),
IN nb_accepter INT, IN id_secteur INT, IN ville VARCHAR(50),
IN adresse VARCHAR(50))
    BEGIN
    DECLARE id_ville INT;
    DECLARE id_adresse INT;
    DECLARE id_entreprise INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
    END;

    INSERT INTO Entreprise (Id_Entreprise, Nom, Email, Nombre_Accepter, Id_Secteur)
    VALUES (NULL,nom, email, nb_accepter, id_secteur);

    SELECT LAST_INSERT_ID() INTO @id_entreprise;

    SELECT Ville.Id_Ville INTO @id_ville FROM Ville
    WHERE Ville.Ville = ville;

    INSERT INTO Adresse (Id_Adresse, Adresse, Id_Ville)
    VALUES (NULL,adresse, @id_ville);

    SELECT LAST_INSERT_ID() INTO @id_adresse;

    INSERT INTO Reside (Id_Adresse, Id_Entreprise)
    VALUES (@id_adresse, @id_entreprise);

END |


DROP PROCEDURE IF EXISTS Modification_Entreprise |
CREATE PROCEDURE Modification_Entreprise (IN id INT,IN nom VARCHAR(50), IN email VARCHAR(50), IN adresse VARCHAR(50), IN cp VARCHAR(50), IN ville VARCHAR(50), IN region VARCHAR(50), IN nb_stagiaire INT, IN secteur VARCHAR(50))
BEGIN
    DECLARE id_adr INT;
    DECLARE id_reg INT;
    DECLARE id_ville_nouv INT;
    DECLARE id_ville INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
    END;

    SELECT Reside.Id_Adresse INTO @id_adr FROM Reside WHERE Reside.Id_Entreprise = id;
    SELECT Region.Id_Region INTO @id_reg FROM Region WHERE Region.Region = region;

    UPDATE Entreprise SET
    Entreprise.Nom = nom,
    Entreprise.Nombre_Accepter = nb_stagiaire,
    Entreprise.Email = email,
    Entreprise.Id_Secteur = secteur
    WHERE Entreprise.Id_Entreprise = id;


    IF ((SELECT Ville FROM Ville WHERE Ville.Ville = ville) IS NULL) THEN
        INSERT INTO Ville (Ville, Code_Postal, Id_Region)
        VALUES (ville, cp, @id_reg);
        SELECT LAST_INSERT_ID() INTO @id_ville_nouv;
        UPDATE Adresse SET
        Adresse.Adresse = adresse,
        Adresse.Id_Ville = @id_ville_nouv
        WHERE Adresse.Id_Adresse = @id_adr;

    ELSE

        SELECT Ville.Id_Ville INTO @id_ville FROM Ville WHERE Ville.Ville = ville;
        UPDATE Adresse SET
        Adresse.Adresse = adresse,
        Adresse.Id_Ville = @id_ville
        WHERE Adresse.Id_Adresse = @id_adr;

    END IF;
END |


DROP PROCEDURE IF EXISTS Suppression_Entreprise |
CREATE PROCEDURE Suppression_Entreprise (IN id INT)
BEGIN
    DECLARE id_adr INT;
    DECLARE id_sta INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
    END;

    SELECT Reside.Id_Adresse INTO @id_adr FROM Reside WHERE Reside.Id_Entreprise = id ;
    SELECT Stage.Id_Stage INTO @id_sta FROM Stage WHERE Stage.Id_Entreprise = id;

    DELETE FROM Reside WHERE Reside.Id_Entreprise = id;
    DELETE FROM Adresse WHERE Adresse.Id_Adresse = @id_adr;
    IF(@id_sta is NOT NULL) THEN
    CALL Suppression_Offre(@id_sta);
    END IF;
    DELETE FROM Confiance WHERE Id_Entreprise = id;
    DELETE FROM Note WHERE Id_Entreprise = id;
    DELETE FROM Entreprise WHERE Id_Entreprise = id;
END |


DROP PROCEDURE IF EXISTS Faire_Confiance |
CREATE PROCEDURE Suppression_Entreprise (IN id_ent INT, IN id_user INT)
BEGIN
    INSERT INTO `Confiance` (`Id_Entreprise`, `Id_Users`) VALUES
    (id_ent, id_users);
END |


DROP PROCEDURE IF EXISTS Ajout_Note |
CREATE PROCEDURE Ajout_Note (IN id_ent INT, IN id_user INT, IN note INT)
BEGIN
INSERT INTO `Note`(`Id_Entreprise`, `Id_Users`, `Note`) VALUES (id_ent,id_user,note);
END |

DROP PROCEDURE IF EXISTS Update_Note |
CREATE PROCEDURE Update_Note (IN id_ent INT, IN id_user INT, IN note INT)
BEGIN
UPDATE `Note` SET
`Note` = note
WHERE `Id_Entreprise` = id_ent AND `Id_Users` = id_user;
END |
