DROP DATABASE IF EXISTS bioskopDB;
CREATE DATABASE bioskopDB;
USE bioskopDB;

CREATE TABLE pelanggan (
   id                INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
   nama              VARCHAR(50) NOT NULL,
   judul             VARCHAR(50) NOT NULL,
   jam               TIME NOT NULL,
   jumlah_tiket      INT(11) NOT NULL,
   no_kursi          VARCHAR(5) NOT NULL,
   no_telp           INT(10) NOT NULL
);


