CREATE TABLE IF NOT EXISTS `web_ubicacion`(
    `id` INT AUTO_INCREMENT NOT NULL UNIQUE,
    `nombre` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `web_nav`(
    `id` INT NOT NULL,
    `nombre` VARCHAR(32) NOT NULL,
    `ruta` VARCHAR(32) NOT NULL,
    `icono` VARCHAR(32) NOT NULL,
    `id_web_ubicacion` INT NOT NULL,
    `id_rol` INT NOT NULL,
    PRIMARY KEY(`id`, `id_rol`)
);

CREATE TABLE IF NOT EXISTS `web_noticia` (
    `id` INT AUTO_INCREMENT NOT NULL UNIQUE,
    `titulo` VARCHAR(64) NOT NULL,
    `subtitulo` VARCHAR(64) NOT NULL,
    `descripcion` VARCHAR(512) NOT NULL,
    `imagen` VARCHAR(512) NOT NULL
);

ALTER TABLE
    `web_nav`
ADD
    CONSTRAINT `web_nav_fk0` FOREIGN KEY (`id_web_ubicacion`) REFERENCES `web_ubicacion`(`id`);

ALTER TABLE
    `web_nav`
ADD
    CONSTRAINT `web_nav_fk1` FOREIGN KEY (`id_rol`) REFERENCES `rol`(`id`);

INSERT INTO
    web_ubicacion(nombre)
VALUES
    ("./home"),
    ("./login"),
    ("./vote"),
    ("./sufrage"),
    ("./results"),
    ("./profile"),
    ("./password"),
    ("./admin");

INSERT INTO
    web_nav(
        id,
        nombre,
        ruta,
        icono,
        id_web_ubicacion,
        id_rol
    )
VALUES
    (
        1,
        'Inicio',
        '../inicio',
        'home',
        1,
        1
    ),
    (
        2,
        'Votacion',
        '../votar',
        'how_to_vote',
        3,
        1
    ),
    (
        3,
        'Resultados',
        '../resultados',
        'voting_chip',
        5,
        1
    ),
    (
        4,
        'Perfil',
        '../perfil',
        'person',
        6,
        1
    ),
    (
        1,
        'Inicio',
        '../inicio',
        'home',
        1,
        3
    ),
    (
        2,
        'Jurado',
        '../jurado',
        'how_to_vote',
        4,
        3
    ),
    (
        3,
        'Resultados',
        '../resultados',
        'voting_chip',
        5,
        3
    ),
    (
        4,
        'Perfil',
        '../perfil',
        'person',
        6,
        3
    ),
    (
        1,
        'Inicio',
        '../inicio',
        'home',
        1,
        4
    ),
    (
        2,
        'Testigo',
        '../testigo',
        'how_to_vote',
        4,
        4
    ),
    (
        3,
        'Resultados',
        '../resultados',
        'voting_chip',
        5,
        4
    ),
    (
        4,
        'Perfil',
        '../perfil',
        'person',
        6,
        4
    ),
    (
        1,
        'Inicio',
        '../inicio',
        'home',
        1,
        2
    ),
    (
        2,
        'Admin',
        '../admin',
        'admin_panel_settings',
        8,
        2
    ),
    (
        3,
        'Resultados',
        '../resultados',
        'voting_chip',
        5,
        2
    ),
    (
        4,
        'Perfil',
        '../perfil',
        'person',
        6,
        2
    );

INSERT INTO
    web_noticia(titulo, subtitulo, descripcion, imagen)
VALUES
    (
        '¿Quienes somos?',
        'Calificada como la #1 del municipio.',
        'La Escuela ACME, ubicada en el municipio de Warner Bros., es reconocida como una de las mejores instituciones educativas de la zona. Su excelencia académica, su enfoque en la formación integral de los estudiantes y su compromiso con la comunidad la convierten en una opción destacada para la educación de niños y jóvenes.',
        'https://t3.ftcdn.net/jpg/00/83/04/44/360_F_83044426_dsXCRyQuX3wLLECdq2YBb6v4bgz8JFbm.jpg'
    ),
    (
        'Felicidad',
        'Caras felices, mentes atentas.',
        'En la Escuela ACME, la felicidad de los estudiantes es una prioridad. Se promueve un ambiente positivo y acogedor, donde se fomenta el desarrollo de las habilidades sociales y emocionales, creando así una experiencia educativa integral y enriquecedora.',
        'https://img.freepik.com/foto-gratis/companeros-clase-pulgar-arriba-aula_1098-1243.jpg'
    ),
    (
        'Elecciones 2024',
        'Vota sabiamente.',
        '¡Prepárate! Se acercan las votaciones para elegir el nuevo Gobierno Escolar del Colegio ACME. Tu participación es importante para construir un futuro mejor para nuestra institución.',
        'https://cdn.cnn.com/cnnnext/dam/assets/171120095159-cnnee-chile-vote-generico-full-169.jpg'
    ),
    (
        'Próximamente',
        'Desde Abril 24 - Mayo 2.',
        '¡Descubre la magia de la ciencia en la Feria de Ciencias de nuestra escuela! Proyectos increíbles, experimentos fascinantes y mucho más te esperan. ¡No te lo pierdas!',
        'https://www.coldelvalle.edu.mx/wp-content/uploads/2023/09/10p.Que_es_una_feria_de_ciencias-min.jpg'
    ),
    (
        'Programa de alimentación',
        'Disponible desde las 10 hrs.',
        '¡Nutrición y energía para tu día! Almuerzos y refrigerios deliciosos y nutritivos para todos los estudiantes. ¡Buen provecho!',
        'https://mlnxeapoeleq.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://i0.wp.com/thebulldogsbark.com/wp-content/uploads/2023/09/almuerzo-escolar.webp?fit=1000%2C667&ssl=1'
    );