CREATE DATABASE SANTE;

CREATE TABLE MEDECIN(
   idMedecin INT,
   nom VARCHAR(50),
   prenom VARCHAR(50),
   adresse VARCHAR(50),
   CP VARCHAR(50),
   tel VARCHAR(50),
   specialiteComplementaire VARCHAR(50),
   département VARCHAR(50),
   PRIMARY KEY(idMedecin)
);


CREATE TABLE VISITEUR(
   idVisiteur INT,
   nom VARCHAR(50),
   prenom VARCHAR(50),
   logins VARCHAR(50),
   mdp VARCHAR(50),
   adresse VARCHAR(50),
   CP VARCHAR(50),
   ville VARCHAR(50),
   dateEmbauche DATE,
   PRIMARY KEY(idVisiteur)
);


CREATE TABLE FAMILLE(
   idFamillle INT,
   libelle VARCHAR(50),
   PRIMARY KEY(idFamillle)
);


CREATE TABLE RAPPORT(
   idRapport INT,
   dates DATE,
   motif TEXT,
   bilan TEXT,
   idVisiteur INT NOT NULL,
   idMedecin INT NOT NULL,
   PRIMARY KEY(idRapport),
   FOREIGN KEY(idVisiteur) REFERENCES VISITEUR(idVisiteur),
   FOREIGN KEY(idMedecin) REFERENCES MEDECIN(idMedecin)
);


CREATE TABLE MEDICAMENT(
   idMedicament INT,
   nomCommercial VARCHAR(50),
   composition TEXT,
   effets TEXT,
   contreIndications TEXT,
   idFamillle INT NOT NULL,
   PRIMARY KEY(idMedicament),
   FOREIGN KEY(idFamillle) REFERENCES FAMILLE(idFamillle)
);


CREATE TABLE OFFRIR (
    idRapport INT,
    idMedicament INT,
    quantite INT,
    constraint pk_offrir primary key (idRapport, idMedicament)
);

    INSERT INTO FAMILLE VALUES (1, 'Analgésique');
    INSERT INTO FAMILLE VALUES (2, 'Cardiologie');
    INSERT INTO FAMILLE VALUES (3, 'Antibiotique');
    INSERT INTO FAMILLE VALUES (4, 'Hématologie');
    INSERT INTO FAMILLE VALUES (5, 'Antilépreux');

    INSERT INTO MEDECIN VALUES (1, 'Sato', 'Renji', 'Rue Emile Zola', '85000', '0794742423', 'cardiologue', 'La Roche-sur-Yon');
    INSERT INTO MEDECIN VALUES (2, 'Suzuki', 'Sora', 'Rue du Petit Hameau', '45110', '0744673171', 'chirurgie', 'Chateauneuf-sur-Loire');
    INSERT INTO MEDECIN VALUES (3, 'Takahashi', 'Kaito', 'Rue Simonis', '67100', '0627945443', 'orthopédi', 'Strasbourg');
    INSERT INTO MEDECIN VALUES (4, 'Watanabe', 'Tsuki', 'Rue Ernest Michel', '34000', '0785645035', 'pédiatrie', 'Montpellier');
    INSERT INTO MEDECIN VALUES (5, 'Tanaka', 'Mitsui', 'Rue du Marechal Leclerc', '23000', '0603157902', 'radiothérapie', 'Guéret');
    
    INSERT INTO VISITEUR VALUES (1, 'Ito', 'Akane', 'Itane', 'Ia!23$', 'boulevard Aristide Briand', '78150', 'Le Chesnay', '2004-02-15');
    INSERT INTO VISITEUR VALUES (2, 'Yamamoto', 'Honoka', 'Yanoka', 'Yh*54!', 'Chemin Challet', '59800', 'Lille', '2000-12-01');
    INSERT INTO VISITEUR VALUES (3, 'Nakamura', 'Uka', 'Nakauka', 'Nu%67µ', 'avenue Ferdinand de Lesseps', '38100', 'Grenoble', '1994-06-15');
    INSERT INTO VISITEUR VALUES (4, 'Kobayashi', 'Yuka', 'Koyuka', 'Ky>12/', 'Place Napoléon', '53000', 'Laval', '2012-08-23');
    INSERT INTO VISITEUR VALUES (5, 'Saito', 'Minami', 'Sainami', 'Sm[17]', 'Square de la Couronne', '93500', 'Bondy', '2008-03-12');
    
    INSERT INTO RAPPORT VALUES (1, '2018-07-24', 'motif', 'bilan', 1, 4);
    INSERT INTO RAPPORT VALUES (2, '2020-10-15', 'motif', 'bilan', 3, 1);
    INSERT INTO RAPPORT VALUES (3, '2010-01-06', 'motif', 'bilan', 5, 2);
    INSERT INTO RAPPORT VALUES (4, '2005-03-22', 'motif', 'bilan', 4, 5);
    INSERT INTO RAPPORT VALUES (5, '2013-12-16', 'motif', 'bilan', 2, 3);
    
    INSERT INTO MEDICAMENT VALUES (1, 'Acupan', 'Pour une ampoule de 2 mL : Néfopam : 20 mg', 'effets indésireux : transpiration excessive, somnolence, nausées, vomissements', 'médicament ne doit pas être utilisé dans les cas suvants : glaucome à angle fermé, risque de blocage des urines, enfant moins de 15ans', 1);
    INSERT INTO MEDICAMENT VALUES (2, 'Adenoscan', 'Adénosine 30mg', 'effet : agit en dilatant les vaisseaux sanguins de votre cœur et en permettant au sang de circuler plus facilement', 'En raison du risque éventuel de hypotension artérielle significative, ADENOSCAN doit être utilisé avec prudence chez les patients présentant : Une sténose du tronc commun (gauche). Une hypovolémie non corrigée. Un rétrécissement valvulaire cardiaque', 2);
    INSERT INTO MEDICAMENT VALUES (3, 'Tobramycine', 'Tobramycine 15mg', 'effets indésireux Démangeaisons, rougeur à l œil. Irritation et gonflement des paupières.', 'Ce médicament ne doit pas être utilisé en cas d allergie aux antibiotiques de la famille des aminosides', 3);
    INSERT INTO MEDICAMENT VALUES (4, 'Abraxane', '250 mg de paclitaxel dans une formulation de nanoparticules liées à l albumine', 'effets indésireux : fatigue, vertige qui peuvent affecter la capacité à conduire', 'Ce médicament ne doit pas être utilisé pour les patients qui présente une numération des neurologiques', 4);
    INSERT INTO MEDICAMENT VALUES (5, 'Disulone', 'Dapsone 100mg, Oxalate de fer 200mg', 'démangeaisons, urticaire, photosensibilité:agranulocytose, essentiellement pendant les 3 premiers mois de traitement:maux de tête, irritabilité, insomnie, neuropathie (faiblesse musculaire, fourmillements touchant l extrémité des 4 membres):diarrhées, selles noires, nausées, vomissements.', ' ne doit généralement pas être utilisé si vous souffrez d une maladie du foie ou des reins', 5);
    
    INSERT INTO OFFRIR VALUES (1, 3, 2);
    INSERT INTO OFFRIR VALUES (2, 5, 5);
    INSERT INTO OFFRIR VALUES (3, 4, 12);
    INSERT INTO OFFRIR VALUES (4, 2, 20);
    INSERT INTO OFFRIR VALUES (5, 1, 30);