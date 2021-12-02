Drop table Sauveteur;
Drop table BateauSauveteur;
Drop table Medaille;
Drop table Sauvé;
Drop table BateauSauvé;

create table Sauveteur(
    nomSauveteur Varchar(20),
    prenomSauveteur Varchar(20),
    roleSauveteur Varchar(20),
    nbPersonneSauvé Number(4),
    nbEquipageSauvé Number(3),
    nbSortiMer Number(3),
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