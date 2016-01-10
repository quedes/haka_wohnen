CREATE DATABASE IF NOT EXISTS haka_wohnen;
USE haka_wohnen;


CREATE TABLE IF NOT EXISTS Lagen (
_id          INT NOT NULL UNIQUE,
beschreibung TEXT,

PRIMARY KEY(_id)
);


CREATE TABLE IF NOT EXISTS Angebote (
_id              INT NOT NULL UNIQUE,
name             TEXT,
flaeche          FLOAT,
zimmer           INT unsigned,
etage            TEXT,
kaltmiete        FLOAT,
warmmiete        FLOAT,
kaution          TEXT,
frei_ab          TEXT,
fussboden        TEXT,
heizungsart      TEXT,
energieeffizienz TEXT,
fenster          TEXT,
bad              TEXT,
parken           TEXT,
zustand          TEXT,
sonstiges        TEXT,

lage             INT NOT NULL,

PRIMARY KEY(_id),
FOREIGN KEY (lage) REFERENCES Lagen(_id)
);


GRANT SELECT ON haka_wohnen.Angebote TO 'webserver'@'localhost';
GRANT SELECT ON haka_wohnen.Lagen    TO 'webserver'@'localhost';


SHOW TABLES;
