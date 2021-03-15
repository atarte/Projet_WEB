-- USE GroupeCat_Projet
USE GroupeCat_Test


DELIMITER |

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

DROP PROCEDURE IF EXISTS Affichage_Etudiant |
CREATE PROCEDURE Affichage_Etudiant()
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
  WHERE d.Id_Statut = 4;
END |


DELIMITER ;
