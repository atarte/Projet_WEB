-- USE GroupeCat_Projet
USE GroupeCat_Test


DELIMITER |

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
