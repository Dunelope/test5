DROP DATABASE IF EXISTS projectbanque;

CREATE DATABASE IF NOT EXISTS projectbanque;
USE projectbanque;
# -----------------------------------------------------------------------------
#       TABLE : MOTIFS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MOTIFS
 (
   IDMOTIF CHAR(32) NOT NULL  ,
   NOMMOTIF CHAR(32) NULL  
   , PRIMARY KEY (IDMOTIF) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PIECES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PIECES
 (
   IDPIECE CHAR(32) NOT NULL  ,
   NOMPIECE CHAR(32) NULL  
   , PRIMARY KEY (IDPIECE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : CONTRAT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CONTRAT
 (
   IDCLIENT CHAR(32) NOT NULL  ,
   NOMCONTRAT CHAR(32) NOT NULL  ,
   TARIFMENSUEL CHAR(32) NULL  ,
   DATEOUVERTURE CHAR(32) NULL  
   , PRIMARY KEY (IDCLIENT,NOMCONTRAT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CONTRAT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CONTRAT_CLIENT
     ON CONTRAT (IDCLIENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : CLIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLIENT
 (
   IDCLIENT CHAR(32) NOT NULL  ,
   IDEMPLOYÉ CHAR(32) NOT NULL  ,
   NOMCLI CHAR(32) NULL  ,
   PRENOMCLI CHAR(32) NULL  ,
   DATENAISSCLI CHAR(32) NULL  ,
   ADRESSE CHAR(32) NULL  ,
   NUMTEL CHAR(32) NULL  ,
   EMAIL CHAR(32) NULL  ,
   PROFESSION CHAR(32) NULL  ,
   SITUATION_FAMILIALE CHAR(32) NULL  
   , PRIMARY KEY (IDCLIENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CLIENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CLIENT_EMPLOYÉ
     ON CLIENT (IDEMPLOYÉ ASC);

# -----------------------------------------------------------------------------
#       TABLE : EMPLOYÉ
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EMPLOYÉ
 (
   IDEMPLOYÉ CHAR(32) NOT NULL  ,
   MDPEMPLOYÉ CHAR(32) NULL  ,
   NOMEMPLOYÉ CHAR(32) NULL  ,
   TYPEEMPLOYE CHAR(32) NULL  
   , PRIMARY KEY (IDEMPLOYÉ) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : RENDEZ_VOUS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RENDEZ_VOUS
 (
   IDRDV CHAR(32) NOT NULL  ,
   IDMOTIF CHAR(32) NOT NULL  ,
   IDCLIENT CHAR(32) NOT NULL  ,
   IDEMPLOYÉ CHAR(32) NOT NULL  ,
   DATERDV CHAR(32) NULL  ,
   HEUREDEBUT CHAR(32) NULL  
   , PRIMARY KEY (IDRDV) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE RENDEZ_VOUS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_RENDEZ_VOUS_MOTIFS
     ON RENDEZ_VOUS (IDMOTIF ASC);

CREATE  INDEX I_FK_RENDEZ_VOUS_CLIENT
     ON RENDEZ_VOUS (IDCLIENT ASC);

CREATE  INDEX I_FK_RENDEZ_VOUS_EMPLOYÉ
     ON RENDEZ_VOUS (IDEMPLOYÉ ASC);

# -----------------------------------------------------------------------------
#       TABLE : COMPTE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMPTE
 (
   IDCLIENT CHAR(32) NOT NULL  ,
   NOMCOMPTE CHAR(32) NOT NULL  ,
   DATEOUVERTURE CHAR(32) NULL  ,
   SOLDEACTUEL CHAR(32) NULL  ,
   MONTANTDECOUVERT CHAR(32) NULL  
   , PRIMARY KEY (IDCLIENT,NOMCOMPTE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMPTE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMPTE_CLIENT
     ON COMPTE (IDCLIENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : CIF_PIECES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CIF_PIECES
 (
   IDMOTIF CHAR(32) NOT NULL  ,
   IDPIECE CHAR(32) NOT NULL  
   , PRIMARY KEY (IDMOTIF,IDPIECE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CIF_PIECES
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CIF_PIECES_MOTIFS
     ON CIF_PIECES (IDMOTIF ASC);

CREATE  INDEX I_FK_CIF_PIECES_PIECES
     ON CIF_PIECES (IDPIECE ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE CONTRAT 
  ADD FOREIGN KEY FK_CONTRAT_CLIENT (IDCLIENT)
      REFERENCES CLIENT (IDCLIENT) ;


ALTER TABLE CLIENT 
  ADD FOREIGN KEY FK_CLIENT_EMPLOYÉ (IDEMPLOYÉ)
      REFERENCES EMPLOYÉ (IDEMPLOYÉ) ;


ALTER TABLE RENDEZ_VOUS 
  ADD FOREIGN KEY FK_RENDEZ_VOUS_MOTIFS (IDMOTIF)
      REFERENCES MOTIFS (IDMOTIF) ;


ALTER TABLE RENDEZ_VOUS 
  ADD FOREIGN KEY FK_RENDEZ_VOUS_CLIENT (IDCLIENT)
      REFERENCES CLIENT (IDCLIENT) ;


ALTER TABLE RENDEZ_VOUS 
  ADD FOREIGN KEY FK_RENDEZ_VOUS_EMPLOYÉ (IDEMPLOYÉ)
      REFERENCES EMPLOYÉ (IDEMPLOYÉ) ;


ALTER TABLE COMPTE 
  ADD FOREIGN KEY FK_COMPTE_CLIENT (IDCLIENT)
      REFERENCES CLIENT (IDCLIENT) ;


ALTER TABLE CIF_PIECES 
  ADD FOREIGN KEY FK_CIF_PIECES_MOTIFS (IDMOTIF)
      REFERENCES MOTIFS (IDMOTIF) ;


ALTER TABLE CIF_PIECES 
  ADD FOREIGN KEY FK_CIF_PIECES_PIECES (IDPIECE)
      REFERENCES PIECES (IDPIECE) ;

