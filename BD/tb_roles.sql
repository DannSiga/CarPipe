create table tb_roles(
    id_rol           int(11) not null auto_increment primary key
    rol        varchar(255) null,
    fyh_creacion datetime null,
    fyh_eliminacion datetime null,
    fyh_actualizacion datetime null,
    estado varchar(10)
);
