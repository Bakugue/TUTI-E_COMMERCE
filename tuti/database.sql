-- 1. ERROR: 'number' no existe en MySQL, se usa 'decimal'
CREATE TABLE PRODUCTO(
    codpro int not null AUTO_INCREMENT,
    nompro varchar(50) null,
    despro varchar(100) null,
    prepro decimal(6,2) null, -- Cambiado de number a decimal
    estado int null,
    rutimapro varchar(100) null, -- Lo agregamos aquí directamente
    CONSTRAINT pk_producto PRIMARY KEY (codpro)
);

-- 2. Insertamos los productos (quitamos el TRUNCATE porque la tabla es nueva)
INSERT INTO PRODUCTO (nompro, despro, prepro, estado, rutimapro)
VALUES 
('Arroz Integral 1kg', 'Arroz de grano largo seleccionado', 3.50, 1, 'arroz.jpg'),
('Aceite Vegetal 1L', 'Aceite de girasol premium', 8.90, 1, 'aceite.jpg'),
('Leche Entera 1L', 'Leche de vaca fortificada', 4.20, 1, 'leche.jpg');

-- 3. Tabla de Usuarios
CREATE TABLE USUARIO(
    codusu int not null AUTO_INCREMENT,
    nomusu varchar(50),
    apeusu varchar(50),
    emausu varchar(50) not null,
    pasusu varchar(20) not null,
    estado int not null,
    CONSTRAINT pk_usuario PRIMARY KEY (codusu)
);

INSERT INTO USUARIO (nomusu,apeusu,emausu,pasusu,estado)
VALUES ('Usuario','Demo','correo@example.com','123456',1);

-- 4. Tabla de Pedidos 
-- ERROR: dirusuped y telusuped deben permitir NULL al principio 
-- para que el botón "Agregar" funcione sin pedir dirección aún.
CREATE TABLE PEDIDO(
    codped int not null AUTO_INCREMENT,
    codusu int not null,
    codpro int not null,
    fecped datetime not null,
    estado int not null,
    dirusuped varchar(150) null, -- Cambiado a NULL y más largo
    telusuped varchar(15) null,  -- Cambiado a NULL
    token varchar(30) null,      -- Lo agregamos aquí directamente
    PRIMARY KEY (codped)
);