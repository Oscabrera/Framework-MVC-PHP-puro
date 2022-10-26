
create database examen;
use examen;


DROP TABLE IF EXISTS `Persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Persona` (
  `Id_Persona` int(11) NOT NULL AUTO_INCREMENT,
  `CURP` varchar(18) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `Primer_Nombre` nvarchar(36),
  `Segundo_Nombre` nvarchar(36),
  `Apellido_Paterno` nvarchar(36),
  `Apellido_Materno` nvarchar(36),
  `Fecha_Nacimiento` date DEFAULT NULL,
   Estado_Civil int NULL,
  `Sexo` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT '1',
  `Fecha_Registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `Fecha_Modificacion` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id_Persona`),
  UNIQUE KEY `CURP_UNIQUE` (`CURP`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;



DROP TABLE IF EXISTS `Personalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Personalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Persona` int(11) NOT NULL ,
  action nvarchar(6) NOT NULL ,
  `CURP` varchar(18) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `Primer_Nombre` nvarchar(36),
  `Segundo_Nombre` nvarchar(36),
  `Apellido_Paterno` nvarchar(36),
  `Apellido_Materno` nvarchar(36),
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Sexo` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT '1',
  `Fecha_Registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `Fecha_Modificacion` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `Contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contacto` (
  `Id_Contacto` int(11) NOT NULL AUTO_INCREMENT,
  `Correo_Personal` varchar(100) DEFAULT NULL,
  `Telefono_Fijo` varchar(10) DEFAULT NULL,
  `Telefono_Celular` varchar(10) DEFAULT NULL,
  `Id_Persona` int(11) NOT NULL,
  `Estado` int(11) DEFAULT '1',
  `Fecha_Registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `Fecha_Modificacion` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id_Contacto`),
  KEY `fk_Contacto_Persona_idx` (`Id_Persona`),
  CONSTRAINT `fk_Contacto_Persona` FOREIGN KEY (`Id_Persona`) REFERENCES `Persona` (`Id_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `Contactolog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contactolog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  action nvarchar(6) NOT NULL ,
  `Id_Contacto` int(11) NOT NULL ,
  `Correo_Personal` varchar(100) DEFAULT NULL,
  `Telefono_Fijo` varchar(10) DEFAULT NULL,
  `Telefono_Celular` varchar(10) DEFAULT NULL,
  `Id_Persona` int(11) NOT NULL,
  `Estado` int(11) DEFAULT '1',
  `Fecha_Registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `Fecha_Modificacion` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;




CREATE TRIGGER examen.ai_data AFTER INSERT ON examen.Persona
	FOR EACH ROW
	BEGIN
        INSERT INTO examen.Personalog (action, Id_Persona, CURP, RFC, Primer_Nombre,Segundo_Nombre,Apellido_Paterno, Apellido_Materno, Fecha_Nacimiento, Sexo, Estado, Fecha_Registro, Fecha_Modificacion)
        VALUES ('insert', NEW.Id_Persona, NEW.CURP, NEW.RFC, NEW.Primer_Nombre, NEW.Segundo_Nombre, NEW.Apellido_Paterno, NEW.Apellido_Materno, NEW.Fecha_Nacimiento, NEW.Sexo, NEW.Estado, NEW.Fecha_Registro, NEW.Fecha_Modificacion);
	END;

CREATE TRIGGER examen.au_data AFTER UPDATE ON examen.Persona
	FOR EACH ROW
	BEGIN
        INSERT INTO examen.Personalog (action, Id_Persona, CURP, RFC, Primer_Nombre,Segundo_Nombre,Apellido_Paterno, Apellido_Materno, Fecha_Nacimiento, Sexo, Estado, Fecha_Registro, Fecha_Modificacion)
        VALUES ('update', NEW.Id_Persona, NEW.CURP, NEW.RFC, NEW.Primer_Nombre, NEW.Segundo_Nombre, NEW.Apellido_Paterno, NEW.Apellido_Materno, NEW.Fecha_Nacimiento, NEW.Sexo, NEW.Estado, NEW.Fecha_Registro, NEW.Fecha_Modificacion);
	END;

CREATE TRIGGER examen.ad_data AFTER DELETE ON examen.Persona
	FOR EACH ROW
	BEGIN
        INSERT INTO examen.Personalog (action, Id_Persona, CURP, RFC, Primer_Nombre,Segundo_Nombre,Apellido_Paterno, Apellido_Materno, Fecha_Nacimiento, Sexo, Estado, Fecha_Registro, Fecha_Modificacion)
        VALUES ('delete', OLD.Id_Persona, OLD.CURP, OLD.RFC, OLD.Primer_Nombre, OLD.Segundo_Nombre, OLD.Apellido_Paterno, OLD.Apellido_Materno, OLD.Fecha_Nacimiento, OLD.Sexo, OLD.Estado, OLD.Fecha_Registro, OLD.Fecha_Modificacion);
	END;


CREATE TRIGGER examen.cai_data AFTER INSERT ON examen.Contacto
	FOR EACH ROW
	BEGIN
        INSERT INTO examen.Contactolog (action, Id_Contacto, Correo_Personal, Telefono_Fijo, Telefono_Celular, Id_Persona,Estado, Fecha_Registro, Fecha_Modificacion)
        VALUES ('insert', NEW.Id_Contacto, NEW.Correo_Personal, NEW.Telefono_Fijo, NEW.Telefono_Celular, NEW.Id_Persona, NEW.Estado, NEW.Fecha_Registro, NEW.Fecha_Modificacion);
	END;

CREATE TRIGGER examen.cau_data AFTER UPDATE ON examen.Contacto
	FOR EACH ROW
	BEGIN
        INSERT INTO examen.Contactolog (action, Id_Contacto, Correo_Personal, Telefono_Fijo, Telefono_Celular, Id_Persona,Estado, Fecha_Registro, Fecha_Modificacion)
        VALUES ('update', NEW.Id_Contacto, NEW.Correo_Personal, NEW.Telefono_Fijo, NEW.Telefono_Celular, NEW.Id_Persona, NEW.Estado, NEW.Fecha_Registro, NEW.Fecha_Modificacion);
	END;

CREATE TRIGGER examen.cad_data AFTER DELETE ON examen.Contacto
	FOR EACH ROW
	BEGIN
        INSERT INTO examen.Contactolog (action, Id_Contacto, Correo_Personal, Telefono_Fijo, Telefono_Celular, Id_Persona,Estado, Fecha_Registro, Fecha_Modificacion)
        VALUES ('delete', OLD.Id_Contacto, OLD.Correo_Personal, OLD.Telefono_Fijo, OLD.Telefono_Celular, OLD.Id_Persona, OLD.Estado, OLD.Fecha_Registro, OLD.Fecha_Modificacion);
	END;