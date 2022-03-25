CREATE TABLE `Usuaris` (
	`DNI` varchar(9) NOT NULL UNIQUE,
	`Nom` varchar(20) NOT NULL,
	`email` varchar(60) NOT NULL,
	`Cognoms` varchar(40) NOT NULL,
	`Imatge` varchar(60) NOT NULL DEFAULT '/img/defaultuser',
	PRIMARY KEY (`DNI`)
);

CREATE TABLE `Cursos` (
	`ID_curs` INT NOT NULL AUTO_INCREMENT,
	`Nom` varchar(30) NOT NULL,
	`Descripcio` varchar(255) NOT NULL,
	PRIMARY KEY (`ID_curs`)
);

CREATE TABLE `Colectius` (
	`ID_curs` INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`ID_curs`)
);

CREATE TABLE `Individuals` (
	`ID_curs` INT NOT NULL,
	PRIMARY KEY (`ID_curs`)
);

CREATE TABLE `Cursos` (
	`ID_curs` INT NOT NULL,
	`nivell` varchar(4) NOT NULL,
	PRIMARY KEY (`ID_curs`)
);

CREATE TABLE `Monitors` (
	`DNI` varchar(9) NOT NULL,
	`Nom` varchar(20) NOT NULL,
	`Cognoms` varchar(40) NOT NULL,
	`Telefon` INT(9) NOT NULL,
	`Email` varchar(60) NOT NULL,
	PRIMARY KEY (`DNI`)
);

CREATE TABLE `Ensenya` (
	`DNI` varchar(9) NOT NULL,
	`ID_curs` INT NOT NULL,
	PRIMARY KEY (`DNI`)
);

CREATE TABLE `Realitza` (
	`DNI` varchar(9) NOT NULL,
	`ID_curs` INT NOT NULL,
	`Preu_hora` DECIMAL(3) NOT NULL,
	`Num_hores` INT(2) NOT NULL,
	PRIMARY KEY (`DNI`)
);

CREATE TABLE `Federats` (
	`DNI` varchar(9) NOT NULL,
	`Num_federacio` varchar NOT NULL,
	`Nivell` varchar NOT NULL DEFAULT '4',
	PRIMARY KEY (`DNI`)
);

CREATE TABLE `Normals` (
	`DNI` varchar(9) NOT NULL,
	PRIMARY KEY (`DNI`)
);

CREATE TABLE `Familia_nombrosa` (
	`DNI` varchar(9) NOT NULL,
	`Num_carnet` varchar(14) NOT NULL,
	PRIMARY KEY (`DNI`)
);

ALTER TABLE `Colectius` ADD CONSTRAINT `Colectius_fk0` FOREIGN KEY (`ID_curs`) REFERENCES `Cursos`(`ID_curs`);

ALTER TABLE `Individuals` ADD CONSTRAINT `Individuals_fk0` FOREIGN KEY (`ID_curs`) REFERENCES `Cursos`(`ID_curs`);

ALTER TABLE `Cursos` ADD CONSTRAINT `Cursos_fk0` FOREIGN KEY (`ID_curs`) REFERENCES `Cursos`(`ID_curs`);

ALTER TABLE `Ensenya` ADD CONSTRAINT `Ensenya_fk0` FOREIGN KEY (`DNI`) REFERENCES `Monitors`(`DNI`);

ALTER TABLE `Ensenya` ADD CONSTRAINT `Ensenya_fk1` FOREIGN KEY (`ID_curs`) REFERENCES `Cursos`(`ID_curs`);

ALTER TABLE `Realitza` ADD CONSTRAINT `Realitza_fk0` FOREIGN KEY (`DNI`) REFERENCES `Usuaris`(`DNI`);

ALTER TABLE `Realitza` ADD CONSTRAINT `Realitza_fk1` FOREIGN KEY (`ID_curs`) REFERENCES `Cursos`(`ID_curs`);

ALTER TABLE `Federats` ADD CONSTRAINT `Federats_fk0` FOREIGN KEY (`DNI`) REFERENCES `Usuaris`(`DNI`);

ALTER TABLE `Normals` ADD CONSTRAINT `Normals_fk0` FOREIGN KEY (`DNI`) REFERENCES `Usuaris`(`DNI`);

ALTER TABLE `Familia_nombrosa` ADD CONSTRAINT `Familia_nombrosa_fk0` FOREIGN KEY (`DNI`) REFERENCES `Usuaris`(`DNI`);












