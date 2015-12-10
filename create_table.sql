CREATE DATABASE webpage;

CREATE TABLE webpage.haka_wohnen_db
(
Ind INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),

wohnung varchar(255),
preis INT,
zimmer INT,
flaeche INT,
beschreibung varchar(255),
kueche TEXT,
bad TEXT,
boden TEXT,
energieausweis varchar(255),
heizung varchar(255),
restaurierung varchar(255),
kalt INT,
warm INT,
kaution INT,
etage INT,
garage varchar(255),

)
