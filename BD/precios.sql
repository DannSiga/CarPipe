CREATE TABLE precios(
    id_precio	 INT (11) not null auto_increment primary key,
	cantidad	 varchar(100) NULL,	
	diagnostico	 varchar(50)	NULL,
	precio	     varchar(255) NULL,
	estado	     varchar(255) NULL,
    
	fyh_crea    datetime, 
	fyh_actua	datetime
	fyh_elimi   datetime
    );
