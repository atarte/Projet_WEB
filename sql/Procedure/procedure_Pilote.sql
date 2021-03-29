-- USE GroupeCat_Projet
USE GroupeCat_Test


DELIMITER |

-- ====================================================================== PILOTE
-- Affichage Pilote
DROP PROCEDURE IF EXISTS Affichage_Pilote |
CREATE PROCEDURE Affichage_Pilote (IN page INT)
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
CREATE PROCEDURE Creation_Pilote (IN i_nom VARCHAR(50),IN i_prenom VARCHAR(50),IN i_mail VARCHAR(50),IN i_passwd VARCHAR(50),IN i_id_centre VARCHAR(50))
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
CREATE PROCEDURE Modification_Pilote (IN id INT, IN nom VARCHAR(50), IN prenom VARCHAR(50), IN email VARCHAR(50), IN centre INT)
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
CREATE PROCEDURE Suppression_Pilote (IN id INT)
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


DELIMITER ;
