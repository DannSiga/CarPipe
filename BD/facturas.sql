CREATE TABLE facturas(
    id_fact         INT (11) not null auto_increment primary key,
    id_inf         varchar(225) null,
    no_fact         varchar(225) null,
    idCliente       varchar(225) null,
    fecha_fact      varchar(225)null,
    fecha_ingreso   varchar(225)null,
    hora_ingreso    varchar(225)null,
    responsable     varchar(225)null,
    cubiculo        varchar(225)null,
    diagnostico     varchar(225)null,
    total           varchar(225)null,
    monto_total     varchar(225)null,
    monto_lit       varchar(225)null,
    cantidad        varchar(225)null,

    fecha_salida    varchar(225)null,
    hora_salida     varchar(225)null,
    qr              varchar(225)null,

    fyh_crea        datetime null,
    fyh_eli         datetime null,
    fyh_act         datetime null,
    estado          varchar(10)
);