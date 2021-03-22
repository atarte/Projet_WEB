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


DELIMITER ;
