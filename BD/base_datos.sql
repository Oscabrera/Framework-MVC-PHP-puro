
create database examenabril
use examenabril;


DROP TABLE IF EXISTS `Persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Persona` (
  `Id_Persona` int(11) NOT NULL AUTO_INCREMENT,
  `CURP` varchar(18) DEFAULT NULL,
  `Nombre` text,
  `Apellido_Paterno` text,
  `Apellido_Materno` text,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Sexo` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT '1',
  `Fecha_Registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `Fecha_Modificacion` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id_Persona`),
  UNIQUE KEY `CURP_UNIQUE` (`CURP`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


alter table Persona
	add Estado_Civil int null after Fecha_Nacimiento;


DROP TABLE IF EXISTS `Contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contacto` (
  `Id_Contacto` int(11) NOT NULL AUTO_INCREMENT,
  `Correo_Personal` varchar(100) DEFAULT NULL,
  `Telefono_Fijo` varchar(45) DEFAULT NULL,
  `Telefono_Celular` varchar(45) DEFAULT NULL,
  `Contacto_Emergencia` text,
  `Telefono_Emergencia` varchar(45) DEFAULT NULL,
  `Id_Persona` int(11) NOT NULL,
  `Estado` int(11) DEFAULT '1',
  `Fecha_Registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `Fecha_Modificacion` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id_Contacto`),
  KEY `fk_Contacto_Persona_idx` (`Id_Persona`),
  CONSTRAINT `fk_Contacto_Persona` FOREIGN KEY (`Id_Persona`) REFERENCES `Persona` (`Id_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Direccion`
--

DROP TABLE IF EXISTS `Direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Direccion` (
  `Id_Direccion` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Colonia` int(11) DEFAULT NULL,
  `CP` varchar(6) DEFAULT NULL,
  `Calle` text,
  `Numero_Exterior` varchar(100) DEFAULT NULL,
  `Numero_Interior` varchar(100) DEFAULT NULL,
  `Id_Persona` int(11) NOT NULL COMMENT '\n',
  `Estado` int(11) DEFAULT '1',
  `Fecha_Registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `Fecha_Modificacion` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id_Direccion`),
  KEY `fk_Direccion_Persona_idx` (`Id_Persona`),
  CONSTRAINT `fk_Direccion_Persona` FOREIGN KEY (`Id_Persona`) REFERENCES `Persona` (`Id_Persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
