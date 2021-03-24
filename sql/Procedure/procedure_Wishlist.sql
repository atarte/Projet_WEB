-- USE GroupeCat_Projet
USE GroupeCat_Test


DELIMITER |

-- ======================================================================= OFFRE
-- Affichage Offre

DROP PROCEDURE IF EXISTS Affichage_Wishlist |
CREATE fichage_Wishlist (IN id INT)
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
       cand.Id_Users AS id_users

    FROM Stage INNER JOIN (SELECT c.Competence AS competence, Id_Stage FROM Demande
    INNER JOIN Competence c ON Demande.Id_Competence = c.Id_Competence) AS comp ON 1=1
    INNER JOIN Specialite s ON Stage.Id_Specialite = s.Id_Specialite
    INNER JOIN Entreprise e ON Stage.Id_Entreprise = e.Id_Entreprise
    INNER JOIN Ville v ON Stage.Id_Ville = v.Id_Ville
    INNER JOIN Candidature cand ON Stage.Id_Stage = cand.Id_Stage
    WHERE comp.Id_Stage = Stage.Id_Stage AND cand.Id_Users = id_users AND cand.Souhait IS NOT NULL
    ORDER BY cand.Souhait DESC;
END |


DELIMITER ;
