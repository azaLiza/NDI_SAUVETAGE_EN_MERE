use database webSauvetage;

Drop table if exists Sauveteur;
Drop table if exists BateauSauveteur;
Drop table if exists Medaille;
Drop table if exists Sauvé;
Drop table if exists BateauSauvé;

Create table Utilisateur(
    pseudo Varchar(20),
    mail Varchar(20),
    motDePasse Varchar(20),
    access numeric(1) DEFAULT 1
    -- 0 Admin /  1 User
);

create table Sauveteur(
    nomSauveteur Varchar(20),
    prenomSauveteur Varchar(20),
    roleSauveteur Varchar(20),
    nbPersonneSauvé numeric(4),
    nbEquipageSauvé numeric(3),
    nbSortiMer numeric(3),
    constraint CleSauveteur PRIMARY KEY(nomSauveteur,prenomSauveteur)
);

create table Medaille(
    nomSauveteur Varchar(20),
    honeur Varchar(20),
    FOREIGN KEY(nomSauveteur) REFERENCES Sauveteur(nomSauveteur)
);

create table BateauSauveteur(
    nomBateau Varchar(20),
    DescriptionBateau Varchar(1000),
    constraint CleBateauSauveteur PRIMARY KEY(nomBateau)
);

create table Sauvé(
    nomSauvé Varchar(20),
    prenomSauvé Varchar(20),
    constraint CleSauvé PRIMARY KEY(nomSauvé,prenomSauvé)
);

create table BateauSauvé(
    nomBateauS Varchar(20),
    DescriptionBateauSauvé Varchar(1000),
    constraint CleBateauSauvé PRIMARY KEY(nomBateauS)
);
