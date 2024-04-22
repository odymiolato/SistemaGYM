CREATE TABLE Ventas(
	numfac int primary key auto_increment, 
	idCliente  int,
	nombreCli varchar(100) not null,
    fecha  date not null,
    total numeric(18,2) not null,
    FOREIGN KEY (idCliente) REFERENCES Cliente(idCliente)
);

CREATE TABLE Ventas_detalle(
	numfac int,
	ID_Articulo  int,
    precio  numeric(18,2),
    cantidad numeric(18,2),
    ilmporte numeric(18,2),
    primary key(numfac,ID_Articulo),
	FOREIGN KEY (ID_Articulo) REFERENCES Articulos(ID_Articulo),
    FOREIGN KEY (numfac) REFERENCES Ventas(numfac)
);



DELIMITER //

CREATE TRIGGER movimiento_inventario AFTER INSERT ON Ventas_detalle 
FOR EACH ROW
BEGIN
    INSERT INTO inventario (ID_Articulo, Cantidad_Disponible, tipmov)
    VALUES (NEW.ID_Articulo, NEW.cantidad, 0);
END;
//

DELIMITER ;


-- menu
-- https://codepen.io/Creaticode/pen/jOXpzd