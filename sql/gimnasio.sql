DROP DATABASE IF EXISTS gimnasio;
CREATE DATABASE gimnasio;
USE gimnasio;

-- Tabla USER
CREATE TABLE user (
  id_user INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(70) NOT NULL,
  registration_date DATE NOT NULL,
  age INT NOT NULL,
  vip TINYINT(1) NOT NULL,
  observation TEXT NOT NULL,
  PRIMARY KEY (id_user)
);

INSERT INTO user VALUES
(1,'Carlos Pérez','carlos.perez@example.com','2024-03-15',29,1,'Asiste regularmente al gimnasio.'),
(2,'María López','maria.lopez@example.com','2024-04-02',34,0,'Prefiere clases de yoga.'),
(3,'Antonio García','antonio.garcia@example.com','2024-06-20',41,0,'Recientemente inscrito.'),
(4,'Lucía Fernández','lucia.fernandez@example.com','2024-08-11',25,1,'Usuaria activa en spinning.'),
(5,'David Ruiz','david.ruiz@example.com','2024-09-05',37,0,'Interesado en entrenamiento funcional.'),
(6,'Sara Gómez','sara.gomez@example.com','2024-09-18',28,1,'Participa en múltiples actividades.'),
(7,'Javier Ortega','javier.ortega@example.com','2024-10-03',32,0,'Nuevo socio en musculación.'),
(8,'Marta Sánchez','marta.sanchez@example.com','2024-11-10',30,1,'Le gusta el pilates.'),
(9,'Andrés Torres','andres.torres@example.com','2025-01-15',35,0,'Viene tres veces por semana.'),
(10,'Elena Martín','elena.martin@example.com','2025-02-20',27,1,'Participa en clases de cardio.');

-- Tabla ACTIVITY
CREATE TABLE activity (
  id_activity INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  description TEXT NOT NULL,
  activity_day DATETIME NOT NULL,
  duration DECIMAL(10,0) NOT NULL,
  available TINYINT(1) NOT NULL,
  id_trainer int NOT NULL,
  PRIMARY KEY (id_activity),
  CONSTRAINT FK_activity_user FOREIGN KEY (id_trainer) REFERENCES user(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO activity VALUES
(1,'Yoga','Sesión de relajación y estiramientos.','2025-01-10 10:00:00',2,1,1),
(2,'Spinning','Entrenamiento de alta intensidad en bicicleta.','2025-01-11 18:00:00',1,1,1),
(3,'CrossFit','Rutina de fuerza y resistencia.','2025-01-12 19:00:00',1,1,1),
(4,'Pilates','Fortalecimiento del core y mejora de la postura.','2025-01-13 09:00:00',1,1,1),
(5,'Zumba','Clase de baile y cardio con ritmo latino.','2025-01-14 17:00:00',1,1,2),
(6,'Boxeo','Entrenamiento de técnica y resistencia física.','2025-01-15 20:00:00',2,1,2),
(7,'Body Pump','Sesión de levantamiento de pesas con música.','2025-01-16 19:30:00',1,1,2),
(8,'Natación','Entrenamiento en piscina climatizada.','2025-01-17 08:30:00',1,1,2),
(9,'Cardio HIIT','Entrenamiento por intervalos de alta intensidad.','2025-01-18 18:30:00',1,1,2),
(10,'Funcional','Sesión de ejercicios de cuerpo completo.','2025-01-19 10:30:00',1,1,2);

-- Tabla ASSESSMENT
CREATE TABLE assessment (
  id_assessment INT NOT NULL AUTO_INCREMENT,
  value VARCHAR(20),
  PRIMARY KEY (id_assessment)
);

INSERT INTO assessment VALUES
(1,'excellent'),
(2,'good'),
(3,'average'),
(4,'poor');

-- Tabla RESERVATION
CREATE TABLE reservation (
  id_reservation INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(40) NOT NULL,
  id_user INT NOT NULL,
  id_activity INT NOT NULL,
  reservation_date DATE NOT NULL,
  is_active TINYINT(1) NOT NULL,
  id_assessment INT NULL,
  PRIMARY KEY (id_reservation),
  CONSTRAINT FK_reservation_user FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_reservation_activity FOREIGN KEY (id_activity) REFERENCES activity(id_activity) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_reservation_assessment FOREIGN KEY (id_assessment) REFERENCES assessment(id_assessment)
);

INSERT INTO reservation VALUES
(1,'Primera clase de yoga del año.',1,1,'2025-01-09',1,1),
(2,'Confirmada asistencia.',2,4,'2025-01-10',1,2),
(3,'Segunda reserva en spinning.',3,2,'2025-01-11',1,3),
(4,'Clase de CrossFit con grupo avanzado.',4,3,'2025-01-12',1,4),
(5,'Cancelada por lesión leve.',5,5,'2025-01-13',0,2),
(6,'Participa con su grupo habitual.',6,7,'2025-01-14',1,1),
(7,'Clase de prueba.',7,6,'2025-01-15',1,3),
(8,'Primera vez en Zumba.',8,5,'2025-01-16',1,4),
(9,'Entrenamiento de alta intensidad.',9,9,'2025-01-17',1,2),
(10,'Sesión matutina de natación.',10,8,'2025-01-18',1,1);
