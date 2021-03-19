-- USE GroupeCat_Projet
USE GroupeCat_Test


DELIMITER |

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
  VALUES (id_users, 4, 1, 2, 2, 2, 2, 1);
END |
-- CALL Creation_Etudiant('rttz', 'zret', 'zretze@zret', 'zert', 2, 1, 2);


-- Affichage Etudiant
DROP PROCEDURE IF EXISTS Affichage_Etudiant |
CREATE PROCEDURE Affichage_Etudiant(IN page INT)
BEGIN
  SELECT Users.Nom AS nom, Users.Prenom As prenom, Users.Email AS email, u.Nom AS piloteNom, u.Prenom AS pilotePrenom, c.Centre AS centre, p.Promotion AS promotion, s.Specialite AS specialite
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
  ORDER BY Users.Id_Users
  LIMIT page, 10;
END |


-- Creation Pilote
DROP PROCEDURE IF EXISTS Creation_Pilote |
CREATE PROCEDURE Creation_Pilote(IN i_nom VARCHAR(50),IN i_prenom VARCHAR(50),IN i_mail VARCHAR(50),IN i_passwd VARCHAR(50),IN i_id_centre VARCHAR(50))
BEGIN
DECLARE id_use INT;

INSERT INTO Users(Nom,Prenom,Email,Passwd,Id_Centre)
VALUES(i_nom,i_prenom,i_mail,i_passwd,i_id_centre);

SELECT LAST_INSERT_ID() INTO id_use;

INSERT INTO Droit(Id_Users,Id_Statut,Entreprise,Offre,Pilote,Delegue,Etudiant,Candidature)
VALUES(id_use,2,1,1,0,1,1,1);


END |


-- Affichage Pilote
DROP PROCEDURE IF EXISTS Affichage_Pilote |
CREATE PROCEDURE Affichage_Pilotes(IN page INT)
BEGIN
  SELECT Users.Nom AS nom, Users.Prenom As prenom, Users.Email AS email, c.Centre AS centre
  FROM Users
  INNER JOIN Centre c
  ON Users.Id_Centre = c.Id_Centre
  INNER JOIN Droit d
  ON Users.Id_Users = d.Id_Users
  WHERE d.Id_Statut = 2;
END |

DELIMITER ;
