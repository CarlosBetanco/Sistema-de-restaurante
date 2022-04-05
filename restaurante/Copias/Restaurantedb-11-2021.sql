-- MariaDB dump 10.19  Distrib 10.4.20-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: restaurante
-- ------------------------------------------------------
-- Server version	10.4.20-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `IdCliente` int(30) NOT NULL,
  `TipoDocumento` varchar(45) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(40) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  PRIMARY KEY (`IdCliente`),
  KEY `fk_TipoDocumento_Cliente` (`TipoDocumento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'T.I','Andrés Martin','Páez',34332146,'AndrezS345@gmail.cm'),(2,'C.C','Pedro','Peres',34332146,'AndrezS345@gmail.cm'),(4,'C.C','Marco','Laso',34332146,'AndrezS345@gmail.cm'),(9,'C.C',' Rafael Arturo','Carrasco',312,'ArturPerez3322@gmail.com');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `IdFactura` int(30) NOT NULL,
  `IdPedido` int(10) NOT NULL,
  `IdTipoPago` int(10) NOT NULL,
  `Fecha` date NOT NULL,
  `CostEnvio` float(10,2) NOT NULL,
  `ValorFactura` float(10,2) NOT NULL,
  PRIMARY KEY (`IdFactura`),
  KEY `fk_Pedidos_Factura` (`IdPedido`),
  KEY `fk_TipoPago_Factura` (`IdTipoPago`),
  CONSTRAINT `fk_Pedidos_Factura` FOREIGN KEY (`IdPedido`) REFERENCES `pedidos` (`IdPedido`),
  CONSTRAINT `fk_TipoPago_Factura` FOREIGN KEY (`IdTipoPago`) REFERENCES `tipopago` (`IdTipoPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (7,3,7,'2016-05-22',2.00,20.00),(12,5,3,'2015-08-25',2.00,30.00),(13,6,4,'2014-04-27',2.00,10.00);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido_detalle`
--

DROP TABLE IF EXISTS `pedido_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido_detalle` (
  `IdPedido_Detalle` int(30) NOT NULL,
  `IdProducto` int(10) NOT NULL,
  `IdPedido` int(10) NOT NULL,
  `ValorUnitario` float(10,2) NOT NULL,
  `Cantidad` int(15) NOT NULL,
  `ValorDetalle` float(10,2) NOT NULL,
  `IvaDetalle` float(10,2) NOT NULL,
  `ValorTotal` float(10,2) NOT NULL,
  PRIMARY KEY (`IdPedido_Detalle`),
  KEY `fk_Pedidos_PedidoDetalle` (`IdPedido`),
  KEY `fk_Producto_PedidoDetalle` (`IdProducto`),
  CONSTRAINT `fk_Pedidos_PedidoDetalle` FOREIGN KEY (`IdPedido`) REFERENCES `pedidos` (`IdPedido`),
  CONSTRAINT `fk_Producto_PedidoDetalle` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_detalle`
--

LOCK TABLES `pedido_detalle` WRITE;
/*!40000 ALTER TABLE `pedido_detalle` DISABLE KEYS */;
INSERT INTO `pedido_detalle` VALUES (5105,7535,6,10.00,1,10.00,10.50,10.50),(6352,863,8,20.00,1,20.00,20.50,20.50),(6749,2364,3,50.00,5,50.50,555.00,50.50),(8561,7353,7,45.00,2,45.00,45.50,45.50);
/*!40000 ALTER TABLE `pedido_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `IdPedido` int(10) NOT NULL,
  `FechaPedido` date NOT NULL,
  `HoraPedido` time NOT NULL,
  `IdCliente` int(10) NOT NULL,
  PRIMARY KEY (`IdPedido`),
  KEY `fk_Cliente_TipoOrden` (`IdCliente`),
  CONSTRAINT `fk_Cliente_TipoOrden` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (3,'0000-00-00','00:00:22',2),(5,'2015-05-23','00:20:16',2),(6,'0000-00-00','00:00:00',9),(7,'0000-00-00','00:00:13',4),(8,'0000-00-00','00:00:00',1);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `IdProducto` int(10) NOT NULL,
  `IdProveedor` int(10) NOT NULL,
  `NombreProducto` varchar(80) NOT NULL,
  `ValorProducto` float(10,2) NOT NULL,
  `Cantidad` int(10) NOT NULL,
  `TotalProductos` float(12,2) NOT NULL,
  `ImagenProducto` blob NOT NULL,
  PRIMARY KEY (`IdProducto`),
  KEY `fk_Proveedor_Producto` (`IdProveedor`),
  CONSTRAINT `fk_Proveedor_Producto` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedor` (`IdProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (863,2363,'Pasta Napolitana',10.00,1,10.00,''),(2364,2363,'bandeja de churrasco',20.00,4,43.00,''),(7353,4384,'Hamburguesa',5.00,1,7.00,''),(7535,5343,'Coca Cola 2litros',3.00,1,5.00,''),(7540,6266,'Pechuga ala plancha',20.00,2,42.00,'');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promocion`
--

DROP TABLE IF EXISTS `promocion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promocion` (
  `IdPromocion` int(10) NOT NULL AUTO_INCREMENT,
  `IdProducto` int(10) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Detalle` varchar(45) DEFAULT NULL,
  `Fecha_Inicio` datetime NOT NULL,
  `Fecha_Fin` datetime NOT NULL,
  `ValorPromocion` decimal(10,2) NOT NULL,
  PRIMARY KEY (`IdPromocion`),
  KEY `fk_Producto_Promocion` (`IdProducto`),
  CONSTRAINT `fk_Producto_Promocion` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=73665 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promocion`
--

LOCK TABLES `promocion` WRITE;
/*!40000 ALTER TABLE `promocion` DISABLE KEYS */;
INSERT INTO `promocion` VALUES (1,7353,'Hamburguesa','Pague una  lleve otra gratis','2021-02-11 21:10:36','2021-02-13 21:10:36',10.00),(2,7540,'Pechuga ala plancha','a mitad de precio','2021-05-16 21:13:57','2021-05-18 21:13:57',25.00);
/*!40000 ALTER TABLE `promocion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `IdProveedor` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Telefono` int(12) NOT NULL,
  `Ciudad` varchar(40) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`IdProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=6267 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (2363,'María lucia',343,'Bogotá','calle 8# 45-31','Productos cárnicos'),(2985,'Andrés silva ',123,'Bogotá','calle 8# 45-31','Frutas y Vegetales'),(4384,'Pedro',432,'Bogotá','calle 8# 45-31','Pan para hamburguesa'),(5343,'Arturo Perez',312,'Bogotá','calle 8# 45-31','Coca Cola, 6 pacas'),(6266,'Jefferson Valbuena',312,'Bogotá','calle 8# 45-31','Pollo *25');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `IdRol` int(10) NOT NULL AUTO_INCREMENT,
  `NombreRol` varchar(45) NOT NULL,
  PRIMARY KEY (`IdRol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador'),(2,'Caja');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipopago`
--

DROP TABLE IF EXISTS `tipopago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipopago` (
  `IdTipoPago` int(10) NOT NULL AUTO_INCREMENT,
  `Descripcion_Pago` varchar(45) NOT NULL,
  PRIMARY KEY (`IdTipoPago`)
) ENGINE=InnoDB AUTO_INCREMENT=524 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipopago`
--

LOCK TABLES `tipopago` WRITE;
/*!40000 ALTER TABLE `tipopago` DISABLE KEYS */;
INSERT INTO `tipopago` VALUES (3,'tarjeta'),(4,'tarjeta'),(7,'Efectivo');
/*!40000 ALTER TABLE `tipopago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `NombreUsuario` varchar(45) NOT NULL,
  `ClaveUsuario` int(10) NOT NULL,
  `IdRol` int(10) NOT NULL,
  `ImagenUsuario` blob NOT NULL,
  PRIMARY KEY (`NombreUsuario`),
  KEY `fk_Roles_Usuarios` (`IdRol`),
  CONSTRAINT `fk_Roles_Usuarios` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`IdRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('Andrés Leonardo',123,1,'../img/ui-zac.jpg'),('Carolinagarcia',123,2,'../img/ui-divya.jpg'),('Francisco Munévar',123,2,'../img/Usuario.jpg');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-06 19:35:43
