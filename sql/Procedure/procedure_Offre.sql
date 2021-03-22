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
       v.Ville AS ville
    FROM Stage
    INNER JOIN Specialite s
    ON Stage.Id_Specialite = s.Id_Specialite
    INNER JOIN Entreprise e
    ON Stage.Id_Entreprise = e.Id_Entreprise
    INNER JOIN Ville v
    ON Stage.Id_Ville = v.Id_Ville
    ORDER BY Stage.Nom DESC
    LIMIT page, 10;
END |


-- Creation Pilote
DROP PROCEDURE IF EXISTS Creation_Offre |
CREATE PROCEDURE Creation_Offre ()
BEGIN

END |


-- Modification Pilote
DROP PROCEDURE IF EXISTS Modification_Offre |
CREATE PROCEDURE Modification_Offre (IN id INT)
BEGIN

END |


-- Suppression Pilote
DROP PROCEDURE IF EXISTS Suppression_Offre |
CREATE PROCEDURE Suppression_Offre (IN id INT)
BEGIN

END |


DELIMITER ;
