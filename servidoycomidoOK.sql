-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-06-2017 a las 08:38:57
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `servidoycomido`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `crearCargos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `crearCargos`(IN NOMBRE VARCHAR(45))
BEGIN
    INSERT INTO CARGO VALUES(NULL,NOMBRE);
END$$

DROP PROCEDURE IF EXISTS `crearEmpleado`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `crearEmpleado`(IN RUT VARCHAR(12),
                               IN NOMBRE VARCHAR(45),
                               IN APP VARCHAR(45),
                               IN APM VARCHAR(45),
                               IN EDAD INT, 
                               IN SUELDO INT,
                               IN CV VARCHAR(45),
                               IN CARGO INT,
                               IN AFP INT)
BEGIN
    INSERT INTO EMPLEADO VALUES(RUT,NOMBRE,APP,APM,EDAD,SUELDO,CV,CARGO,1,AFP);
END$$

DROP PROCEDURE IF EXISTS `CREAUSUARIO`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CREAUSUARIO`(IN NOM VARCHAR(45), IN PASS VARCHAR(45), IN EMP VARCHAR(12))
BEGIN 
    INSERT INTO USUARIO VALUES(NULL,NOM ,PASS, EMP);
END$$

DROP PROCEDURE IF EXISTS `ENTRADA`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ENTRADA`(IN PER VARCHAR(45),  IN EMP VARCHAR(12))
BEGIN
        INSERT INTO reg_entrada_salida VALUES(NULL, PER, now(),NULL, EMP);
END$$

DROP PROCEDURE IF EXISTS `HACERHORARIO`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `HACERHORARIO`(IN EMP VARCHAR(12),
                              IN DIA VARCHAR(200),   
                              IN INICIO DATE, 
                              IN FIN DATE, 
                              IN TURNO VARCHAR(45),
                              IN LOCAL INT)
BEGIN
    INSERT INTO horario VALUES(NULL , EMP, DIA, INICIO , FIN , TURNO , LOCAL);
END$$

DROP PROCEDURE IF EXISTS `HEX`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `HEX`(IN EMP VARCHAR(12), in PER VARCHAR(45))
BEGIN
    SELECT SUM(TIMESTAMPDIFF(SECOND,reg_entrada_salida.entrada, reg_entrada_salida.salida))  AS hrs 
                        from reg_entrada_salida 
                        WHERE reg_entrada_salida.empleado_rut = EMP and periodo = PER;
END$$

DROP PROCEDURE IF EXISTS `INGRESAR`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `INGRESAR`(IN NOM VARCHAR(45), IN PASS VARCHAR(45))
BEGIN
    select usuario.`nombreUsuario` , usuario.password , empleado.`CARGO_idCargo`  from usuario, empleado where empleado.rut = usuario.`EMPLEADO_rut` and nombreUsuario = NOM and password = PASS;

END$$

DROP PROCEDURE IF EXISTS `LIQUIDACION`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `LIQUIDACION`(IN PER VARCHAR(45),
                             IN DIAS INT,
                             IN HE INT,
                             IN BONOS INT, 
                             IN AGIS INT,
                             IN SALUD INT,
                             IN AFP INT, 
                             IN SEGC INT, 
                             IN EMP VARCHAR(12),
                             IN GRAT INT,
                             IN LIQU INT,
                             IN SBASE INT,
                             IN CANTHORAS FLOAT,
                             IN HABER INT)
BEGIN

INSERT INTO LIQUIDACION VALUES(NULL, PER, DIAS, HE, BONOS, AGIS, SALUD, AFP, SEGC, EMP, GRAT, LIQU, SBASE, CANTHORAS, HABER);

END$$

DROP PROCEDURE IF EXISTS `LISTARDETALLE`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTARDETALLE`(IN VENTA INT )
BEGIN
SELECT detalle_producto.`idDetalle`,detalle_producto.cantidad, producto.nombre from detalle_producto
inner join producto
on `producto_idProducto` = `idProducto`
where detalle_producto.`venta_idVENTAS` = VENTA order by detalle_producto.`idDetalle` asc;

END$$

DROP PROCEDURE IF EXISTS `LISTARH`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTARH`()
BEGIN
select concat('Semana ',week(horario.desde,5))as semana,
       concat(empleado.nombre,' ',empleado.`apPaterno`) as nombre, 
       horario.dia,
       concat(' Desde ',horario.desde,' Hasta ',horario.hasta),
       horario.turno
from horario
inner join empleado on
       empleado.rut = horario.`EMPLEADO_rut` order by semana; 
END$$

DROP PROCEDURE IF EXISTS `SALIDA`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SALIDA`(IN NUM INT)
BEGIN
        UPDATE reg_entrada_salida
            SET salida = now()
            where idreg_entrada = num; 
END$$

DROP PROCEDURE IF EXISTS `VALRAFP`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `VALRAFP`(IN ID INT)
BEGIN

SELECT afp.porcentaje FROM afp where idAfp = ID;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afp`
--

DROP TABLE IF EXISTS `afp`;
CREATE TABLE IF NOT EXISTS `afp` (
  `idAfp` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAfp` varchar(45) NOT NULL,
  `porcentaje` float NOT NULL,
  PRIMARY KEY (`idAfp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `afp`
--

INSERT INTO `afp` (`idAfp`, `nombreAfp`, `porcentaje`) VALUES
(1, 'CAPITAL', 11.44),
(2, 'CUPRUM', 11.48),
(3, 'HABITAT', 11.27),
(4, 'PLAN VITAL', 10.41),
(5, 'PROVIDA', 11.45),
(6, 'MODELO', 10.77);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `idCargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCargo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCargo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `nombreCargo`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'CAJERO'),
(3, 'COCINERO'),
(4, 'GARZON'),
(5, 'CONTADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `debolucion`
--

DROP TABLE IF EXISTS `debolucion`;
CREATE TABLE IF NOT EXISTS `debolucion` (
  `idDebolucion` int(11) NOT NULL AUTO_INCREMENT,
  `detalleDevolucion` varchar(45) NOT NULL,
  `valorDevolucion` int(11) NOT NULL,
  `detalle_producto_idDetalle` varchar(45) NOT NULL,
  PRIMARY KEY (`idDebolucion`),
  KEY `fk_debolucion_detalle_producto1_idx` (`detalle_producto_idDetalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_producto`
--

DROP TABLE IF EXISTS `detalle_producto`;
CREATE TABLE IF NOT EXISTS `detalle_producto` (
  `idDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `producto_idProducto` int(11) NOT NULL,
  `venta_idVENTAS` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idDetalle`),
  KEY `fk_detalle_producto_producto1_idx` (`producto_idProducto`),
  KEY `fk_detalle_producto_venta1_idx` (`venta_idVENTAS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Volcado de datos para la tabla `detalle_producto`
--

INSERT INTO `detalle_producto` (`idDetalle`, `producto_idProducto`, `venta_idVENTAS`, `cantidad`) VALUES
(11, 2, 1, 2),
(12, 1, 1, 1),
(13, 1, 1, 1),
(14, 1, 1, 1),
(15, 1, 1, 1),
(16, 1, 1, 1),
(17, 1, 1, 1),
(18, 2, 1, 1),
(19, 2, 1, 1),
(20, 1, 1, 1),
(21, 1, 1, 1),
(22, 1, 1, 1),
(23, 1, 1, 1),
(24, 1, 1, 1),
(25, 1, 1, 1),
(26, 1, 1, 1),
(27, 1, 1, 1),
(28, 2, 2, 1),
(29, 2, 2, 1),
(30, 1, 2, 3),
(31, 1, 3, 2),
(32, 1, 3, 3),
(33, 1, 4, 3),
(34, 1, 5, 3),
(35, 2, 5, 3),
(36, 2, 5, 3),
(37, 1, 5, 1),
(38, 1, 5, 1),
(39, 1, 5, 1),
(40, 1, 5, 1),
(41, 2, 5, 1),
(42, 1, 5, 1),
(43, 1, 5, 1),
(44, 1, 5, 1),
(45, 1, 5, 1),
(46, 1, 6, 1),
(47, 2, 6, 4),
(48, 2, 7, 4),
(49, 1, 7, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `rut` varchar(12) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apPaterno` varchar(45) NOT NULL,
  `apMaterno` varchar(45) NOT NULL,
  `edad` int(11) NOT NULL,
  `sueldoPactado` int(45) NOT NULL,
  `curriculum` varchar(45) NOT NULL,
  `CARGO_idCargo` int(11) NOT NULL,
  `estado` int(45) NOT NULL,
  `Afp_idAfp` int(11) NOT NULL,
  PRIMARY KEY (`rut`),
  KEY `fk_EMPLEADO_CARGO1_idx` (`CARGO_idCargo`),
  KEY `fk_empleado_Afp1_idx` (`Afp_idAfp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`rut`, `nombre`, `apPaterno`, `apMaterno`, `edad`, `sueldoPactado`, `curriculum`, `CARGO_idCargo`, `estado`, `Afp_idAfp`) VALUES
('10.555.921-9', 'ALVARO', 'ORTUZA', 'MATUS', 48, 300000, 'ALVARO.docx', 3, 1, 4),
('12.514.086-6', 'WENDY', 'HENRIQUEZ', 'GONZALEZ', 45, 500000, 'OscarVergar.docx', 2, 1, 4),
('15.258.365-k', 'DANIEL', 'HERNANDES', 'HENRIQUEZ', 20, 280000, 'OscarVergar.docx', 4, 1, 4),
('16.555.698-9', 'ALFONSO ', 'HENRIQUEZ', 'GONZALEZ', 30, 310000, 'alfonso.docx', 3, 1, 4),
('17.379.316-2', 'OSCAR', 'VERGARA', 'HENRIQUEZ', 27, 650000, 'OscarVergara.docx', 5, 1, 4),
('17.416.901-2', 'Pavel', 'Morales ', 'Bustamante', 27, 500000, 'Pavel.docx', 1, 1, 4),
('19.313.814-4', 'david', 'constanzo', 'soto', 21, 280000, 'OscarVergar.docx', 1, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

DROP TABLE IF EXISTS `entrega`;
CREATE TABLE IF NOT EXISTS `entrega` (
  `idEntrega` int(11) NOT NULL AUTO_INCREMENT,
  `tipoEntrega` varchar(45) DEFAULT NULL,
  `EMPLEADO_rut` varchar(12) NOT NULL,
  `VENTA_idVENTAS` int(11) NOT NULL,
  PRIMARY KEY (`idEntrega`),
  KEY `fk_ENTREGA_EMPLEADO1_idx` (`EMPLEADO_rut`),
  KEY `fk_ENTREGA_VENTA1_idx` (`VENTA_idVENTAS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE IF NOT EXISTS `horario` (
  `idhorario` int(11) NOT NULL AUTO_INCREMENT,
  `EMPLEADO_rut` varchar(12) NOT NULL,
  `dia` varchar(200) NOT NULL,
  `desde` date NOT NULL,
  `hasta` date NOT NULL,
  `turno` varchar(45) NOT NULL,
  PRIMARY KEY (`idhorario`),
  KEY `fk_HORARIO_EMPLEADO1_idx` (`EMPLEADO_rut`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idhorario`, `EMPLEADO_rut`, `dia`, `desde`, `hasta`, `turno`) VALUES
(1, '17.379.316-2', 'Lunes, Martes, Miercoles, Jueves, Viernes, Sabado, ', '2017-05-01', '2017-05-07', 'MAÃ‘ANA'),
(2, '17.379.316-2', 'Lunes, Martes, Miercoles, Jueves, Viernes, Sabado, ', '2017-05-08', '2017-05-14', 'TARDE'),
(3, '17.379.316-2', '', '2017-05-18', '2017-05-18', 'MAÃ‘ANA'),
(4, '17.416.901-2', '', '2017-05-01', '2017-05-07', 'NOCHE'),
(5, '15.258.365-k', 'Lunes, Martes, Miercoles, Viernes, Sabado, Domingo, ', '2017-05-08', '2017-05-14', 'NOCHE'),
(6, '16.555.698-9', 'Lunes, Miercoles, Jueves, Viernes, Sabado, Domingo, ', '2017-05-22', '2017-05-28', 'NOCHE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion`
--

DROP TABLE IF EXISTS `liquidacion`;
CREATE TABLE IF NOT EXISTS `liquidacion` (
  `idDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `periodo` varchar(45) NOT NULL,
  `diasTrabajados` int(11) NOT NULL,
  `horasExtras` int(11) DEFAULT NULL,
  `bonos` int(11) DEFAULT NULL,
  `agisnaldo` int(11) DEFAULT NULL,
  `salud` int(11) NOT NULL,
  `afp` int(11) DEFAULT NULL,
  `SeguroCesantia` int(11) DEFAULT NULL,
  `EMPLEADO_rut` varchar(12) NOT NULL,
  `gratificacion` int(11) DEFAULT NULL,
  `alcanceLiquido` int(11) DEFAULT NULL,
  `sBase` int(11) DEFAULT NULL,
  `TOTALHORAS` float(10,1) DEFAULT NULL,
  `HABER` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDetalle`),
  KEY `fk_DETALLEEMPLEADO_EMPLEADO1_idx` (`EMPLEADO_rut`),
  KEY `idDetalle` (`idDetalle`,`periodo`,`diasTrabajados`,`horasExtras`,`bonos`,`agisnaldo`,`salud`,`afp`,`SeguroCesantia`,`EMPLEADO_rut`,`gratificacion`,`alcanceLiquido`,`sBase`),
  KEY `idDetalle_2` (`idDetalle`,`periodo`,`diasTrabajados`,`sBase`,`horasExtras`,`bonos`,`agisnaldo`,`salud`,`afp`,`SeguroCesantia`,`EMPLEADO_rut`,`gratificacion`,`alcanceLiquido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `liquidacion`
--

INSERT INTO `liquidacion` (`idDetalle`, `periodo`, `diasTrabajados`, `horasExtras`, `bonos`, `agisnaldo`, `salud`, `afp`, `SeguroCesantia`, `EMPLEADO_rut`, `gratificacion`, `alcanceLiquido`, `sBase`, `TOTALHORAS`, `HABER`) VALUES
(3, '06-17', 29, 12640, 5000, 5000, 52883, 78645, 4533, '17.379.316-2', 104500, 619412, 628333, 2.5, 755473),
(4, '06-17', 30, 12640, 10000, 10000, 55100, 81941, 4723, '17.379.316-2', 104500, 645376, 650000, 2.5, 787140),
(5, '06-17', 30, -18664, 10000, 10000, 26367, 39211, 2260, '10.555.921-9', 75334, 308832, 300000, -8.0, 376670);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

DROP TABLE IF EXISTS `noticia`;
CREATE TABLE IF NOT EXISTS `noticia` (
  `idNoticias` int(11) NOT NULL,
  `TituloNoticias` varchar(45) NOT NULL,
  `detalleNoticia` varchar(45) NOT NULL,
  `fechaNoticia` varchar(45) NOT NULL,
  `IMAGEN_idImagen` varchar(45) NOT NULL,
  PRIMARY KEY (`idNoticias`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `detalleProducto` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL,
  `IMAGEN_idImagen` varchar(45) NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `detalleProducto`, `valor`, `IMAGEN_idImagen`) VALUES
(1, 'papasfrita', 'papas con ketchup', 1000, 'xsdsada'),
(2, 'completo', 'dsada', 900, 'asdasda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

DROP TABLE IF EXISTS `promocion`;
CREATE TABLE IF NOT EXISTS `promocion` (
  `idPromocion` int(11) NOT NULL AUTO_INCREMENT,
  `detallePromocion` varchar(45) NOT NULL,
  `nombrePromo` varchar(45) NOT NULL,
  `fechaTermino` date NOT NULL,
  `IMAGEN_idImagen` varchar(45) NOT NULL,
  `fechaInicio` date NOT NULL,
  PRIMARY KEY (`idPromocion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_entrada_salida`
--

DROP TABLE IF EXISTS `reg_entrada_salida`;
CREATE TABLE IF NOT EXISTS `reg_entrada_salida` (
  `idreg_entrada` int(11) NOT NULL AUTO_INCREMENT,
  `periodo` varchar(45) NOT NULL,
  `entrada` datetime NOT NULL,
  `salida` datetime DEFAULT NULL,
  `empleado_rut` varchar(12) NOT NULL,
  PRIMARY KEY (`idreg_entrada`),
  KEY `fk_reg_entrada_salida_empleado1_idx` (`empleado_rut`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `reg_entrada_salida`
--

INSERT INTO `reg_entrada_salida` (`idreg_entrada`, `periodo`, `entrada`, `salida`, `empleado_rut`) VALUES
(14, '06-17', '2017-05-21 21:30:00', '2017-05-22 08:00:00', '17.379.316-2'),
(16, '06-17', '2017-05-22 21:30:00', '2017-05-23 07:00:00', '16.555.698-9'),
(17, '06-17', '2017-06-02 03:01:58', '2017-06-02 03:24:07', '16.555.698-9'),
(18, '06-17', '2017-06-02 03:03:40', '2017-06-02 03:07:43', '15.258.365-k'),
(19, '06-17', '2017-06-02 03:23:39', '2017-06-02 03:23:46', '15.258.365-k');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `EMPLEADO_rut` varchar(12) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_USUARIO_EMPLEADO1_idx` (`EMPLEADO_rut`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `password`, `EMPLEADO_rut`) VALUES
(6, 'overgara', '1234', '17.379.316-2'),
(7, 'WHENRIQUEZ', '1234', '12.514.086-6'),
(8, 'DHERNANDEZ', '1234', '15.258.365-k'),
(9, 'pmorales', '1234', '17.416.901-2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `idVENTAS` int(11) NOT NULL AUTO_INCREMENT,
  `fechaVentas` date DEFAULT NULL,
  `Total` int(11) DEFAULT NULL,
  `EMPLEADO_rut` varchar(12) NOT NULL,
  PRIMARY KEY (`idVENTAS`),
  KEY `fk_VENTA_EMPLEADO1_idx` (`EMPLEADO_rut`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVENTAS`, `fechaVentas`, `Total`, `EMPLEADO_rut`) VALUES
(1, '2017-05-30', 13500, '12.514.086-6'),
(2, '2017-05-30', 2700, '12.514.086-6'),
(3, '2017-05-30', 1800, '12.514.086-6'),
(4, '2017-05-30', 2700, '12.514.086-6'),
(5, '2017-05-30', 8600, '12.514.086-6'),
(6, '2017-06-02', 4600, '12.514.086-6'),
(7, '2017-06-02', 103600, '12.514.086-6');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_empleado_Afp1` FOREIGN KEY (`Afp_idAfp`) REFERENCES `afp` (`idAfp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_EMPLEADO_CARGO1` FOREIGN KEY (`CARGO_idCargo`) REFERENCES `cargo` (`idCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `fk_ENTREGA_EMPLEADO1` FOREIGN KEY (`EMPLEADO_rut`) REFERENCES `empleado` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ENTREGA_VENTA1` FOREIGN KEY (`VENTA_idVENTAS`) REFERENCES `venta` (`idVENTAS`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_HORARIO_EMPLEADO1` FOREIGN KEY (`EMPLEADO_rut`) REFERENCES `empleado` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reg_entrada_salida`
--
ALTER TABLE `reg_entrada_salida`
  ADD CONSTRAINT `fk_reg_entrada_salida_empleado1` FOREIGN KEY (`empleado_rut`) REFERENCES `empleado` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_USUARIO_EMPLEADO1` FOREIGN KEY (`EMPLEADO_rut`) REFERENCES `empleado` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_VENTA_EMPLEADO1` FOREIGN KEY (`EMPLEADO_rut`) REFERENCES `empleado` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
