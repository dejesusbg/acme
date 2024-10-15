INSERT INTO
    grado(nombre)
VALUES
    ('Sexto'),
    ('Séptimo'),
    ('Octavo'),
    ('Noveno'),
    ('Décimo'),
    ('Undécimo');

INSERT INTO
    categoria(nombre)
VALUES
    ('Personero'),
    ('Contralor');

INSERT INTO
    estado_del_voto(nombre)
VALUES
    ('Pendiente'),
    ('En proceso'),
    ('Válido');

INSERT INTO
    mesa(nombre)
VALUES
    ("#1"),
    ("#2");

INSERT INTO
    grupo(nombre, id_grado, id_mesa)
VALUES
    ('A', 1, 1),
    ('A', 2, 1),
    ('A', 3, 1),
    ('A', 4, 1),
    ('A', 5, 2),
    ('A', 6, 2);

INSERT INTO
    rol(nombre)
VALUES
    ("Solo votante"),
    ("Admin"),
    ("Jurado"),
    ("Testigo"),
    ("Candidato");

INSERT INTO
    usuario(
        nombre,
        correo,
        clave,
        nacimiento,
        id_grupo,
        id_rol
    )
VALUES
    (
        'Ricardo Barrios',
        'ricardo@acme.com',
        'clave358',
        '2005-08-03',
        6,
        2
    ),
    (
        'Gianmarco Gambín',
        'gianmarco@acme.com',
        'clave202',
        '2004-01-26',
        6,
        2
    ),
    (
        'Snoopy María Gutiérrez Torres',
        'snoopy@acme.com',
        'clave864',
        '2008-10-07',
        1,
        1
    ),
    (
        'Fred Ricardo Flintstone Rodríguez',
        'fred@acme.com',
        'clave321',
        '2003-06-20',
        1,
        1
    ),
    (
        'Homero Luis Pérez Jaramillo',
        'homero@acme.com',
        'clave654',
        '2007-09-15',
        1,
        1
    ),
    (
        'Pedro Esteban Sánchez García',
        'pedro@acme.com',
        'clave987',
        '2006-03-08',
        2,
        1
    ),
    (
        'Lisa María González Vargas',
        'lisa@acme.com',
        'clave246',
        '2009-01-17',
        2,
        1
    ),
    (
        'Bart Andrés Hernández Torres',
        'bart@acme.com',
        'clave579',
        '2004-07-22',
        2,
        1
    ),
    (
        'Maggie Paola Díaz Gómez',
        'maggie@acme.com',
        'clave864',
        '2007-05-11',
        3,
        1
    ),
    (
        'Charlie David Gómez Martínez',
        'charlie@acme.com',
        'clave135',
        '2002-10-30',
        3,
        1
    ),
    (
        'Lucy Ana Rodríguez López',
        'lucy@acme.com',
        'clave468',
        '2009-12-28',
        3,
        1
    ),
    (
        'Linus José García Soto',
        'linus@acme.com',
        'clave791',
        '2001-04-03',
        4,
        1
    ),
    (
        'Scooby Diego Ríos Moreno',
        'scooby@acme.com',
        'clave234',
        '2008-08-14',
        4,
        1
    ),
    (
        'Shaggy Juan Pérez Gutiérrez',
        'shaggy@acme.com',
        'clave567',
        '2003-02-27',
        4,
        1
    ),
    (
        'Daphne María López Ramírez',
        'daphne@acme.com',
        'clave890',
        '2006-06-10',
        5,
        3
    ),
    (
        'Velma Patricia Sánchez Silva',
        'velma@acme.com',
        'clave123',
        '2000-03-04',
        5,
        3
    ),
    (
        'Bob Esponja Luis Gómez Ochoa',
        'bob@acme.com',
        'clave456',
        '2008-11-21',
        5,
        3
    ),
    (
        'Patricio Carlos Ramírez Rojas',
        'patricio@acme.com',
        'clave789',
        '2004-09-02',
        5,
        3
    ),
    (
        'Calamardo Andrés Martínez Hernández',
        'calamardo@acme.com',
        'clave321',
        '2007-01-19',
        5,
        4
    ),
    (
        'Clara María Rojas Sánchez',
        'clara@acme.com',
        'clave654',
        '2002-05-26',
        5,
        4
    ),
    (
        'José Pedro Pérez García',
        'jose@acme.com',
        'clave987',
        '2005-07-09',
        6,
        5
    ),
    (
        'Morty Esteban López Ramírez',
        'morty@acme.com',
        'clave246',
        '2009-04-13',
        6,
        5
    ),
    (
        'Rick José Díaz Vargas',
        'rick@acme.com',
        'clave579',
        '2001-08-28',
        6,
        5
    ),
    (
        'Betty Laura Marmol Pedraza',
        'betty@acme.com',
        'clave123',
        '2005-08-12',
        6,
        5
    ),
    (
        'Vilma Johana Picapiedra Lisa',
        'vilma@acme.com',
        'clave456',
        '2008-04-25',
        6,
        5
    ),
    (
        'Marge Rosa Simpson Acevedo',
        'marge@acme.com',
        'clave789',
        '2000-11-03',
        6,
        5
    );

INSERT INTO
    jurado(id, id_mesa)
VALUES
    (15, 1),
    (16, 1),
    (17, 2),
    (18, 2);

INSERT INTO
    testigo(id, id_mesa)
VALUES
    (19, 1),
    (20, 2);

INSERT INTO
    candidato(id, numero, id_categoria)
VALUES
    (21, "01", 1),
    (22, "02", 1),
    (23, "03", 1),
    (24, "01", 2),
    (25, "02", 2),
    (26, "03", 2);