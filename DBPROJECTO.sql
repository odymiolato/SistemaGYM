-- CREATE DATABASE  gymproject;

-- USE gymproject;

CREATE TABLE tercero (
    idTercero INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50)
);

CREATE TABLE persona (
    idPersona INT PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(50) not null,
    apellido VARCHAR(50),
    cedula VARCHAR(13),
    direccion VARCHAR(100),
    telefono VARCHAR(16),
    email VARCHAR(50)
);

CREATE TABLE usuario (
    idUsuario INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(25) UNIQUE,
    psw VARCHAR(200),
    estado TINYINT(1)
);

select * from usuario;

CREATE TABLE cambiosUsuario (
    idUsuario INT,
    usuario VARCHAR(25),
    psw VARCHAR(200),
    estado TINYINT(1),
    fechaCambio DATETIME,
    responsable INT,
    FOREIGN KEY (responsable) REFERENCES usuario(idUsuario),
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario)
);

CREATE TABLE permisosUsuario (
    idUsuario INT,
    adminTab TINYINT(1),
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario)
);

CREATE TABLE posicion (
    idPosicion INT PRIMARY KEY AUTO_INCREMENT,
    posicion VARCHAR(45),
    sueldo DECIMAL(10, 2),
    descripcion VARCHAR(250),
    fechaCreado DATETIME,
    creador INT,
    estado TINYINT(1),
    FOREIGN KEY (creador) REFERENCES usuario(idUsuario)
);

CREATE TABLE cambiosPosicion (
    idPosicion INT,
    posicion VARCHAR(45),
    sueldo DECIMAL(10, 2),
    descripcion VARCHAR(250),
    responsable INT,
    estado TINYINT(1),
    fechaCambio DATETIME,
    FOREIGN KEY (idPosicion) REFERENCES posicion(idPosicion),
    FOREIGN KEY (responsable) REFERENCES usuario(idUsuario)
);

CREATE TABLE empleado (
    idEmpleado INT PRIMARY KEY,
    idPosicion INT,
    fechaEntrada DATE,
    fechaSalida DATE,
    estado TINYINT(1),
    fechaCreado DATETIME,
    creador INT,
    FOREIGN KEY (creador) REFERENCES usuario(idUsuario),
    FOREIGN KEY (idEmpleado) REFERENCES persona(idPersona),
    FOREIGN KEY (idPosicion) REFERENCES posicion(idPosicion)
);

CREATE TABLE cambiosEmpleado (
    idEmpleado INT,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    cedula VARCHAR(13),
    direccion VARCHAR(100),
    telefono VARCHAR(16),
    email VARCHAR(50),
    idPosicion INT,
    estado TINYINT(1),
    fechaCambio DATETIME,
    responsable INT,
    FOREIGN KEY (responsable) REFERENCES usuario(idUsuario),
    FOREIGN KEY (idEmpleado) REFERENCES empleado(idEmpleado),
    FOREIGN KEY (idPosicion) REFERENCES posicion(idPosicion)
);

CREATE TABLE tipoEjercicio (
    idTEjercicio INT PRIMARY KEY AUTO_INCREMENT,
    ejercicio VARCHAR(50),
    objetivo VARCHAR(50),
    creador INT,
    FOREIGN KEY (creador) REFERENCES usuario(idUsuario)
);

CREATE TABLE rutina (
    idRutina INT PRIMARY KEY AUTO_INCREMENT,
    descripcion VARCHAR(100),
    duration INT,
    detalles VARCHAR(10),
    creador INT,
    FOREIGN KEY (creador) REFERENCES usuario(idUsuario)
);

CREATE TABLE tEjercicioRutina (
    idRutina INT,
    idTEjercicio INT,
    FOREIGN KEY (idRutina) REFERENCES rutina(idRutina),
    FOREIGN KEY (idTEjercicio) REFERENCES tipoEjercicio(idTEjercicio)
);

CREATE TABLE plan (
    idPlan INT PRIMARY KEY AUTO_INCREMENT,
    plan VARCHAR(25),
    descripcion VARCHAR(100),
    precio DECIMAL(10, 2),
    inscripcion DECIMAL(10, 2),
    expiracion VARCHAR(30),
    estado TINYINT(1),
    creador INT,
    FOREIGN KEY (creador) REFERENCES usuario(idUsuario)
);

CREATE TABLE cambiosPlan (
    idPlan INT,
    plan VARCHAR(25),
    descripcion VARCHAR(100),
    precio DECIMAL(10, 2),
    inscripcion DECIMAL(10, 2),
    expiracion VARCHAR(30),
    estado TINYINT(1),
    fechaCambio DATETIME,
    responsable INT,
    FOREIGN KEY (idPlan) REFERENCES plan(idPlan),
    FOREIGN KEY (responsable) REFERENCES usuario(idUsuario)
);

CREATE TABLE cliente (
    idCliente INT PRIMARY KEY,
    idPlan INT,
    rutaFoto VARCHAR(150),
    fechaFoto DATETIME,
    limCred DECIMAL(10, 2),
    creador INT,
    fechaCreado DATETIME,
    estado TINYINT(1),
    FOREIGN KEY (idCliente) REFERENCES persona(idPersona),
    FOREIGN KEY (idPlan) REFERENCES plan(idPlan),
    FOREIGN KEY (creador) REFERENCES usuario(idUsuario)
);

CREATE TABLE cambiosCliente (
    idCliente INT,
    idPlan INT,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    direccion VARCHAR(100),
    telefono VARCHAR(16),
    email VARCHAR(50),
    limCred DECIMAL(10, 2),
    peso DECIMAL(10, 2),
    cuello DECIMAL(10, 2),
    brazo DECIMAL(10, 2),
    antebrazo DECIMAL(10, 2),
    pecho DECIMAL(10, 2),
    cintura DECIMAL(10, 2),
    cadera DECIMAL(10, 2),
    muslo DECIMAL(10, 2),
    pantorrilla DECIMAL(10, 2),
    responsable INT,
    fechaCambio DATETIME,
    estado TINYINT(1),
    FOREIGN KEY (idCliente) REFERENCES cliente(idCliente),
    FOREIGN KEY (idPlan) REFERENCES plan(idPlan),
    FOREIGN KEY (responsable) REFERENCES usuario(idUsuario)
);

CREATE TABLE sesionEntrenamiento (
    idSesionEntrenamiento INT PRIMARY KEY AUTO_INCREMENT,
    idCliente INT,
    idEmpleado INT,
    idRutina INT,
    fechaInicio DATETIME,
    fechaFin DATETIME,
    estado TINYINT(1),
    creador INT,
    FOREIGN KEY (idCliente) REFERENCES cliente(idCliente),
    FOREIGN KEY (idEmpleado) REFERENCES empleado(idEmpleado),
    FOREIGN KEY (idRutina) REFERENCES rutina(idRutina),
    FOREIGN KEY (creador) REFERENCES usuario(idUsuario)
);

CREATE TABLE cambiosSesionEntrenamiento (
    idSesionEntrenamiento INT,
    idCliente INT,
    idEmpleado INT,
    fechaInicio DATETIME,
    fechaFin DATETIME,
    responsable INT,
    FOREIGN KEY (idSesionEntrenamiento) REFERENCES sesionEntrenamiento(idSesionEntrenamiento),
    FOREIGN KEY (idCliente) REFERENCES cliente(idCliente),
    FOREIGN KEY (idEmpleado) REFERENCES empleado(idEmpleado),
    FOREIGN KEY (responsable) REFERENCES usuario(idUsuario)
);

CREATE TABLE clase (
    idClase INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    descripcion VARCHAR(100),
    capacidad INT,
    horario VARCHAR(100),
    fechaInicio DATETIME,
    fechaFin DATETIME,
    estado TINYINT(1)
);

CREATE TABLE asistencia (
    idAsistencia INT PRIMARY KEY AUTO_INCREMENT,
    idCliente INT,
    idSesionEntrenamiento INT,
    fechaAsistencia DATE,
    FOREIGN KEY (idCliente) REFERENCES cliente(idCliente),
    FOREIGN KEY (idSesionEntrenamiento) REFERENCES sesionEntrenamiento(idSesionEntrenamiento)
);

CREATE TABLE planEntrenamiento(
    idPlanEntrenamiento int primary key auto_increment,
    nombre varchar(50),
    descripcion varchar(255),
    creador int,
    FOREIGN KEY(creador) REFERENCES usuario(idUsuario)
);

CREATE TABLE clientePlanEntrenamiento(
    idCliente int,
    idPlanEntrenamiento int,
    fechaInicio date,
    fechaFin date,
    FOREIGN KEY(idCliente) REFERENCES cliente(idCliente),
    FOREIGN KEY(idPlanEntrenamiento) REFERENCES planEntrenamiento(idPlanEntrenamiento)
);

CREATE TABLE sesionesEntrenamiento(
    idSesionEntrenamiento int primary key auto_increment,
    idPlanEntrenamiento int,
    fecha date,
    descripcion varchar(255),
    FOREIGN KEY(idPlanEntrenamiento) REFERENCES planEntrenamiento(idPlanEntrenamiento)
);

CREATE TABLE detalleSesionEntrenamiento(
    idSesionEntrenamiento int,
    idTEjercicio int,
    series int,
    repeticiones int,
    carga decimal(10,2),
    FOREIGN KEY(idSesionEntrenamiento) REFERENCES sesionesEntrenamiento(idSesionEntrenamiento),
    FOREIGN KEY(idTEjercicio) REFERENCES tipoEjercicio(idTEjercicio)
);


CREATE TABLE horario(
    idHorario int primary key auto_increment,
    diaSemana varchar(20),
    horaInicio time,
    horaFin time
);

CREATE TABLE empleadoHorario(
    idEmpleado int,
    idHorario int,
    FOREIGN KEY(idEmpleado) REFERENCES empleado(idEmpleado),
    FOREIGN KEY(idHorario) REFERENCES horario(idHorario)
);

CREATE TABLE sesionesAsignadas(
    idEmpleado int,
    idCliente int,
    idHorario int,
    fecha date,
    FOREIGN KEY(idEmpleado) REFERENCES empleado(idEmpleado),
    FOREIGN KEY(idCliente) REFERENCES cliente(idCliente),
    FOREIGN KEY(idHorario) REFERENCES horario(idHorario)
);

CREATE TABLE calificacionEntrenamiento(
    idSesionEntrenamiento int,
    idCliente int,
    calificacion int,
    comentario varchar(255),
    FOREIGN KEY(idSesionEntrenamiento) REFERENCES sesionesEntrenamiento(idSesionEntrenamiento),
    FOREIGN KEY(idCliente) REFERENCES cliente(idCliente)
);

CREATE TABLE evaluacionFisica(
    idCliente int,
    fecha date,
    peso decimal(10,2),
    altura decimal(10,2),
    imc decimal(10,2),
    grasaCorporal decimal(10,2),
    masaMuscular decimal(10,2),
    metabolicAge int,
    visceralFat int,
    edadFisica int,
    FOREIGN KEY(idCliente) REFERENCES cliente(idCliente)
);

CREATE TABLE objetivosCliente(
    idCliente int,
    objetivo varchar(255),
    fechaInicio date,
    fechaFin date,
    cumplido tinyint(1),
    FOREIGN KEY(idCliente) REFERENCES cliente(idCliente)
);

CREATE TABLE seguimientoObjetivos(
    idCliente int,
    objetivo varchar(255),
    fecha date,
    cumplido tinyint(1),
    FOREIGN KEY(idCliente) REFERENCES cliente(idCliente)
);

CREATE TABLE comentarioCliente(
    idCliente int,
    comentario varchar(255),
    fecha date,
    FOREIGN KEY(idCliente) REFERENCES cliente(idCliente)
);

CREATE TABLE registroAsistencia(
    idCliente int,
    fecha date,
    asistio tinyint(1),
    FOREIGN KEY(idCliente) REFERENCES cliente(idCliente)
);

CREATE TABLE reservaClase(
    idCliente int,
    idClase int,
    fecha datetime,
    FOREIGN KEY(idCliente) REFERENCES cliente(idCliente),
    FOREIGN KEY(idClase) REFERENCES clase(idClase)
);

CREATE TABLE membresia (
    idMembresia INT PRIMARY KEY AUTO_INCREMENT,
    idCliente INT,
    idPlan INT,
    fechaInicio DATE,
    fechaFin DATE,
    estado TINYINT(1),
    creador INT,
    fechaCreacion DATETIME,
    FOREIGN KEY (idCliente) REFERENCES cliente(idCliente),
    FOREIGN KEY (idPlan) REFERENCES plan(idPlan),
    FOREIGN KEY (creador) REFERENCES usuario(idUsuario)
);

CREATE TABLE pagoMembresia(
    idCliente int,
    idMembresia int,
    fechaPago date,
    monto decimal(10, 2),
    FOREIGN KEY(idCliente) REFERENCES cliente(idCliente),
    FOREIGN KEY(idMembresia) REFERENCES membresia(idMembresia)
);

CREATE TABLE cambiosMembresia(
    idMembresia int,
    nombre varchar(50),
    descripcion varchar(255),
    precio decimal(10, 2),
    duracionMeses int,
    fechaCambio datetime,
    responsable int,
    FOREIGN KEY(idMembresia) REFERENCES membresia(idMembresia),
    FOREIGN KEY(responsable) REFERENCES usuario(idUsuario)
);


-- select * from information_schema.TABLES
--     INSERT INTO usuario (usuario, psw, estado)
-- VALUES ('administrador', 'eb184cc3e4469723f6afda6b176ebb49', 1);
-- INSERT INTO usuario (idUsuario, usuario, psw, estado)
-- VALUES (1, 'administrador', 'eb184cc3e4469723f6afda6b176ebb49', 1);


alter table cliente drop CONSTRAINT cliente_ibfk_2;
alter table cliente add CONSTRAINT FOREIGN KEY (idMembresia) REFERENCES membresia(idMembresia);
alter table cliente CHANGE idPlan idMembresia int not null;

select * from cliente;



alter table membresia add nombre VARCHAR(50) not null;
alter table membresia drop constraint membresia_ibfk_1;
alter table membresia drop constraint membresia_ibfk_2;
alter table membresia drop column idCliente;
alter table membresia drop column idPlan;
alter table membresia drop COLUMN fechaInicio;
alter table membresia CHANGE fechaFin DiasDuracion int not null;




