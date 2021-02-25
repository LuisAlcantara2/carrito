create table VENTA(
    codventa serial primary key,
    numero_ticket int,
    fecha date,
    subtotal decimal(10,2),
    igv decimal(10,2),
    total decimal(10,2),
    estado int,
    codcliente int
);

create table CLIENTE(
    codcliente serial primary key,
    nombre varchar(100),
    direccion varchar(80),
    rucdni varchar(10),
    email varchar(40),
    password varchar(255)
);


create table DETALLEVENTA(
    coddetalle serial primary key,
    precio decimal(10,2),
    cantidad int,
    codventa int,
    codproducto int
);


create table PRODUCTO(
    codproducto serial primary key,
    nombre varchar (40),
    precio decimal(10,2),
    stock int,
    imagen text,
    descripcion text,
    codcategoria int
);

create table CATEGORIA(
    codcategoria serial primary key,
    descripcion varchar(40)
);

insert into users("name","email","password")
values('admin','admin@gmail.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

INSERT INTO categoria(descripcion)
	VALUES ('Pantalon');

INSERT INTO categoria(descripcion)
	VALUES ('Camisa');

INSERT INTO producto(
	nombre, precio, stock, imagen, descripcion, codcategoria)
	VALUES ('PANTALÓN VESTIR INVIERNO', '30', '6', 'https://civ-sa.com/13-thickbox_default/pantalon-vestir-invierno.jpg', 'Pantalón de vestir, microfibra con trincha de fliselina, 2 bolsillos delanteros inclinados, relojera, 1 bolsillo trasero cortados con ojal y botón.', '1');
  
INSERT INTO producto(
	nombre, precio, stock, imagen, descripcion, codcategoria)
	VALUES ('PANTALON VESTIR CONFORT', '35', '3', 'https://rochasshop.com.ar/wp-content/uploads/2020/04/Pantalon01_vestir_S_%C2%B4_100_azul_rochas.jpg', 'Pantalon de vestir colo azul.', '1');
  
INSERT INTO producto(
	nombre, precio, stock, imagen, descripcion, codcategoria)
	VALUES ('Camisa Manga Corta color Gris', '20', '3', 'https://cdn1.coppel.com/images/catalog/pr/1126532-1.jpg', '¡Un toque de elegancia para tu look! Perfeccionada tu atuendo con esta camisa de vestir CAT, el complemento que no te puede faltar.  Es un modelo diseñado en color gris, por lo que ofrece una apariencia elegante y neutral que podrás combinar con todo. Mientras que su confección brinda la comodidad idónea para tu día a día.', '2');

INSERT INTO cliente(
	nombre, direccion, rucdni, email, password)
	VALUES ('Steven Valderrama', 'Jr trujillo 816', '70259401', 'sv@gmail.com', '123');

