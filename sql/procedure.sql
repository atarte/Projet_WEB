-- USE GroupeCat_Projet
USE GroupeCat_Test


DELIMITER |

-- ==================================================================== ETUDIANT
-- Affichage Etudiant
DROP PROCEDURE IF EXISTS Affichage_Etudiant |
CREATE PROCEDURE Affichage_Etudiant(IN page INT)
BEGIN
    SELECT
        Users.Id_Users AS id,
        Users.Nom AS nom,
        Users.Prenom As prenom,
        Users.Email AS email,
        u.Nom AS piloteNom,
        u.Prenom AS pilotePrenom,
        c.Centre AS centre,
        p.Promotion AS promotion,
        s.Specialite AS specialite
    FROM Users
    INNER JOIN Users u
        ON Users.Id_Pilote = u.Id_Users
    INNER JOIN Centre c
        ON Users.Id_Centre = c.Id_Centre
    INNER JOIN Promotion p
        ON Users.Id_Promotion = p.Id_Promotion
    INNER JOIN Specialite s
        ON Users.Id_Specialite = s.Id_Specialite
    INNER JOIN Droit d
        ON Users.Id_Users = d.Id_Users
    WHERE d.Id_Statut = 4
    ORDER BY Users.Id_Users DESC
    LIMIT page, 10;
END |


-- Creation Etudiant
DROP PROCEDURE IF EXISTS Creation_Etudiant |
CREATE PROCEDURE Creation_Etudiant(IN nom VARCHAR(50), IN prenom VARCHAR(50), IN email VARCHAR(50), IN pwd VARCHAR(50), IN pilote INT, IN promotion INT, IN specialite INT)
BEGIN
    DECLARE centre INT;
    DECLARE id_users INT;

    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    SELECT ID_Centre INTO centre FROM Users WHERE Users.Id_Users = pilote;

    INSERT INTO Users (Id_Users, Nom, Prenom, Email, Passwd, Id_Pilote, Id_Centre, Id_Promotion, Id_Specialite)
    VALUES (NULL, nom, prenom, email, pwd, pilote, centre, promotion, specialite);

    SELECT LAST_INSERT_ID() INTO id_users;

    INSERT INTO Droit (Id_Users, Id_Statut, Entreprise, Offre, Pilote, Delegue, Etudiant, Candidature)
    VALUES (id_users, 4, 1, 0, 0, 0, 0, 1);
END |


-- Modification Etudiant
DROP PROCEDURE IF EXISTS Modification_Etudiant |
CREATE PROCEDURE Modification_Etudiant (IN id INT, IN nom VARCHAR(50), IN prenom VARCHAR(50), IN email VARCHAR(50), IN pilote INT, IN promotion INT, IN specialite INT)
BEGIN
    DECLARE centre INT;

    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    SELECT ID_Centre INTO centre FROM Users WHERE Users.Id_Users = pilote;

    UPDATE Users SET
        Users.Nom = nom,
        Users.Prenom = prenom,
        Users.Email = email,
        Users.Id_Pilote = pilote,
        Users.Id_Centre = centre,
        Users.Id_Promotion = promotion,
        Users.Id_Specialite = specialite
    WHERE Users.Id_Users = id;
END |


-- Suppresion_Etudiant
DROP PROCEDURE IF EXISTS Suppression_Etudiant |
CREATE PROCEDURE Suppression_Etudiant (IN id INT)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    DELETE FROM Droit
    WHERE Droit.Id_Users = id;

    DELETE FROM Candidature
    WHERE Candidature.Id_Users = id;

    DELETE FROM Users
    WHERE Users.Id_Users = id;
END |


-- ====================================================================== PILOTE
-- Affichage Pilote
DROP PROCEDURE IF EXISTS Affichage_Pilote |
CREATE PROCEDURE Affichage_Pilote(IN page INT)
BEGIN
    SELECT Users.Id_Users, UPPER(Users.Nom)AS nom, CONCAT(UPPER(SUBSTRING(Users.Prenom,1,1)),LOWER(SUBSTRING(Users.Prenom,2))) As prenom, Users.Email AS email, c.Centre AS centre
    FROM Users
    INNER JOIN Centre c
        ON Users.Id_Centre = c.Id_Centre
    INNER JOIN Droit d
        ON Users.Id_Users = d.Id_Users
    WHERE d.Id_Statut = 2
    LIMIT page, 10;
END |


-- Creation Pilote
DROP PROCEDURE IF EXISTS Creation_Pilote |
CREATE PROCEDURE Creation_Pilote(IN i_nom VARCHAR(50),IN i_prenom VARCHAR(50),IN i_mail VARCHAR(50),IN i_passwd VARCHAR(50),IN i_id_centre VARCHAR(50))
BEGIN
    DECLARE id_use INT;

    INSERT INTO Users(Nom,Prenom,Email,Passwd,Id_Centre)
    VALUES(LOWER(i_nom),LOWER(i_prenom),i_mail,i_passwd,i_id_centre);

    SELECT LAST_INSERT_ID() INTO id_use;

    INSERT INTO Droit(Id_Users,Id_Statut,Entreprise,Offre,Pilote,Delegue,Etudiant,Candidature)
    VALUES(id_use,2,1,1,0,1,1,1);
END |


-- Modification Pilote
DROP PROCEDURE IF EXISTS Modification_Pilote |
CREATE PROCEDURE Modification_Pilote(IN id INT)
BEGIN
    UPDATE Users SET
        Users.Nom = nom,
        Users.Prenom = prenom,
        Users.Email = email,
        Users.Id_Centre = centre
	WHERE Users.Id_Users = id;
END |


-- Suppression Pilote
DROP PROCEDURE IF EXISTS Suppression_Pilote |
CREATE PROCEDURE Suppression_Pilote(IN id INT)
BEGIN
    DECLARE id_etudiant INT;

    SELECT Users.Id_Users INTO id_etudiant FROM Users WHERE Users.Id_Pilote = id;

    DELETE FROM Confiance
    WHERE Confiance.Id_Users = id;

    DELETE FROM Candidature
    WHERE Candidature.Id_Users = id;

    DELETE FROM Droit
    WHERE Droit.Id_Users = id_etudiant;

    DELETE FROM Users
    WHERE Users.Id_Users = id_etudiant;

    DELETE FROM Droit
    WHERE Droit.Id_Users = id;

    DELETE FROM Users
    WHERE Users.Id_Users = id;
END |


-- ===================================================================== DELEGUE
-- Affichage DELEGUE
DROP PROCEDURE IF EXISTS Affichage_Delegue |
CREATE PROCEDURE Affichage_Delegue (IN page INT)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    SELECT
        u.Id_Users AS id,
        u.Nom AS nom,
        u.Prenom As prenom,
        u.Email AS email,
        d.Entreprise AS entreprise,
        d.Offre AS offre,
        d.Pilote AS pilote,
        d.Delegue AS delegue,
        d.Etudiant AS etudiant,
        d.Candidature AS candidature
    FROM Users u
    INNER JOIN Droit d
        ON u.Id_Users = d.Id_Users
    WHERE d.Id_Statut = 3
    ORDER BY u.Id_Users DESC
    LIMIT page, 10;
END |


-- Creation Delegue
DROP PROCEDURE IF EXISTS Creation_Delegue |
CREATE PROCEDURE Creation_Delegue (IN nom VARCHAR(50), IN prenom VARCHAR(50), IN email VARCHAR(50), IN pwd VARCHAR(50), IN entreprise INT, IN offre INT, IN pilote INT, IN delegue INT, IN etudiant INT, IN candidature INT)
BEGIN
    DECLARE id_users INT;

    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    INSERT INTO Users (Id_Users, Nom, Prenom, Email, Passwd, Id_Pilote, Id_Centre, Id_Promotion, Id_Specialite)
    VALUES (NULL, nom, prenom, email, pwd, NULL, NULL, NULL, NULL);

    SELECT LAST_INSERT_ID() INTO id_users;

    INSERT INTO Droit (Id_Users, Id_Statut, Entreprise, Offre, Pilote, Delegue, Etudiant, Candidature)
    VALUES (id_users, 3, entreprise, offre, pilote, delegue, etudiant, candidature);
END |


-- Modification Delegue
DROP PROCEDURE IF EXISTS Modification_Delegue |
CREATE PROCEDURE Modification_Delegue (IN id INT, IN nom VARCHAR(50), IN prenom VARCHAR(50), IN email VARCHAR(50), IN entreprise INT, IN offre INT, IN pilote INT, IN delegue INT, IN etudiant INT, IN candidature INT)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    UPDATE Users SET
        Users.Nom = nom,
        Users.Prenom = prenom,
        Users.Email = email
    WHERE Users.Id_Users = id;

    UPDATE Droit SET
        Droit.Entreprise = entreprise,
        Droit.Offre = offre,
        Droit.Pilote = pilote,
        Droit.Delegue = delegue,
        Droit.Etudiant = etudiant,
        Droit.Candidature = candidature
    WHERE Droit.Id_Users = id;
END |


-- Suppression Delegue
DROP PROCEDURE IF EXISTS Suppression_Delegue |
CREATE PROCEDURE Suppression_Delegue (IN id INT)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    DELETE FROM Droit
    WHERE Droit.Id_Users = id;

    DELETE FROM Users
    WHERE Users.Id_Users = id;
END |


DELIMITER ;
