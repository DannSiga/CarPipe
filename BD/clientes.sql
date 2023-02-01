CREATE TABLE cliente(
    idCliente	        INT (11) not null auto_increment primary key,
	nombre	        varchar(100) NULL,	
	telefono	    varchar(50)	NULL,
	placa_auto	    varchar(255) NULL,
	estado	        varchar(255) NULL,
    
	fyh_creacion	    datetime, 
	fyh_actualizacion	datetime
	fyh_elimacion	    datetime
    );