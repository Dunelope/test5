DROP DATABASE IF EXISTS banque;

CREATE DATABASE IF NOT EXISTS banque;
USE banque;
# -----------------------------------------------------------------------------
#       TABLE : MOTIFS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MOTIFS
 (
   IDMOTIF BIGINT(4) NOT NULL AUTO_INCREMENT ,
   NOMMOTIF CHAR(32) NULL  ,
   LISTEPIECES CHAR(64) NULL  
   , PRIMARY KEY (IDMOTIF) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : OPERATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS OPERATION
 (
   IDOPERATION BIGINT(4) NOT NULL AUTO_INCREMENT ,
   IDCLIENT INTEGER NOT NULL  ,
   NOMCOMPTE CHAR(32) NOT NULL  ,
   NOMOPERATION CHAR(32) NULL  ,
   MONTANT BIGINT(16) NULL  
   , PRIMARY KEY (IDOPERATION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE OPERATION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_OPERATION_CLIENT
     ON OPERATION (IDCLIENT ASC);

CREATE  INDEX I_FK_OPERATION_COMPTE
     ON OPERATION (NOMCOMPTE ASC);

# -----------------------------------------------------------------------------
#       TABLE : CONTRAT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CONTRAT
 (
   NOMCONTRAT CHAR(32) NOT NULL  
   , PRIMARY KEY (NOMCONTRAT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : CLIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLIENT
 (
   IDCLIENT INTEGER NOT NULL AUTO_INCREMENT ,
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
   IDRDV INTEGER NOT NULL AUTO_INCREMENT ,
   IDMOTIF BIGINT(4) NOT NULL  ,
   IDCLIENT INTEGER NOT NULL  ,
   IDEMPLOYE BIGINT(4) NOT NULL  ,
   DATERDV DATE NULL  
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
   NOMCOMPTE CHAR(32) NOT NULL  
   , PRIMARY KEY (NOMCOMPTE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COMPTECLIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMPTECLIENT
 (
   IDCLIENT INTEGER NOT NULL  ,
   NOMCOMPTE CHAR(32) NOT NULL  ,
   DATEOUVERTURE DATE NULL  ,
   SOLDE INTEGER NULL  ,
   MONTANTDECOUVERT INTEGER NULL  
   , PRIMARY KEY (IDCLIENT,NOMCOMPTE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMPTECLIENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMPTECLIENT_CLIENT
     ON COMPTECLIENT (IDCLIENT ASC);

CREATE  INDEX I_FK_COMPTECLIENT_COMPTE
     ON COMPTECLIENT (NOMCOMPTE ASC);

# -----------------------------------------------------------------------------
#       TABLE : CONTRATCLIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CONTRATCLIENT
 (
   IDCLIENT INTEGER NOT NULL  ,
   NOMCONTRAT CHAR(32) NOT NULL  ,
   DATEOUVERTURECONTRAT DATE NULL  ,
   TARIFMENSUEL INTEGER NULL  
   , PRIMARY KEY (IDCLIENT,NOMCONTRAT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CONTRATCLIENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CONTRATCLIENT_CLIENT
     ON CONTRATCLIENT (IDCLIENT ASC);

CREATE  INDEX I_FK_CONTRATCLIENT_CONTRAT
     ON CONTRATCLIENT (NOMCONTRAT ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE OPERATION 
  ADD FOREIGN KEY FK_OPERATION_CLIENT (IDCLIENT)
      REFERENCES CLIENT (IDCLIENT) ;


ALTER TABLE OPERATION 
  ADD FOREIGN KEY FK_OPERATION_COMPTE (NOMCOMPTE)
      REFERENCES COMPTE (NOMCOMPTE) ;


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


ALTER TABLE COMPTECLIENT 
  ADD FOREIGN KEY FK_COMPTECLIENT_CLIENT (IDCLIENT)
      REFERENCES CLIENT (IDCLIENT) ;


ALTER TABLE COMPTECLIENT 
  ADD FOREIGN KEY FK_COMPTECLIENT_COMPTE (NOMCOMPTE)
      REFERENCES COMPTE (NOMCOMPTE) ;


ALTER TABLE CONTRATCLIENT 
  ADD FOREIGN KEY FK_CONTRATCLIENT_CLIENT (IDCLIENT)
      REFERENCES CLIENT (IDCLIENT) ;


ALTER TABLE CONTRATCLIENT 
  ADD FOREIGN KEY FK_CONTRATCLIENT_CONTRAT (NOMCONTRAT)
      REFERENCES CONTRAT (NOMCONTRAT) ;

