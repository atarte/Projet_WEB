-- USE GroupeCat_Projet
USE GroupeCat_Test


DELIMITER |

-- ======================================================================= OFFRE
-- Affichage Offre
DROP PROCEDURE IF EXISTS Affichage_Offre |
CREATE PROCEDURE Affichage_Offre (IN page INT)
BEGIN
    SELECT Stage.ID_Stage AS id,
       Stage.Nom AS nom,
       Stage.Durer_Stage AS stage,
       Stage.Remuneration AS remuneration,
       Stage.Date_Offre AS date_offre,
       Stage.Nombre_Place AS nb_place,
       Stage.Email AS email,
       s.Specialite AS specialite,
       e.Nom AS entreprise,
       v.Ville AS ville,
       comp.competence AS competence

    FROM Stage INNER JOIN (SELECT c.Competence AS competence, Id_Stage FROM Demande
    INNER JOIN Competence c ON Demande.Id_Competence = c.Id_Competence) AS comp ON 1=1
    INNER JOIN Specialite s ON Stage.Id_Specialite = s.Id_Specialite
    INNER JOIN Entreprise e ON Stage.Id_Entreprise = e.Id_Entreprise
    INNER JOIN Ville v ON Stage.Id_Ville = v.Id_Ville
    WHERE comp.Id_Stage = Stage.Id_Stage
    ORDER BY Stage.Nom DESC
    LIMIT page, 10;

END |


-- Creation Offre
DROP PROCEDURE IF EXISTS Creation_Offre |
CREATE PROCEDURE Creation_Offre (IN nom VARCHAR(50), IN durer VARCHAR(50), IN remuneration FLOAT, IN date_offre DATE, IN nb_place INT, IN email VARCHAR(50), IN id_ent INT, IN id_ville INT, IN id_spe INT, IN competence VARCHAR(100))
BEGIN

    DECLARE id_st INT;
    DECLARE id_comp INT;

    INSERT INTO Stage (Nom,Durer_Stage,Remuneration,Date_Offre,Nombre_Place,Email,Id_Entreprise,Id_Ville,Id_Specialite) VALUES
    (nom,durer,remuneration,date_offre,nb_place,email,id_ent,id_ville,id_spe);

    SELECT LAST_INSERT_ID() INTO id_st;

    INSERT INTO Competence (Competence) VALUES
    (competence);

    SELECT LAST_INSERT_ID() INTO id_comp;

    INSERT INTO Demande (Id_Stage, Id_Competence) VALUES
    (id_st,id_comp);



END |


-- Modification Offre
DROP PROCEDURE IF EXISTS Modification_Offre |
CREATE PROCEDURE Modification_Offre (IN nom VARCHAR(50), IN durer VARCHAR(50), IN remuneration FLOAT, IN date_offre DATE, IN nb_place INT, IN email VARCHAR(50), IN id_ent INT, IN id_ville INT, IN id_spe INT, IN competence VARCHAR(100), IN id INT)
BEGIN
    DECLARE id_comp INT;

    SELECT Id_Competence INTO id_comp FROM Demande WHERE Demande.Id_Stage = id;

    UPDATE Stage SET
    Stage.Nom = nom,
    Stage.Durer_Stage = durer,
    Stage.Remuneration = remuneration,
    Stage.Date_Offre = date_offre,
    Stage.Nombre_Place = nb_place,
    Stage.Email = email,
    Stage.Id_Entreprise = id_ent,
    Stage.Id_Ville = id_ville,
    Stage.Id_Specialite = id_spe
    WHERE Stage.Id_Stage = id;

    UPDATE Competence SET
    Competence.Competence = competence
    WHERE Competence.Id_Competence = id_comp;
END |


-- Suppression Offre
DROP PROCEDURE IF EXISTS Suppression_Offre |
CREATE PROCEDURE Suppression_Offre (IN id INT)
BEGIN
    DECLARE id_comp INT;

    SELECT Id_Competence INTO id_comp FROM Demande WHERE Id_Stage = id ;

    DELETE FROM Candidature WHERE Candidature.Id_Stage = id;
    DELETE FROM Demande WHERE Demande.Id_Stage = id;
    DELETE FROM Competence WHERE Competence.Id_Competence = id_comp;
    DELETE FROM Stage WHERE Stage.Id_Stage = id;
END |


-- Création Wishlist
DROP PROCEDURE IF EXISTS Creation_Wishlist |
CREATE PROCEDURE Creation_Wishlist (IN id_user INT, IN id_offre INT)
BEGIN
    INSERT INTO Candidature (Id_Users, Id_Stage, Souhait) VALUES
    (id_user,id_offre,DATE(NOW()));
END |


-- Création Postulation
DROP PROCEDURE IF EXISTS Creation_Wishlist |
CREATE PROCEDURE Creation_Wishlist (IN id_user INT, IN id_stage INT)
BEGIN
    INSERT INTO Candidature (Id_Users, Id_Stage, Postulation, Step) VALUES
    (id_user,id_stage,DATE(NOW()),1;
END |

-- Suppression Candidature
DROP PROCEDURE IF EXISTS Delete_Candidature |
CREATE PROCEDURE Delete_Candidature (IN id_user INT, IN id_stage INT)
BEGIN
    DELETE FROM Candidature
    WHERE Candidature.Id_Users = id_user AND Candidature.Id_Stage = id_stage
END |


DELIMITER ;
