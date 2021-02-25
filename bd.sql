create table VENTA(
    codventa serial primary key,
    numero int,
    numero_ticket int,
    fecha date,
    subtotal decimal(10,2),
    igv decimal(10,2),
    total decimal(10,2),
    estado int,
    id int,
    codcliente int
);

create table CLIENTE(
    codcliente serial primary key,
    nombre varchar(100),
    direccion varchar(80),
    ruc_dni varchar(10),
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
values('admin','admin@gmail.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi')


