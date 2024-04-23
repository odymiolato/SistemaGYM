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





CREATE DEFINER=`root`@`localhost` FUNCTION `Existencia_art`(id_Articulo INT) RETURNS int(11)
BEGIN
    DECLARE entrada INT;
    DECLARE salida INT;
		
		set entrada = 0;
		set salida = 0;
    
    SELECT coalesce(SUM(CASE WHEN inv.tipmov = 1 THEN inv.Cantidad_Disponible ELSE 0 END),0) INTO entrada
    FROM Inventario AS inv 
    WHERE inv.ID_Articulo = id_Articulo;
    
    SELECT coalesce(SUM(CASE WHEN inv.tipmov = 0 THEN inv.Cantidad_Disponible ELSE 0 END),0) INTO salida
    FROM Inventario AS inv 
    WHERE inv.ID_Articulo = id_Articulo;
    
    RETURN (entrada - salida);
END


-- menu
-- https://codepen.io/Creaticode/pen/jOXpzd