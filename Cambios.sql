
alter table cliente drop CONSTRAINT cliente_ibfk_2
alter table cliente add CONSTRAINT FOREIGN KEY (idMembresia) REFERENCES membresia(idMembresia)
alter table cliente CHANGE idMembresia idMembresia int not null



alter table membresia add nombre VARCHAR(50) not null
alter table membresia drop constraint membresia_ibfk_1 
alter table membresia drop constraint membresia_ibfk_2 
alter table membresia drop column idCliente
alter table membresia drop column idPlan
alter table membresia drop COLUMN fechaInicio
alter table membresia CHANGE fechaFin DiasDuracion int not null