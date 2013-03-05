CodeIgniter-Sample-Project
==========================

The ideia is a sample project using CodeIgniter with Mysql. 
I will be commiting functionalities like: 
  news page list with a page for each new,option to filter the data, and pagination; 
  mail page;
  statics pages;
  and a admin control panel.

------------------------------------------------------------------

Routes so far

```
/products
/products/id
```

------------------------------------------------------------------

```
# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) DEFAULT NULL,
  `description` varchar(40) DEFAULT NULL,
  `stock` double DEFAULT NULL,
  `cost_price` double DEFAULT NULL,
  `sell_price` double DEFAULT NULL,
  `manufacture_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `products` WRITE;

INSERT INTO `products` (`id`, `description`, `stock`, `cost_price`, `sell_price`, `manufacture_id`)
VALUES
  (4,'SD CARD 1GB MINI',3,28,40,1),
	(5,'CAM. FOTO I70 PLATA',5,600,900,5),
	(6,'CAM. FOTO DSC-W50 PLATA',4,400,700,6),
	(7,'WEBCAM INSTANT VF0040SP',4,50,80,7),
	(8,'CPU 775 CEL.D 360  3.46 512K 533M ALTERA',10,140,300,8),
	(9,'FILMADORA DCR-DVD108',2,900,1400,6),
	(10,'HD IDE  80G 7.200',8,90,160,5),
	(11,'IMP LASERJET 1018 USB 2.0',4,200,300,9),
	(12,'MEM DDR  512MB 400MHZ PC3200',10,60,100,5),
	(13,'MEM DDR2 1024MB 533MHZ PC4200',5,100,170,3),
	(14,'MON LCD 19\" 920N PRETO',2,500,800,5),
	(15,'MOUSE USB OMC90S OPT.C/LUZ',10,20,40,5),
	(16,'NB DV6108 CS 1.86/512/80/DVD+RW ',2,1400,2500,9),
	(17,'NB N220E/B DC 1.6/1/80/DVD+RW ',3,1800,3400,6),
	(18,'CAM. FOTO DSC-W90 PLATA',5,600,1200,6),
	(19,'CART. 8767 NEGRO',20,30,50,9),
	(20,'CD-R TUBO DE 100 52X 700MB',20,30,60,5),
	(21,'MEM DDR 1024MB 400MHZ PC3200',7,80,10,1),
	(22,'MOUSE PS2 A7 AZUL/PLATA',20,5,15,10),
	(23,'SPEAKER AS-5100 HOME PRATA',5,100,180,10),
	(24,'TEC. USB ABNT AK-806',14,20,40,10),
	(4,'SD CARD 1GB MINI',3,28,40,1),
	(5,'CAM. FOTO I70 PLATA',5,600,900,5),
	(6,'CAM. FOTO DSC-W50 PLATA',4,400,700,6),
	(7,'WEBCAM INSTANT VF0040SP',4,50,80,7),
	(8,'CPU 775 CEL.D 360  3.46 512K 533M ALTERA',10,140,300,8),
	(9,'FILMADORA DCR-DVD108',2,900,1400,6),
	(10,'HD IDE  80G 7.200',8,90,160,5),
	(11,'IMP LASERJET 1018 USB 2.0',4,200,300,9),
	(12,'MEM DDR  512MB 400MHZ PC3200',10,60,100,5),
	(13,'MEM DDR2 1024MB 533MHZ PC4200',5,100,170,3),
	(14,'MON LCD 19\" 920N PRETO',2,500,800,5),
	(15,'MOUSE USB OMC90S OPT.C/LUZ',10,20,40,5),
	(16,'NB DV6108 CS 1.86/512/80/DVD+RW ',2,1400,2500,9),
	(17,'NB N220E/B DC 1.6/1/80/DVD+RW ',3,1800,3400,6),
	(18,'CAM. FOTO DSC-W90 PLATA',5,600,1200,6),
	(19,'CART. 8767 NEGRO',20,30,50,9),
	(20,'CD-R TUBO DE 100 52X 700MB',20,30,60,5),
	(21,'MEM DDR 1024MB 400MHZ PC3200',7,80,150,1),
	(22,'MOUSE PS2 A7 AZUL/PLATA',20,5,15,10),
	(23,'SPEAKER AS-5100 HOME PRATA',5,100,180,10),
	(24,'TEC. USB ABNT AK-806',14,20,40,10);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
```
