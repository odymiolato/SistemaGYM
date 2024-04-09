CREATE TABLE Articulos (
    ID_Articulo INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(255),
    Descripcion TEXT,
    Precio DECIMAL(10, 2)
);

CREATE TABLE Inventario (
    ID_Inventario INT AUTO_INCREMENT PRIMARY KEY,
    ID_Articulo INT,
    Cantidad_Disponible INT,
    tipmov BOOLEAN,
    FOREIGN KEY (ID_Articulo) REFERENCES Articulos(ID_Articulo)
);

CREATE TABLE Ventas (
    ID_Venta INT AUTO_INCREMENT PRIMARY KEY,
    Fecha_Hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ID_Articulo INT,
    Cantidad_Vendida INT,
    Precio_Venta_Total DECIMAL(10, 2),
    FOREIGN KEY (ID_Articulo) REFERENCES Articulos(ID_Articulo)
);

CREATE TABLE Detalle_Venta (
    ID_Detalle INT AUTO_INCREMENT PRIMARY KEY,
    ID_Venta INT,
    ID_Articulo INT,
    Cantidad_Vendida INT,
    Precio_Unitario DECIMAL(10, 2),
    Descuento DECIMAL(5, 2),
    Subtotal DECIMAL(10, 2),
    FOREIGN KEY (ID_Venta) REFERENCES Ventas(ID_Venta),
    FOREIGN KEY (ID_Articulo) REFERENCES Articulos(ID_Articulo)
);

