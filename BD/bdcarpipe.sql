create database bd_carpi character set utf8mb4 collate utf8mb4_unicode_ci;
show databases;
Use bd_carpi;

CREATE TABLE Mecanico(
id_usua int auto_increment primary key,
nombre varchar(100) not null,
apellido varchar(150) not null,
celular varchar(100),
correo varchar(100) not null,
clave varchar(200) not null,
estado tinyint default 1,
fecha_creacion timestamp not null default current_timestamp
) engine=INNODB;

create table Carro(
idCarro int auto_increment primary key,
modelo varchar(100),
marca varchar(100),
placa varchar(50),
idCliente int not null,
fecha_creacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
 FOREIGN KEY (idCliente)
        REFERENCES clientes (idCliente)
        ON UPDATE CASCADE ON DELETE RESTRICT
);

create table clientes(
idCliente int auto_increment primary key,
nombre varchar(100),
telefono varchar(50)
);

create table tipoDoc(
idocument int auto_increment primary key,
nombre varchar(150) not null,
estado tinyint default 1,
fecha_creacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE=INNODB;



show tables;

create table proveedores(
idProve int auto_increment primary key,
raznsocial varchar(200) not null,
representante varchar(100) not null, 
telefono varchar(100) not null,
correo varchar(100) not null,
estado tinyint default 1,
fecha_creacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE=INNODB;

create table compras(
idcompra int auto_increment primary key,
  idCliente int not null,
    id_usua INT NOT NULL,
    idProve int not null,
     precio DECIMAL(20 , 2 ) NOT NULL,
    estado TINYINT DEFAULT 1,
	fecha_creacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
       FOREIGN KEY (id_usua)
        REFERENCES usuario (id_usua)
        ON UPDATE CASCADE ON DELETE RESTRICT,
         FOREIGN KEY (idProve)
        REFERENCES proveedores(idProve)
        ON UPDATE CASCADE ON DELETE RESTRICT
)ENGINE=INNODB;

create table detallesCompras(
id_detalle int auto_increment primary key,
 idcompra int not null,
 idrefac int not null,
 precio decimal(20,2) not null,
 cantidad int not null,
 foreign key(idcompra) references compras(idcompra) on update cascade on delete restrict,
 foreign key(idrefac) references Refacciones(idrefac) on update cascade on delete restrict
)ENGINE=INNODB;

CREATE TABLE Diagnosticos(
    id_dignos INT AUTO_INCREMENT PRIMARY KEY,
    idCliente int not null,
    id_usua INT NOT NULL,
    descripcion text,
    fechasal date,
    precio DECIMAL(20 , 2 ) NOT NULL,
    estado TINYINT DEFAULT 1,
	fecha_creacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idCliente)
        REFERENCES Clientes (idCliente)
        ON UPDATE CASCADE ON DELETE RESTRICT,
        FOREIGN KEY (id_usua)
        REFERENCES usuario (id_usua)
        ON UPDATE CASCADE ON DELETE RESTRICT
)  ENGINE=INNODB;

create table TipSer(
idtipser int auto_increment primary key,
nombre varchar(150) not null,
estado tinyint default 1,
fecha_creacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE=INNODB;

create table Refacciones(
idrefac int auto_increment primary key,
nombre varchar(200) not null,
no_serie varchar(100) not null,
descripcion text,
idtipser int not null,
precio decimal (20,2) not null,
estado tinyint default 1,
imagen varchar(250),
stockmin int not null,
stock int not null
)ENGINE=INNODB;

create table detallesMec(
id_detalle int auto_increment primary key,
 id_diagnos int not null,
 idrefac int not null,
 cantidad int not null,
 foreign key(id_diagnos) references Diagnostios(id_diagnos) on update cascade on delete restrict,
 foreign key(idrefac) references Refacciones(idrefac) on update cascade on delete restrict
)ENGINE=INNODB;

Create table Carpipe(
razon_social varchar(20)not null,
correo varchar(100) not null,
telefono varchar(20) not null,
localidad varchar(200) not null,
logo varchar(200) not null,
fecha_creacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE=INNODB;

show tables;

drop table tipoDoc;

show columns from Mecanica;

drop database bd_carpi;




 
