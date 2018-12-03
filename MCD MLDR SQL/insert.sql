#---------------------------------------- EMPLOYE 



INSERT INTO `employe`( `LOGINEMPLOYE`, `MDPEMPLOYE`, `NOMEMPLOYE`, `TYPEEMPLOYE`) VALUES ('LogD','MdpD','NomDirecteur','Directeur');

INSERT INTO `employe`( `LOGINEMPLOYE`, `MDPEMPLOYE`, `NOMEMPLOYE`, `TYPEEMPLOYE`) VALUES ('LogC1','MdpC1','NomConseiller1','Conseiller');
INSERT INTO `employe`(`LOGINEMPLOYE`, `MDPEMPLOYE`, `NOMEMPLOYE`, `TYPEEMPLOYE`) VALUES ('LogC2','MdpC2','NomConseiller2','Conseiller');

INSERT INTO `employe`(`LOGINEMPLOYE`, `MDPEMPLOYE`, `NOMEMPLOYE`, `TYPEEMPLOYE`) VALUES ('LogA1','MdpA1','NomAgent1','Agent');
INSERT INTO `employe`(`LOGINEMPLOYE`, `MDPEMPLOYE`, `NOMEMPLOYE`, `TYPEEMPLOYE`) VALUES ('LogA2','MdpA2','NomAgent2','Agent');

#----------------------------------------- Motifs

INSERT INTO `motifs`(`NOMMOTIF`,`LISTEPIECES`) VALUES ('Autre','Piece identite');
INSERT INTO `motifs`(`NOMMOTIF`,`LISTEPIECES`) VALUES ('Ouvreture Assurance Auto','Justificatif de revenus,Attestation hebergeur,Livret de famille,Carte etudiant');
INSERT INTO `motifs`(`NOMMOTIF`,`LISTEPIECES`) VALUES ('Ouverture Compte CEL','Justificatif Domicile,Piece identite ');



#--------------------------------------------Compte
INSERT INTO `compte`(`NOMCOMPTE`)VALUES ('PEL');
INSERT INTO `compte`(`NOMCOMPTE`)VALUES ('CEL');
INSERT INTO `compte`(`NOMCOMPTE`)VALUES ('LDDS');
INSERT INTO `compte`(`NOMCOMPTE`)VALUES ('LIVRET A');
INSERT INTO `compte`(`NOMCOMPTE`)VALUES ('LIVRET JEUNE');
INSERT INTO `compte`(`NOMCOMPTE`)VALUES ('PERP');





#--------------------------------------------Contrat

INSERT INTO `contrat`(`NOMCONTRAT`) VALUES ('Assurance Vie');
INSERT INTO `contrat`(`NOMCONTRAT`) VALUES ('Crédit');






#---------------------------------------Client 
INSERT INTO `client`(`IDEMPLOYE`, `NOMCLI`, `PRENOMCLI`, `DATENAISSCLI`, `ADRESSE`, `NUMTEL`, `EMAIL`, `PROFESSION`, `SITUATION_FAMILIALE`)
VALUES (2,'NomCli1','PrenomCli1','1999-05-31','2 Rue quelquepart','0602223277','eMailCLi1@email.com','Etudiant','Celibataire');
INSERT INTO `client`(`IDEMPLOYE`, `NOMCLI`, `PRENOMCLI`, `DATENAISSCLI`, `ADRESSE`, `NUMTEL`, `EMAIL`, `PROFESSION`, `SITUATION_FAMILIALE`)
VALUES (2,'NomCli2','PrenomCli2','2000-12-28','9 route ici','0238588013','eMailCLi2@email.com','Prof','Marié');

INSERT INTO `client`(`IDEMPLOYE`, `NOMCLI`, `PRENOMCLI`, `DATENAISSCLI`, `ADRESSE`, `NUMTEL`, `EMAIL`, `PROFESSION`, `SITUATION_FAMILIALE`)
VALUES (3,'NomCli3','PrenomCli3','2001-04-18','102 bis orleans','0242326978','eMailCLi3@email.com','Musicien','Pacsé');
INSERT INTO `client`(`IDEMPLOYE`, `NOMCLI`, `PRENOMCLI`, `DATENAISSCLI`, `ADRESSE`, `NUMTEL`, `EMAIL`, `PROFESSION`, `SITUATION_FAMILIALE`)
VALUES (3,'NomCli3','PrenomCli3','1970-04-09','14 chemin fac','0278223698','eMailCLi3@email.com','Pilote','Celibataire');




#----------------------------------------------Rendez-vous

INSERT INTO `rendez_vous`(`IDMOTIF`, `IDCLIENT`, `IDEMPLOYE`, `DATERDV`) VALUES (3,1,2,'2018-12-12 15:00:00');
INSERT INTO `rendez_vous`(`IDMOTIF`, `IDCLIENT`, `IDEMPLOYE`, `DATERDV`) VALUES (2,3,3,'2018-12-15 11:00:00');
INSERT INTO `rendez_vous`(`IDMOTIF`, `IDCLIENT`, `IDEMPLOYE`, `DATERDV`) VALUES (2,2,2,'2018-12-15 12:00:00');

#--------------------------------------------------Operation
INSERT INTO `operation`(`NOMCOMPTE`, `IDCLIENT`, `NOMOPERATION`, `MONTANT`) VALUES ('Livret A',1,'Debiter',40);
INSERT INTO `operation`(`NOMCOMPTE`, `IDCLIENT`, `NOMOPERATION`, `MONTANT`) VALUES ('Perp',2,'Crediter',120);

#---------------------------------------------CompteClient
INSERT INTO `compteclient`(`IDCLIENT`, `NOMCOMPTE`, `DATEOUVERTURE`, `SOLDE`,`MONTANTDECOUVERT`) VALUES (1,'PEL','2015-05-18',0,500);
INSERT INTO `compteclient`(`IDCLIENT`, `NOMCOMPTE`, `DATEOUVERTURE`, `SOLDE`,`MONTANTDECOUVERT`) VALUES (1,'CEL','2016-07-25',2000,100);
INSERT INTO `compteclient`(`IDCLIENT`, `NOMCOMPTE`, `DATEOUVERTURE`, `SOLDE`,`MONTANTDECOUVERT`) VALUES (1,'LIVRET A','2012-07-16',100,400);

INSERT INTO `compteclient`(`IDCLIENT`, `NOMCOMPTE`, `DATEOUVERTURE`, `SOLDE`,`MONTANTDECOUVERT`) VALUES (2,'LDDS','2013-05-17',40000,500);
INSERT INTO `compteclient`(`IDCLIENT`, `NOMCOMPTE`, `DATEOUVERTURE`, `SOLDE`,`MONTANTDECOUVERT`) VALUES (2,'LIVRET JEUNE','2011-02-11',1000,200);
INSERT INTO `compteclient`(`IDCLIENT`, `NOMCOMPTE`, `DATEOUVERTURE`, `SOLDE`,`MONTANTDECOUVERT`) VALUES (2,'PERP','2008-09-28',455,300);

INSERT INTO `compteclient`(`IDCLIENT`, `NOMCOMPTE`, `DATEOUVERTURE`, `SOLDE`,`MONTANTDECOUVERT`) VALUES (3,'CEL','2014-01-01',4800,600);
INSERT INTO `compteclient`(`IDCLIENT`, `NOMCOMPTE`, `DATEOUVERTURE`, `SOLDE`,`MONTANTDECOUVERT`) VALUES (3,'LDDS','2005-04-02',2500,150);
INSERT INTO `compteclient`(`IDCLIENT`, `NOMCOMPTE`, `DATEOUVERTURE`, `SOLDE`,`MONTANTDECOUVERT`) VALUES (3,'Livret A','2004-09-07',1100,100);

INSERT INTO `compteclient`(`IDCLIENT`, `NOMCOMPTE`, `DATEOUVERTURE`, `SOLDE`,`MONTANTDECOUVERT`) VALUES (4,'Livret Jeune','2005-04-08',4900,50);


#---------------------------------------------ContratClient
INSERT INTO `contratclient`(`IDCLIENT`, `NOMCONTRAT`, `TARIFMENSUEL`, `DATEOUVERTURECONTRAT`) VALUES (1,'Assurance Vie',50,'2012-04-12');
INSERT INTO `contratclient`(`IDCLIENT`, `NOMCONTRAT`, `TARIFMENSUEL`, `DATEOUVERTURECONTRAT`) VALUES (1,'Crédit',100,'2014-08-19');
INSERT INTO `contratclient`(`IDCLIENT`, `NOMCONTRAT`, `TARIFMENSUEL`, `DATEOUVERTURECONTRAT`) VALUES (2,'Crédit',100,'2004-05-19');
INSERT INTO `contratclient`(`IDCLIENT`, `NOMCONTRAT`, `TARIFMENSUEL`, `DATEOUVERTURECONTRAT`) VALUES (3,'Crédit',150,'2008-08-07');
INSERT INTO `contratclient`(`IDCLIENT`, `NOMCONTRAT`, `TARIFMENSUEL`, `DATEOUVERTURECONTRAT`) VALUES (4,'Assurance Vie',20,'2009-12-12');











