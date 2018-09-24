
CREATE VIEW ALUMNORESPONSABLE AS
SELECT 
alu.id as 'ID Relación', 
alu.parentesco as 'Parentesco', 
alu.contacto as 'Contacto', 
per.id  as 'ID Responsable',   
CONCAT(per.PNombre ,  ' ', per.ApPat) as 'Nombre Responsable',  
per.rut as 'Rut Responsable',  
alu.idAlumno as 'Alumno',
alumn.idPersona as 'PersonaAl',
personaAlumno.rut as 'RutAl',
personaAlumno.PNombre as 'NombreAl'

FROM personas per
JOIN alumno_responsable alu
ON per.id=alu.idPersona
LEFT JOIN alumnos alumn
ON alumn.id=alu.idAlumno
LEFT JOIN personas personaAlumno
ON personaAlumno.id=alumn.idPersona;


CREATE OR REPLACE VIEW TIPOPERSONA AS
SELECT 
tipo_persona.id AS 'IDTIPOPERSONA', 
tipos.nombre AS 'NOMBRETIPO',
personas.id  AS 'IDPERSONA',
personas.rut  AS 'RUT',
personas.PNombre  AS 'NOMBREPERSONA'

FROM tipo_persona 
JOIN personas 
ON tipo_persona.idPersona=personas.id
LEFT JOIN tipos 
ON tipos.id=tipo_persona.idTipo;

