CREATE TABLE tb_comprobante(
    id_compr      INT (11) not null auto_increment primary key,
    nombre        varchar(225) null,
    telefono           varchar(225) null,
    cubiculo      varchar(225)null,
    fecha_ingreso   varchar(225)null,
    hora_ingreso  varchar(225)null,
    responsable   varchar(225)null,
    observ        varchar(255)null,

    fyh_crea    datetime null,
    fyh_eli    datetime null,
    fyh_act    datetime null,
    estado     varchar(10)
);