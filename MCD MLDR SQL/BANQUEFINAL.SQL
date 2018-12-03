DROP DATABASE IF EXISTS Banque;

CREATE DATABASE IF NOT EXISTS Banque;
USE Banque;
# -----------------------------------------------------------------------------
#       TABLE : MOTIFS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MOTIFS
 (
   IDMOTIF BIGINT(4) NOT NULL AUTO_INCREMENT ,
   NOMMOTIF CHAR(32) NULL  
   , PRIMARY KEY (IDMOTIF) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PIECES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PIECES
 (
   IDPIECE BIGINT(4) NOT NULL AUTO_INCREMENT ,
   NOMPIECE CHAR(32) NULL  
   , PRIMARY KEY (IDPIECE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : OPERATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS OPERATION
 (
   IDOPERATION BIGINT(4) NOT NULL AUTO_INCREMENT ,
   NOMCOMPTE CHAR(32) NULL  ,
   IDCLIENT INTEGER(2) NULL  ,
   NOMOPERATION CHAR(32) NULL  ,
   MONTANT BIGINT(16) NULL  
   , PRIMARY KEY (IDOPERATION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE OPERATION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_OPERATION_COMPTE
     ON OPERATION (IDCLIENT ASC,NOMCOMPTE ASC);

# -----------------------------------------------------------------------------
#       TABLE : CONTRAT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CONTRAT
 (
   IDCLIENT INTEGER(2) NOT NULL  ,
   NOMCONTRAT CHAR(32) NOT NULL  ,
   TARIFMENSUEL INTEGER(8) NULL  ,
   DATEOUVERTURE DATE NULL  
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
   IDCLIENT INTEGER(2) NOT NULL AUTO_INCREMENT ,
   IDEMPLOYE BIGINT(4) NOT NULL  ,
   NOMCLI CHAR(32) NULL  ,
   PRENOMCLI CHAR(32) NULL  ,
   DATENAISSCLI DATE NULL  ,
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


CREATE  INDEX I_FK_CLIENT_EMPLOYE
     ON CLIENT (IDEMPLOYE ASC);

# -----------------------------------------------------------------------------
#       TABLE : RENDEZ_VOUS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RENDEZ_VOUS
 (
   IDRDV INTEGER(2) NOT NULL AUTO_INCREMENT ,
   IDMOTIF BIGINT(4) NOT NULL  ,
   IDCLIENT INTEGER(2) NOT NULL  ,
   IDEMPLOYE BIGINT(4) NOT NULL  ,
   DATERDV DATE NULL  ,
   HEUREDEBUT TIME NULL  
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

CREATE  INDEX I_FK_RENDEZ_VOUS_EMPLOYE
     ON RENDEZ_VOUS (IDEMPLOYE ASC);

# -----------------------------------------------------------------------------
#       TABLE : EMPLOYE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EMPLOYE
 (
   IDEMPLOYE BIGINT(4) NOT NULL AUTO_INCREMENT ,
   LOGINEMPLOYE CHAR(32) NULL  ,
   MDPEMPLOYE CHAR(32) NULL  ,
   NOMEMPLOYE CHAR(32) NULL  ,
   TYPEEMPLOYE CHAR(32) NULL  
   , PRIMARY KEY (IDEMPLOYE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COMPTE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMPTE
 (
   IDCLIENT INTEGER(2) NOT NULL  ,
   NOMCOMPTE CHAR(32) NOT NULL  ,
   DATEOUVERTURE DATE NULL  ,
   SOLDEACTUEL INTEGER(8) NULL  ,
   MONTANTDECOUVERT INTEGER(8) NULL  
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
   IDMOTIF BIGINT(4) NOT NULL  ,
   IDPIECE BIGINT(4) NOT NULL  
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


ALTER TABLE OPERATION 
  ADD FOREIGN KEY FK_OPERATION_COMPTE (IDCLIENT,NOMCOMPTE)
      REFERENCES COMPTE (IDCLIENT,NOMCOMPTE) ;


ALTER TABLE CONTRAT 
  ADD FOREIGN KEY FK_CONTRAT_CLIENT (IDCLIENT)
      REFERENCES CLIENT (IDCLIENT) ;


ALTER TABLE CLIENT 
  ADD FOREIGN KEY FK_CLIENT_EMPLOYE (IDEMPLOYE)
      REFERENCES EMPLOYE (IDEMPLOYE) ;


ALTER TABLE RENDEZ_VOUS 
  ADD FOREIGN KEY FK_RENDEZ_VOUS_MOTIFS (IDMOTIF)
      REFERENCES MOTIFS (IDMOTIF) ;


ALTER TABLE RENDEZ_VOUS 
  ADD FOREIGN KEY FK_RENDEZ_VOUS_CLIENT (IDCLIENT)
      REFERENCES CLIENT (IDCLIENT) ;


ALTER TABLE RENDEZ_VOUS 
  ADD FOREIGN KEY FK_RENDEZ_VOUS_EMPLOYE (IDEMPLOYE)
      REFERENCES EMPLOYE (IDEMPLOYE) ;


ALTER TABLE COMPTE 
  ADD FOREIGN KEY FK_COMPTE_CLIENT (IDCLIENT)
      REFERENCES CLIENT (IDCLIENT) ;


ALTER TABLE CIF_PIECES 
  ADD FOREIGN KEY FK_CIF_PIECES_MOTIFS (IDMOTIF)
      REFERENCES MOTIFS (IDMOTIF) ;


ALTER TABLE CIF_PIECES 
  ADD FOREIGN KEY FK_CIF_PIECES_PIECES (IDPIECE)
      REFERENCES PIECES (IDPIECE) ;

