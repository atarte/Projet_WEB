DROP DATABASE IF EXISTS GroupeCAT_Projet;
CREATE DATABASE GroupeCAT_Projet;


USE GroupeCAT_Projet;


DROP TABLE IF EXISTS Pays;
CREATE TABLE Pays(
   Id_Pays INT AUTO_INCREMENT NOT NULL,
   Pays VARCHAR(50) NOt NULL,

   PRIMARY KEY(Id_Pays)
);


DROP TABLE IF EXISTS Region;
CREATE TABLE Region(
   Id_Region INT AUTO_INCREMENT NOT NULL,
   Regions VARCHAR(50) NOT NULL,
   Id_Pays INT NOT NULL,

   PRIMARY KEY(Id_Region),
   FOREIGN KEY(Id_Pays) REFERENCES Pays(Id_Pays)
);


DROP TABLE IF EXISTS Competence;
CREATE TABLE Competence(
   Id_Competence INT AUTO_INCREMENT NOT NULL,
   Competence VARCHAR(50) NOT NULL,

   PRIMARY KEY(Id_Competence)
);


DROP TABLE IF EXISTS Type_Promotion;
CREATE TABLE Type_Promotion(
   Id_Type_Promotion INT AUTO_INCREMENT NOT NULL,
   Type_Promotion VARCHAR(50) NOT NULL,

   PRIMARY KEY(Id_Type_Promotion)
);


DROP TABLE IF EXISTS Ville;
CREATE TABLE Ville(
   Id_Ville INT AUTO_INCREMENT NOT NULL,
   Ville VARCHAR(50) NOT NULL,
   Code_Postal INT NOT NULL,
   Id_Region INT NOT NULL,

   PRIMARY KEY(Id_Ville),
   FOREIGN KEY(Id_Region) REFERENCES Region(Id_Region)
);


DROP TABLE IF EXISTS Secteur;
CREATE TABLE Secteur(
   Id_Secteur INT AUTO_INCREMENT NOT NULL,
   Secteur VARCHAR(50) NOT NULL,

   PRIMARY KEY(Id_Secteur)
);


DROP TABLE IF EXISTS Promotion;
CREATE TABLE Promotion(
   Id_Promotion INT AUTO_INCREMENT NOT NULL,
   Promotion VARCHAR(50) NOT NULL,

   PRIMARY KEY(Id_Promotion)
);

DROP TABLE IF EXISTS Role;
CREATE TABLE Role(
   Id_Role INT AUTO_INCREMENT NOT NULL,
   Role VARCHAR(50) NOT NULL,

   PRIMARY KEY(Id_Role)
);


DROP TABLE IF EXISTS Adresse;
CREATE TABLE Adresse(
   Id_Adresse INT AUTO_INCREMENT NOT NULL,
   Adresse VARCHAR(50) NOT NULL,
   Id_Ville INT NOT NULL,

   PRIMARY KEY(Id_Adresse),
   FOREIGN KEY(Id_Ville) REFERENCES Ville(Id_Ville)
);


DROP TABLE IF EXISTS Entreprise;
CREATE TABLE Entreprise(
   Id_Entreprise INT AUTO_INCREMENT NOT NULL,
   Nom VARCHAR(50) NOT NULL,
   Email VARCHAR(50) NOT NULL,
   Nombre_Accepter INT NOT NULL,
   Id_Secteur INT NOT NULL,

   PRIMARY KEY(Id_Entreprise),
   FOREIGN KEY(Id_Secteur) REFERENCES Secteur(Id_Secteur)
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

   PRIMARY KEY(Id_Stage),
   FOREIGN KEY(Id_Entreprise) REFERENCES Entreprise(Id_Entreprise),
   FOREIGN KEY(Id_Ville) REFERENCES Ville(Id_Ville),
   FOREIGN KEY(Id_Type_Promotion) REFERENCES Type_Promotion(Id_Type_Promotion)
);


DROP TABLE IF EXISTS Centre;
CREATE TABLE Centre(
   Id_Centre INT AUTO_INCREMENT NOT NULL,
   Centre VARCHAR(50) NOT NULL,
   Id_Adresse INT NOT NULL,

   PRIMARY KEY(Id_Centre),
   UNIQUE(Id_Adresse),
   FOREIGN KEY(Id_Adresse) REFERENCES Adresse(Id_Adresse)
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

   PRIMARY KEY(Id_Users),
   FOREIGN KEY(Id_Centre) REFERENCES Centre(Id_Centre),
   FOREIGN KEY(Id_Type_Promotion) REFERENCES Type_Promotion(Id_Type_Promotion)
);


DROP TABLE IF EXISTS Demande;
CREATE TABLE Demande(
   Id_Stage INT NOT NULL,
   Id_Competence INT NOT NULL,

   FOREIGN KEY(Id_Stage) REFERENCES Stage(Id_Stage),
   FOREIGN KEY(Id_Competence) REFERENCES Competence(Id_Competence)
);


DROP TABLE IF EXISTS Reside;
CREATE TABLE Reside(
   Id_Adresse INT NOT NULL,
   Id_Entreprise INT NOT NULL,

   FOREIGN KEY(Id_Adresse) REFERENCES Adresse(Id_Adresse),
   FOREIGN KEY(Id_Entreprise) REFERENCES Entreprise(Id_Entreprise)
);


DROP TABLE IF EXISTS Enseigne
CREATE TABLE Enseigne(
   Id_Users INT NOT NULL,
   Id_Promotion INT NOT NULL,

   FOREIGN KEY(Id_Users) REFERENCES Users(Id_Users),
   FOREIGN KEY(Id_Promotion) REFERENCES Promotion(Id_Promotion)
);


DROP TABLE IF EXISTS Wishlist;
CREATE TABLE Wishlist(
   Souhait DATE,
   Postulation DATE,
   Historique DATE,
   Id_Users INT NOT NULL,
   Id_Stage INT NOT NULL,

   FOREIGN KEY(Id_Users) REFERENCES Users(Id_Users),
   FOREIGN KEY(Id_Stage) REFERENCES Stage(Id_Stage)
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

   FOREIGN KEY(Id_Users) REFERENCES Users(Id_Users),
   FOREIGN KEY(Id_Role) REFERENCES Role(Id_Role)
);
