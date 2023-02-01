create table tb_mecanicos(
    id_usua            int(11) not null auto_increment primary key
    nombre             varchar(255) null,
    apellido           varchar(255) null,
    rol                 varchar(255) null,
    celular             varchar(255) null,
    estado              tinyint(4),
    fecha_creacion       datetime null,
    correo              varchar(255) null,
    correo_verificado   varchar(255) null,
    password_user       varchar(255) null,
    token               varchar(255) null,
    fecha_autualizacion  datetime null, 
    fecha_eliminacion     datetime null,
);
