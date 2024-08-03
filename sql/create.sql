CREATE TABLE IF NOT EXISTS `grupo`(
    `id` INT AUTO_INCREMENT NOT NULL UNIQUE,
    `nombre` varchar(32) NOT NULL,
    `id_grado` INT NOT NULL,
    `id_mesa` INT NOT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE IF NOT EXISTS `grado`(
    `id` INT AUTO_INCREMENT NOT NULL UNIQUE,
    `nombre` varchar(32) NOT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE IF NOT EXISTS `voto`(
    `id` INT AUTO_INCREMENT NOT NULL UNIQUE,
    `id_mesa` INT NOT NULL,
    `id_candidato` INT,
    PRIMARY KEY(`id`)
);

CREATE TABLE IF NOT EXISTS `estado_del_voto`(
    `id` INT AUTO_INCREMENT NOT NULL UNIQUE,
    `nombre` varchar(32) NOT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE IF NOT EXISTS `candidato`(
    `id` INT NOT NULL UNIQUE,
    `numero` varchar(32) NOT NULL,
    `id_categoria` INT NOT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE IF NOT EXISTS `testigo`(
    `id` INT NOT NULL UNIQUE,
    `id_mesa` INT NOT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE IF NOT EXISTS `jurado`(
    `id` INT NOT NULL UNIQUE,
    `id_mesa` INT NOT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE IF NOT EXISTS `mesa`(
    `id` INT AUTO_INCREMENT NOT NULL UNIQUE,
    `nombre` varchar(32) NOT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE IF NOT EXISTS `usuario`(
    `id` INT AUTO_INCREMENT NOT NULL UNIQUE,
    `nombre` VARCHAR(64) NOT NULL,
    `correo` varchar(32) NOT NULL UNIQUE,
    `clave` varchar(32) NOT NULL,
    `nacimiento` DATE NOT NULL,
    `foto` LONGBLOB,
    `id_grupo` INT NOT NULL,
    `id_estado` INT NOT NULL DEFAULT '1',
    `id_rol` INT NOT NULL DEFAULT '1',
    PRIMARY KEY(`id`)
);

CREATE TABLE IF NOT EXISTS `categoria`(
    `id` INT AUTO_INCREMENT NOT NULL UNIQUE,
    `nombre` varchar(32) NOT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE IF NOT EXISTS `rol`(
    `id` INT AUTO_INCREMENT NOT NULL UNIQUE,
    `nombre` varchar(32) NOT NULL,
    PRIMARY KEY(`id`)
);

ALTER TABLE
    `grupo`
ADD
    CONSTRAINT `grupo_fk0` FOREIGN KEY(`id_grado`) REFERENCES `grado`(`id`);

ALTER TABLE
    `grupo`
ADD
    CONSTRAINT `grupo_fk1` FOREIGN KEY(`id_mesa`) REFERENCES `mesa`(`id`);

ALTER TABLE
    `voto`
ADD
    CONSTRAINT `voto_fk0` FOREIGN KEY(`id_mesa`) REFERENCES `mesa`(`id`);

ALTER TABLE
    `voto`
ADD
    CONSTRAINT `voto_fk1` FOREIGN KEY(`id_candidato`) REFERENCES `candidato`(`id`);

ALTER TABLE
    `candidato`
ADD
    CONSTRAINT `candidato_fk0` FOREIGN KEY(`id`) REFERENCES `usuario`(`id`);

ALTER TABLE
    `candidato`
ADD
    CONSTRAINT `candidato_fk1` FOREIGN KEY(`id_categoria`) REFERENCES `categoria`(`id`);

ALTER TABLE
    `testigo`
ADD
    CONSTRAINT `testigo_fk0` FOREIGN KEY(`id`) REFERENCES `usuario`(`id`);

ALTER TABLE
    `testigo`
ADD
    CONSTRAINT `testigo_fk1` FOREIGN KEY(`id_mesa`) REFERENCES `mesa`(`id`);

ALTER TABLE
    `jurado`
ADD
    CONSTRAINT `jurado_fk0` FOREIGN KEY(`id`) REFERENCES `usuario`(`id`);

ALTER TABLE
    `jurado`
ADD
    CONSTRAINT `jurado_fk1` FOREIGN KEY(`id_mesa`) REFERENCES `mesa`(`id`);

ALTER TABLE
    `usuario`
ADD
    CONSTRAINT `usuario_fk0` FOREIGN KEY(`id_grupo`) REFERENCES `grupo`(`id`);

ALTER TABLE
    `usuario`
ADD
    CONSTRAINT `usuario_fk1` FOREIGN KEY(`id_estado`) REFERENCES `estado_del_voto`(`id`);

ALTER TABLE
    `usuario`
ADD
    CONSTRAINT `usuario_fk2` FOREIGN KEY(`id_rol`) REFERENCES `rol`(`id`);