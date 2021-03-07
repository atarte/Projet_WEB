DROP DATABASE IF EXISTS GroupeCAT_Projet;
CREATE DATABASE GroupeCAT_Projet;


USE GroupeCAT_Projet;


DROP TABLE IF EXISTS Pays;
CREATE TABLE Pays(
   Id_Pays INT AUTO_INCREMENT NOT NULL,
   Pays VARCHAR(50) NOT NULL,

   CONSTRAINT Pays_PK PRIMARY KEY(Id_Pays)
);


DROP TABLE IF EXISTS Region;
CREATE TABLE Region(
   Id_Region INT AUTO_INCREMENT NOT NULL,
   Regions VARCHAR(50) NOT NULL,
   Id_Pays INT NOT NULL,

   CONSTRAINT Region_PK PRIMARY KEY(Id_Region),
   CONSTRAINT Pays_FK FOREIGN KEY(Id_Pays) REFERENCES Pays(Id_Pays)
);


DROP TABLE IF EXISTS Competence;
CREATE TABLE Competence(
   Id_Competence INT AUTO_INCREMENT NOT NULL,
   Competence VARCHAR(50) NOT NULL,

   CONSTRAINT Competence_PK PRIMARY KEY(Id_Competence)
);


DROP TABLE IF EXISTS Type_Promotion;
CREATE TABLE Type_Promotion(
   Id_Type_Promotion INT AUTO_INCREMENT NOT NULL,
   Type_Promotion VARCHAR(50) NOT NULL,

   CONSTRAINT Type_Promotion_PK PRIMARY KEY(Id_Type_Promotion)
);


DROP TABLE IF EXISTS Ville;
CREATE TABLE Ville(
   Id_Ville INT AUTO_INCREMENT NOT NULL,
   Ville VARCHAR(50) NOT NULL,
   Code_Postal INT NOT NULL,
   Id_Region INT NOT NULL,

   CONSTRAINT Ville_PK PRIMARY KEY(Id_Ville),
   CONSTRAINT Region_FK FOREIGN KEY(Id_Region) REFERENCES Region(Id_Region)
);


DROP TABLE IF EXISTS Secteur;
CREATE TABLE Secteur(
   Id_Secteur INT AUTO_INCREMENT NOT NULL,
   Secteur VARCHAR(50) NOT NULL,

   CONSTRAINT Secteur_PK PRIMARY KEY(Id_Secteur)
);


DROP TABLE IF EXISTS Promotion;
CREATE TABLE Promotion(
   Id_Promotion INT AUTO_INCREMENT NOT NULL,
   Promotion VARCHAR(50) NOT NULL,

   CONSTRAINT Promotion_PK PRIMARY KEY(Id_Promotion)
);

DROP TABLE IF EXISTS Role;
CREATE TABLE Role(
   Id_Role INT AUTO_INCREMENT NOT NULL,
   Role VARCHAR(50) NOT NULL,

   CONSTRAINT Role_PK PRIMARY KEY(Id_Role)
);


DROP TABLE IF EXISTS Adresse;
CREATE TABLE Adresse(
   Id_Adresse INT AUTO_INCREMENT NOT NULL,
   Adresse VARCHAR(50) NOT NULL,
   Id_Ville INT NOT NULL,

   CONSTRAINT Adresse_PK PRIMARY KEY(Id_Adresse),
   CONSTRAINT Ville_FK FOREIGN KEY(Id_Ville) REFERENCES Ville(Id_Ville)
);


DROP TABLE IF EXISTS Entreprise;
CREATE TABLE Entreprise(
   Id_Entreprise INT AUTO_INCREMENT NOT NULL,
   Nom VARCHAR(50) NOT NULL,
   Email VARCHAR(50) NOT NULL,
   Nombre_Accepter INT NOT NULL,
   Id_Secteur INT NOT NULL,

   CONSTRAINT Entreprise_PK PRIMARY KEY(Id_Entreprise),
   CONSTRAINT Secteur_FK FOREIGN KEY(Id_Secteur) REFERENCES Secteur(Id_Secteur)
);


DROP TABLE IF EXISTS Stage;
CREATE TABLE Stage(
   Id_Stage INT AUTO_INCREMENT NOT NULL,
   Nom VARCHAR(50) NOT NULL,
   Durer_Stage VARCHAR(50) NOT NULL,
   Remuneration DOUBLE NOT NULL,
   Date_Offre DATE NOT NULL,
   Nombre_Place INT NOT NULL,
   Email VARCHAR(50) NOT NULL,
   Id_Entreprise INT NOT NULL,
   Id_Ville INT NOT NULL,
   Id_Type_Promotion INT NOT NULL,

   CONSTRAINT Stage_PK PRIMARY KEY(Id_Stage),
   CONSTRAINT Entreprise_FK FOREIGN KEY(Id_Entreprise) REFERENCES Entreprise(Id_Entreprise),
   CONSTRAINT Ville_FK FOREIGN KEY(Id_Ville) REFERENCES Ville(Id_Ville),
   CONSTRAINT Promotion_FK FOREIGN KEY(Id_Type_Promotion) REFERENCES Type_Promotion(Id_Type_Promotion)
);


DROP TABLE IF EXISTS Centre;
CREATE TABLE Centre(
   Id_Centre INT AUTO_INCREMENT NOT NULL,
   Centre VARCHAR(50) NOT NULL,
   Id_Adresse INT NOT NULL,

   CONSTRAINT Centre_PK PRIMARY KEY(Id_Centre),
   CONSTRAINT Adresse_FK FOREIGN KEY(Id_Adresse) REFERENCES Adresse(Id_Adresse)
);


DROP TABLE IF EXISTS Users;
CREATE TABLE Users(
   Id_Users INT AUTO_INCREMENT NOT NULL,
   Nom VARCHAR(50) NOT NULL,
   Prenom VARCHAR(50) NOT NULL,
   Email VARCHAR(50) NOT NULL,
   Password VARCHAR(50) NOT NULL,
   Id_Centre INT NOT NULL,
   Id_Type_Promotion INT NOT NULL,

   CONSTRAINT Users_PK PRIMARY KEY(Id_Users),
   CONSTRAINT Centre_FK FOREIGN KEY(Id_Centre) REFERENCES Centre(Id_Centre),
   CONSTRAINT Type_Promotion_FK FOREIGN KEY(Id_Type_Promotion) REFERENCES Type_Promotion(Id_Type_Promotion)
);


DROP TABLE IF EXISTS Demande;
CREATE TABLE Demande(
   Id_Stage INT NOT NULL,
   Id_Competence INT NOT NULL,

   CONSTRAINT Stage_FK FOREIGN KEY(Id_Stage) REFERENCES Stage(Id_Stage),
   CONSTRAINT Competence_FK FOREIGN KEY(Id_Competence) REFERENCES Competence(Id_Competence)
);


DROP TABLE IF EXISTS Reside;
CREATE TABLE Reside(
   Id_Adresse INT NOT NULL,
   Id_Entreprise INT NOT NULL,

   CONSTRAINT Adresse_FK FOREIGN KEY(Id_Adresse) REFERENCES Adresse(Id_Adresse),
   CONSTRAINT Entreprise_FK FOREIGN KEY(Id_Entreprise) REFERENCES Entreprise(Id_Entreprise)
);


DROP TABLE IF EXISTS Enseigne
CREATE TABLE Enseigne(
   Id_Users INT NOT NULL,
   Id_Promotion INT NOT NULL,

   CONSTRAINT Users_FK FOREIGN KEY(Id_Users) REFERENCES Users(Id_Users),
   CONSTRAINT Promotion_FK FOREIGN KEY(Id_Promotion) REFERENCES Promotion(Id_Promotion)
);


DROP TABLE IF EXISTS Wishlist;
CREATE TABLE Wishlist(
   Souhait DATE,
   Postulation DATE,
   Historique DATE,
   Id_Users INT NOT NULL,
   Id_Stage INT NOT NULL,

   CONSTRAINT Users_FK FOREIGN KEY(Id_Users) REFERENCES Users(Id_Users),
   CONSTRAINT Stage_FK FOREIGN KEY(Id_Stage) REFERENCES Stage(Id_Stage)
);


DROP TABLE IF EXISTS Droit;
CREATE TABLE Droit(
   Entreprise BOOLEAN NOT NULL,
   Offre BOOLEAN NOT NULL,
   Pilote BOOLEAN NOT NULL,
   Delegue BOOLEAN NOT NULL,
   Etudiant BOOLEAN NOT NULL,
   Candidature BOOLEAN NOT NULL,
   Id_Users INT NOT NULL,
   Id_Role INT NOT NULL,

   CONSTRAINT Users_FK FOREIGN KEY(Id_Users) REFERENCES Users(Id_Users),
   CONSTRAINT Role_FK FOREIGN KEY(Id_Role) REFERENCES Role(Id_Role)
);
