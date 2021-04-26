DROP DATABASE IF EXISTS adashop;

CREATE DATABASE IF NOT EXISTS adashop;

USE adashop;

SET NAMES 'utf8';

CREATE TABLE IF NOT EXISTS tblKunde (
	p_kundenNr INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	kGebDat DATE,
	kNachname VARCHAR( 60 ) NOT NULL,
	kVorname VARCHAR( 40 ) NOT NULL,
	kStrasse VARCHAR( 60 ) NOT NULL,
	kPlz INT UNSIGNED NOT NULL,
	kOrt VARCHAR( 40 ) NOT NULL,
	kIban CHAR( 22 ) NOT NULL,
	kPasswort VARCHAR(255) NOT NULL,
	kMail VARCHAR( 40 ) NOT NULL
);

CREATE TABLE IF NOT EXISTS tblBestellung (
	p_bstID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	bstZeit DATETIME NOT NULL,
	bstIstWarenkorb BOOL NOT NULL,
	bstGesamtsumme DECIMAL( 8,2 ),
	bstRabattsatz DECIMAL( 4,2 ),
	f_kundenNr INT UNSIGNED NOT NULL,
	FOREIGN KEY ( f_kundenNr ) REFERENCES tblKunde ( p_kundenNr )
);

CREATE TABLE IF NOT EXISTS tblZustand (
	p_zustID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	zustName VARCHAR( 20 ) NOT NULL
);

CREATE TABLE IF NOT EXISTS tblKategorie (
	p_katID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	katName VARCHAR( 25 ) NOT NULL
);

CREATE TABLE IF NOT EXISTS tblArtikel (
	p_artID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	artName VARCHAR( 60 ) NOT NULL,
	artBeschreibung TEXT,
	artBestand INT UNSIGNED NOT NULL,
	artPreis DECIMAL( 7,2 ) NOT NULL,
	f_zustID INT UNSIGNED NOT NULL,
	f_katID INT UNSIGNED NOT NULL,
	FOREIGN KEY ( f_zustID ) REFERENCES tblZustand ( p_zustID ),
	FOREIGN KEY ( f_katID ) REFERENCES tblKategorie ( p_katID )
);

CREATE TABLE IF NOT EXISTS tblBild (
	bildPfad VARCHAR( 255 ) NOT NULL,
	f_artID INT UNSIGNED NOT NULL,
	FOREIGN KEY ( f_artID ) REFERENCES tblArtikel ( p_artID )
);

CREATE TABLE IF NOT EXISTS tblBestellposition (
	f_bstID INT UNSIGNED NOT NULL,
	f_artID INT UNSIGNED NOT NULL,
	bposMenge INT UNSIGNED NOT NULL,
	FOREIGN KEY ( f_bstID ) REFERENCES tblBestellung ( p_bstID ),
	FOREIGN KEY ( f_artID ) REFERENCES tblArtikel ( p_artID )
);



-- FILL


INSERT INTO tblZustand
VALUES 	(NULL,"Neuwertig"),
		(NULL,"Wie neu"),
		(NULL,"Selten genutzt"),
		(NULL,"Gebraucht");



INSERT INTO tblKategorie
VALUES 	(NULL,"Kleidung"),
		(NULL,"Bücher & DVD's"),
		(NULL,"Special Offer"),
		(NULL,"Kuscheltiere"),
		(NULL,"Möbel"),
		(NULL,"Schmuck");



INSERT INTO tblArtikel
VALUES  (1,"40er Kette","Eine Schmuckkette, mit glitzer Optik.",1,5.99,2,6),
        (2,"Buffetschrank Kröte","Ein sehr schöner schnuckeliger Schrank.",1,33.49,4,5),
        (3,"Buffetschrank North Sea","Ein sehr schöner Schrank, mit North Sea Optik.",1,69.99,4,5),
        (4,"Buffetschrank weiß","Ein sehr schöner weißer Schrank.",1,29.99,4,5),   
        (5,"gelbe Vase","Eine gelbe Vase, in Flaschenoptik.",1,2.99,3,5),
        (6,"Glaskugel","Für eine glänzende Zukunftsvorhersage.",1,1.99,2,5),
        (7,"Glasvasen","Kristallklare Glasvasen, die das mögen.",1,6.99,4,5),
        (8,"Halbedelsteinkette","Ein sehr schöner weißer Schrank.",1,17.09,1,6),
        (9,"Kleid","Ein rotes Vintage Kleid, mit Mustern.",1,7.99,4,1),
        (10,"Körnerkatze","Eine süße Miezekatze, mit Körnerkissen.",1,4.99,3,4),
        (11,"Kommodemonster","Wer hat das Kommodemonster freigelassen?",1,8.99,4,5),
        (12,"Micky Maus","Willkommen in Mickey Maus Wunderhaus.",1,3.79,4,5),
        (13,"schwarzer Rock","Ein schwarzes Vintage Kleid, mit Lila Mustern.",1,5.99,4,1),
        (14,"Rosenthalvase","Vase, mit künstlerischen Touch.",1,9.49,1,5),
        (15,"Schale 1","Vase mit Indianer Mustern.",1,3.99,1,5),
        (16,"Schale 2","Vase mit Nazar Amulett Replica",1,3.99,1,5),                                              
        (17,"Sideboard Krokodil","Yes! Lucky me. The Sewers of Paris! Crocodile Heaven!",1,14.99,4,5);


INSERT INTO tblBild
VALUES 	("/images/artikelbilder/40erkette.jpg",1),
		("/images/artikelbilder/buffetschrankkroete.jpg",2),
		("/images/artikelbilder/buffetschranknorthsea.jpg",3),
		("/images/artikelbilder/buffetschrankweiss.jpg",4),
		("/images/artikelbilder/gelbevase.jpg",5),
		("/images/artikelbilder/glaskugel.jpg",6),
		("/images/artikelbilder/glasvasen.jpg",7),
		("/images/artikelbilder/halbedelsteinkette.jpg",8),
		("/images/artikelbilder/kleid.jpg",9),
		("/images/artikelbilder/koernerkatze.jpg",10),
		("/images/artikelbilder/kommodemonster.jpg",11),
		("/images/artikelbilder/mickymaus.jpg",12),
		("/images/artikelbilder/rockschwarz.jpg",13),
		("/images/artikelbilder/rosenthalvase.jpg",14),
		("/images/artikelbilder/schale1.jpg",15),
		("/images/artikelbilder/schale2.jpg",16),
		("/images/artikelbilder/sideboardkroko.jpg",17);


## BENUTZER

CREATE USER 'adaKunde'@'%' IDENTIFIED BY 'geheim';

GRANT SELECT ON * TO adaKunde; # LESE ZUGRIFF AUF ALLE TABELLEN

GRANT INSERT,UPDATE,DELETE ON tblKunde TO adaKunde; 
GRANT INSERT,UPDATE,DELETE ON tblBestellung TO adaKunde;
GRANT INSERT,UPDATE,DELETE ON tblZustand TO adaKunde;



-- EINEN ARTIKEL MIT ZUSTAND, KATEGORIE AUSGEBEN
-- SELECT *
-- FROM tblArtikel
-- LEFT JOIN tblBild ON tblArtikel.p_artID = tblBild.f_artID
-- RIGHT JOIN tblZustand ON tblArtikel.f_zustID = p_zustID
-- RIGHT JOIN tblKategorie ON tblArtikel.f_katID = p_katID; 