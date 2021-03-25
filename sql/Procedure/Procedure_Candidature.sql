-- USE GroupeCat_Projet
USE GroupeCat_Test


DELIMITER |

-- ================================================================= CANDIDATURE
-- Affichage CANDIDATURE
DROP PROCEDURE IF EXISTS Affichage_Candidature |
CREATE PROCEDURE Affichage_Candidature (IN id INT)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

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
       comp.competence AS competence,
       cand.Id_Users AS id_users,
       cand.Step AS step,
       cand.Id_candidature AS id_cand
    FROM Stage
    INNER JOIN (
        SELECT c.Competence AS competence, Id_Stage FROM Demande
        INNER JOIN Competence c
            ON Demande.Id_Competence = c.Id_Competence
        ) AS comp
        ON 1=1
    INNER JOIN Specialite s
        ON Stage.Id_Specialite = s.Id_Specialite
    INNER JOIN Entreprise e
        ON Stage.Id_Entreprise = e.Id_Entreprise
    INNER JOIN Ville v
        ON Stage.Id_Ville = v.Id_Ville
    INNER JOIN Candidature cand
        ON Stage.Id_Stage = cand.Id_Stage
    WHERE comp.Id_Stage = Stage.Id_Stage AND cand.Id_Users = id_users AND cand.Postulation IS NOT NULL
    ORDER BY cand.Postulation DESC;
END |



DROP PROCEDURE IF EXISTS Donnee_Pilote |
CREATE PROCEDURE Donnee_Pilote (IN id_user INT)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    SELECT
        Candidature.Id_candidature AS id,
        Candidature.Id_Users AS id_users,
        Candidature.Id_Stage AS id_stage,
        Candidature.Step AS step,
        u.Nom AS nom,
        u.Prenom AS prenom,
        u.Email AS email,
        p.Promotion AS promotion,
        s.Nom AS nom_stage,
        s.Email AS email,
        e.Nom AS entreprise
    FROM Candidature
    INNER JOIN Users u
        ON Candidature.Id_Users = u.Id_Users
    INNER JOIN Promotion p
        ON u.Id_Promotion = p.Id_Promotion
    INNER JOIN Stage s
        ON Candidature.Id_Stage = s.Id_Stage
    INNER JOIN Entreprise e
       ON s.Id_Entreprise = e.Id_Entreprise
    WHERE Candidature.Postulation IS NOT NULL AND u.Id_pilote = id_user
    ORDER BY Candidature.Postulation DESC;

END |



DELIMITER ;
