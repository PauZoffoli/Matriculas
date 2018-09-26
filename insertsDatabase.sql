

INSERT INTO `regiones` (`id`,`created_at`,`updated_at`,`nombreReg`,`regionOrd`,`codigoUnico` )
VALUES
	(1, CURDATE(), CURDATE(), 'Arica y Parinacota','XV','15'),
	(2,CURDATE(), CURDATE(), 'Tarapacá','I','01'),
	(3,CURDATE(), CURDATE(), 'Antofagasta','II','02'),
	(4,CURDATE(), CURDATE(), 'Atacama','III','03'),
	(5,CURDATE(), CURDATE(), 'Coquimbo','IV','04'),
	(6,CURDATE(), CURDATE(), 'Valparaiso','V','05'),
	(7,CURDATE(), CURDATE(), 'Metropolitana de Santiago','RM','13'),
	(8,CURDATE(), CURDATE(), 'Libertador General Bernardo O\'Higgins','VI','06'),
	(9,CURDATE(), CURDATE(), 'Maule','VII','07'),
	(10,CURDATE(), CURDATE(), 'Biobío','VIII','08'),
	(11,CURDATE(), CURDATE(), 'La Araucanía','IX','09'),
	(12,CURDATE(), CURDATE(), 'Los Ríos','XIV','14'),
	(13,CURDATE(), CURDATE(), 'Los Lagos','X','10'),
	(14,CURDATE(), CURDATE(), 'Aisén del General Carlos Ibáñez del Campo','XI','11'),
	(15,CURDATE(), CURDATE(), 'Magallanes y de la Antártica Chilena','XII','12');


INSERT INTO `provincias` (`id`,`created_at`,`updated_at`,`nombreProv`,`idRegion`,`codigoUnico` )
VALUES
	(1,CURDATE(), CURDATE(),'Arica',1,'151'),
	(2,CURDATE(), CURDATE(),'Parinacota',1,'152'),
	(3,CURDATE(), CURDATE(),'Iquique',2,'011'),
	(4,CURDATE(), CURDATE(),'El Tamarugal',2,'014'),
	(5,CURDATE(), CURDATE(),'Antofagasta',3,'021'),
	(6,CURDATE(), CURDATE(),'El Loa',3,'022'),
	(7,CURDATE(), CURDATE(),'Tocopilla',3,'023'),
	(8,CURDATE(), CURDATE(),'Chañaral',4,'032'),
	(9,CURDATE(), CURDATE(),'Copiapó',4,'031'),
	(10,CURDATE(), CURDATE(),'Huasco',4,'033'),
	(11,CURDATE(), CURDATE(),'Choapa',5,'042'),
	(12,CURDATE(), CURDATE(),'Elqui',5,'041'),
	(13,CURDATE(), CURDATE(),'Limarí',5,'043'),
	(14,CURDATE(), CURDATE(),'Isla de Pascua',6,'052'),
	(15,CURDATE(), CURDATE(),'Los Andes',6,'053'),
	(16,CURDATE(), CURDATE(),'Petorca',6,'054'),
	(17,CURDATE(), CURDATE(),'Quillota',6,'055'),
	(18,CURDATE(), CURDATE(),'San Antonio',6,'056'),
	(19,CURDATE(), CURDATE(),'San Felipe de Aconcagua',6,'057'),
	(20,CURDATE(), CURDATE(),'Valparaiso',6,'051'),
	(21,CURDATE(), CURDATE(),'Chacabuco',7,'133'),
	(22,CURDATE(), CURDATE(),'Cordillera',7,'132'),
	(23,CURDATE(), CURDATE(),'Maipo',7,'134'),
	(24,CURDATE(), CURDATE(),'Melipilla',7,'135'),
	(25,CURDATE(), CURDATE(),'Santiago',7,'131'),
	(26,CURDATE(), CURDATE(),'Talagante',7,'136'),
	(27,CURDATE(), CURDATE(),'Cachapoal',8,'061'),
	(28,CURDATE(), CURDATE(),'Cardenal Caro',8,'062'),
	(29,CURDATE(), CURDATE(),'Colchagua',8,'063'),
	(30,CURDATE(), CURDATE(),'Cauquenes',9,'072'),
	(31,CURDATE(), CURDATE(),'Curicó',9,'073'),
	(32,CURDATE(), CURDATE(),'Linares',9,'074'),
	(33,CURDATE(), CURDATE(),'Talca',9,'071'),
	(34,CURDATE(), CURDATE(),'Arauco',10,'082'),
	(35,CURDATE(), CURDATE(),'Bio Bío',10,'083'),
	(36,CURDATE(), CURDATE(),'Concepción',10,'081'),
	(37,CURDATE(), CURDATE(),'Ñuble',10,'084'),
	(38,CURDATE(), CURDATE(),'Cautín',11,'091'),
	(39,CURDATE(), CURDATE(),'Malleco',11,'092'),
	(40,CURDATE(), CURDATE(),'Valdivia',12,'141'),
	(41,CURDATE(), CURDATE(),'Ranco',12,'142'),
	(42,CURDATE(), CURDATE(),'Chiloé',13,'102'),
	(43,CURDATE(), CURDATE(),'Llanquihue',13,'101'),
	(44,CURDATE(), CURDATE(),'Osorno',13,'103'),
	(45,CURDATE(), CURDATE(),'Palena',13,'104'),
	(46,CURDATE(), CURDATE(),'Aisén',14,'112'),
	(47,CURDATE(), CURDATE(),'Capitán Prat',14,'113'),
	(48,CURDATE(), CURDATE(),'Coihaique',14,'111'),
	(49,CURDATE(), CURDATE(),'General Carrera',14,'114'),
	(50,CURDATE(), CURDATE(),'Antártica Chilena',15,'122'),
	(51,CURDATE(), CURDATE(),'Magallanes',15,'121'),
	(52,CURDATE(), CURDATE(),'Tierra del Fuego',15,'123'),
	(53,CURDATE(), CURDATE(),'Última Esperanza',15,'124');

INSERT INTO `comunas` (`id`,`created_at`,`updated_at`,`nombreComu`,`idProvincia`,`codigoUnico`)
VALUES
	(1,CURDATE(), CURDATE(),'Arica',1,'15101'),
	(2,CURDATE(), CURDATE(),'Camarones',1,'15102'),
	(3,CURDATE(), CURDATE(),'General Lagos',2,'15202'),
	(4,CURDATE(), CURDATE(),'Putre',2,'15201'),
	(5,CURDATE(), CURDATE(),'Alto Hospicio',3,'01107'),
	(6,CURDATE(), CURDATE(),'Iquique',3,'01101'),
	(7,CURDATE(), CURDATE(),'Camiña',4,'01402'),
	(8,CURDATE(), CURDATE(),'Colchane',4,'01403'),
	(9,CURDATE(), CURDATE(),'Huara',4,'01404'),
	(10,CURDATE(), CURDATE(),'Pica',4,'01405'),
	(11,CURDATE(), CURDATE(),'Pozo Almonte',4,'01401'),
	(12,CURDATE(), CURDATE(),'Antofagasta',5,'02101'),
	(13,CURDATE(), CURDATE(),'Mejillones',5,'02102'),
	(14,CURDATE(), CURDATE(),'Sierra Gorda',5,'02103'),
	(15,CURDATE(), CURDATE(),'Taltal',5,'02104'),
	(16,CURDATE(), CURDATE(),'Calama',6,'02201'),
	(17,CURDATE(), CURDATE(),'Ollague',6,'02202'),
	(18,CURDATE(), CURDATE(),'San Pedro de Atacama',6,'02203'),
	(19,CURDATE(), CURDATE(),'María Elena',7,'02302'),
	(20,CURDATE(), CURDATE(),'Tocopilla',7,'02301'),
	(21,CURDATE(), CURDATE(),'Chañaral',8,'03201'),
	(22,CURDATE(), CURDATE(),'Diego de Almagro',8,'03202'),
	(23,CURDATE(), CURDATE(),'Caldera',9,'03102'),
	(24,CURDATE(), CURDATE(),'Copiapó',9,'03101'),
	(25,CURDATE(), CURDATE(),'Tierra Amarilla',9,'03103'),
	(26,CURDATE(), CURDATE(),'Alto del Carmen',10,'03302'),
	(27,CURDATE(), CURDATE(),'Freirina',10,'03303'),
	(28,CURDATE(), CURDATE(),'Huasco',10,'03304'),
	(29,CURDATE(), CURDATE(),'Vallenar',10,'03301'),
	(30,CURDATE(), CURDATE(),'Canela',11,'04202'),
	(31,CURDATE(), CURDATE(),'Illapel',11,'04201'),
	(32,CURDATE(), CURDATE(),'Los Vilos',11,'04203'),
	(33,CURDATE(), CURDATE(),'Salamanca',11,'04204'),
	(34,CURDATE(), CURDATE(),'Andacollo',12,'04103'),
	(35,CURDATE(), CURDATE(),'Coquimbo',12,'04102'),
	(36,CURDATE(), CURDATE(),'La Higuera',12,'04104'),
	(37,CURDATE(), CURDATE(),'La Serena',12,'04101'),
	(38,CURDATE(), CURDATE(),'Paihuano',12,'04105'),
	(39,CURDATE(), CURDATE(),'Vicuña',12,'04106'),
	(40,CURDATE(), CURDATE(),'Combarbalá',13,'04302'),
	(41,CURDATE(), CURDATE(),'Monte Patria',13,'04303'),
	(42,CURDATE(), CURDATE(),'Ovalle',13,'04301'),
	(43,CURDATE(), CURDATE(),'Punitaqui',13,'04304'),
	(44,CURDATE(), CURDATE(),'Río Hurtado',13,'04305'),
	(45,CURDATE(), CURDATE(),'Isla de Pascua',14,'05201'),
	(46,CURDATE(), CURDATE(),'Calle Larga',15,'05302'),
	(47,CURDATE(), CURDATE(),'Los Andes',15,'05301'),
	(48,CURDATE(), CURDATE(),'Rinconada',15,'05303'),
	(49,CURDATE(), CURDATE(),'San Esteban',15,'05304'),
	(50,CURDATE(), CURDATE(),'La Ligua',16,'05401'),
	(51,CURDATE(), CURDATE(),'Papudo',16,'05403'),
	(52,CURDATE(), CURDATE(),'Petorca',16,'05404'),
	(53,CURDATE(), CURDATE(),'Zapallar',16,'05405'),
	(54,CURDATE(), CURDATE(),'Hijuelas',17,'05503'),
	(55,CURDATE(), CURDATE(),'La Calera',17,'05502'),
	(56,CURDATE(), CURDATE(),'La Cruz',17,'05504'),
	(57,CURDATE(), CURDATE(),'Limache',17,'05802'),
	(58,CURDATE(), CURDATE(),'Nogales',17,'05506'),
	(59,CURDATE(), CURDATE(),'Olmué',17,'05803'),
	(60,CURDATE(), CURDATE(),'Quillota',17,'05501'),
	(61,CURDATE(), CURDATE(),'Algarrobo',18,'05602'),
	(62,CURDATE(), CURDATE(),'Cartagena',18,'05603'),
	(63,CURDATE(), CURDATE(),'El Quisco',18,'05604'),
	(64,CURDATE(), CURDATE(),'El Tabo',18,'0605'),
	(65,CURDATE(), CURDATE(),'San Antonio',18,'05601'),
	(66,CURDATE(), CURDATE(),'Santo Domingo',18,'05606'),
	(67,CURDATE(), CURDATE(),'Catemu',19,'05702'),
	(68,CURDATE(), CURDATE(),'Llaillay',19,'05703'),
	(69,CURDATE(), CURDATE(),'Panquehue',19,'05704'),
	(70,CURDATE(), CURDATE(),'Putaendo',19,'05705'),
	(71,CURDATE(), CURDATE(),'San Felipe',19,'05701'),
	(72,CURDATE(), CURDATE(),'Santa María',19,'05706'),
	(73,CURDATE(), CURDATE(),'Casablanca',20,'05102'),
	(74,CURDATE(), CURDATE(),'Concón',20,'05103'),
	(75,CURDATE(), CURDATE(),'Juan Fernández',20,'05104'),
	(76,CURDATE(), CURDATE(),'Puchuncaví',20,'05105'),
	(77,CURDATE(), CURDATE(),'Quilpué',20,'05801'),
	(78,CURDATE(), CURDATE(),'Quintero',20,'05107'),
	(79,CURDATE(), CURDATE(),'Valparaíso',20,'05101'),
	(80,CURDATE(), CURDATE(),'Villa Alemana',20,'05804'),
	(81,CURDATE(), CURDATE(),'Viña del Mar',20,'05109'),
	(82,CURDATE(), CURDATE(),'Colina',21,'13301'),
	(83,CURDATE(), CURDATE(),'Lampa',21,'13302'),
	(84,CURDATE(), CURDATE(),'Tiltil',21,'13303'),
	(85,CURDATE(), CURDATE(),'Pirque',22,'13202'),
	(86,CURDATE(), CURDATE(),'Puente Alto',22,'13201'),
	(87,CURDATE(), CURDATE(),'San José de Maipo',22,'13203'),
	(88,CURDATE(), CURDATE(),'Buin',23,'13402'),
	(89,CURDATE(), CURDATE(),'Calera de Tango',23,'13403'),
	(90,CURDATE(), CURDATE(),'Paine',23,'13404'),
	(91,CURDATE(), CURDATE(),'San Bernardo',23,'13401'),
	(92,CURDATE(), CURDATE(),'Alhué',24,'13502'),
	(93,CURDATE(), CURDATE(),'Curacaví',24,'13503'),
	(94,CURDATE(), CURDATE(),'María Pinto',24,'13504'),
	(95,CURDATE(), CURDATE(),'Melipilla',24,'13501'),
	(96,CURDATE(), CURDATE(),'San Pedro',24,'13505'),
	(97,CURDATE(), CURDATE(),'Cerrillos',25,'13102'),
	(98,CURDATE(), CURDATE(),'Cerro Navia',25,'13103'),
	(99,CURDATE(), CURDATE(),'Conchalí',25,'13104'),
	(100,CURDATE(), CURDATE(),'El Bosque',25,'13105'),
	(101,CURDATE(), CURDATE(),'Estación Central',25,'13106'),
	(102,CURDATE(), CURDATE(),'Huechuraba',25,'13107'),
	(103,CURDATE(), CURDATE(),'Independencia',25,'13108'),
	(104,CURDATE(), CURDATE(),'La Cisterna',25,'13109'),
	(105,CURDATE(), CURDATE(),'La Granja',25,'13111'),
	(106,CURDATE(), CURDATE(),'La Florida',25,'13110'),
	(107,CURDATE(), CURDATE(),'La Pintana',25,'13112'),
	(108,CURDATE(), CURDATE(),'La Reina',25,'13113'),
	(109,CURDATE(), CURDATE(),'Las Condes',25,'13114'),
	(110,CURDATE(), CURDATE(),'Lo Barnechea',25,'13115'),
	(111,CURDATE(), CURDATE(),'Lo Espejo',25,'13116'),
	(112,CURDATE(), CURDATE(),'Lo Prado',25,'13117'),
	(113,CURDATE(), CURDATE(),'Macul',25,'13118'),
	(114,CURDATE(), CURDATE(),'Maipú',25,'13119'),
	(115,CURDATE(), CURDATE(),'Ñuñoa',25,'13120'),
	(116,CURDATE(), CURDATE(),'Pedro Aguirre Cerda',25,'13121'),
	(117,CURDATE(), CURDATE(),'Peñalolén',25,'13122'),
	(118,CURDATE(), CURDATE(),'Providencia',25,'13123'),
	(119,CURDATE(), CURDATE(),'Pudahuel',25,'13124'),
	(120,CURDATE(), CURDATE(),'Quilicura',25,'13125'),
	(121,CURDATE(), CURDATE(),'Quinta Normal',25,'13126'),
	(122,CURDATE(), CURDATE(),'Recoleta',25,'13127'),
	(123,CURDATE(), CURDATE(),'Renca',25,'13128'),
	(124,CURDATE(), CURDATE(),'San Miguel',25,'13130'),
	(125,CURDATE(), CURDATE(),'San Joaquín',25,'13129'),
	(126,CURDATE(), CURDATE(),'San Ramón',25,'13131'),
	(127,CURDATE(), CURDATE(),'Santiago',25,'13101'),
	(128,CURDATE(), CURDATE(),'Vitacura',25,'13132'),
	(129,CURDATE(), CURDATE(),'El Monte',26,'13602'),
	(130,CURDATE(), CURDATE(),'Isla de Maipo',26,'13603'),
	(131,CURDATE(), CURDATE(),'Padre Hurtado',26,'13604'),
	(132,CURDATE(), CURDATE(),'Peñaflor',26,'13605'),
	(133,CURDATE(), CURDATE(),'Talagante',26,'13601'),
	(134,CURDATE(), CURDATE(),'Codegua',27,'06102'),
	(135,CURDATE(), CURDATE(),'Coínco',27,'06103'),
	(136,CURDATE(), CURDATE(),'Coltauco',27,'06104'),
	(137,CURDATE(), CURDATE(),'Doñihue',27,'06105'),
	(138,CURDATE(), CURDATE(),'Graneros',27,'06106'),
	(139,CURDATE(), CURDATE(),'Las Cabras',27,'06107'),
	(140,CURDATE(), CURDATE(),'Machalí',27,'06108'),
	(141,CURDATE(), CURDATE(),'Malloa',27,'06109'),
	(142,CURDATE(), CURDATE(),'Mostazal',27,'06110'),
	(143,CURDATE(), CURDATE(),'Olivar',27,'06111'),
	(144,CURDATE(), CURDATE(),'Peumo',27,'06112'),
	(145,CURDATE(), CURDATE(),'Pichidegua',27,'06113'),
	(146,CURDATE(), CURDATE(),'Quinta de Tilcoco',27,'06114'),
	(147,CURDATE(), CURDATE(),'Rancagua',27,'06101'),
	(148,CURDATE(), CURDATE(),'Rengo',27,'06115'),
	(149,CURDATE(), CURDATE(),'Requínoa',27,'06116'),
	(150,CURDATE(), CURDATE(),'San Vicente de Tagua Tagua',27,'06117'),
	(151,CURDATE(), CURDATE(),'La Estrella',28,'06202'),
	(152,CURDATE(), CURDATE(),'Litueche',28,'06203'),
	(153,CURDATE(), CURDATE(),'Marchihue',28,'06204'),
	(154,CURDATE(), CURDATE(),'Navidad',28,'06205'),
	(155,CURDATE(), CURDATE(),'Peredones',28,'06206'),
	(156,CURDATE(), CURDATE(),'Pichilemu',28,'06201'),
	(157,CURDATE(), CURDATE(),'Chépica',29,'06302'),
	(158,CURDATE(), CURDATE(),'Chimbarongo',29,'06303'),
	(159,CURDATE(), CURDATE(),'Lolol',29,'06304'),
	(160,CURDATE(), CURDATE(),'Nancagua',29,'06305'),
	(161,CURDATE(), CURDATE(),'Palmilla',29,'06306'),
	(162,CURDATE(), CURDATE(),'Peralillo',29,'06307'),
	(163,CURDATE(), CURDATE(),'Placilla',29,'06308'),
	(164,CURDATE(), CURDATE(),'Pumanque',29,'06309'),
	(165,CURDATE(), CURDATE(),'San Fernando',29,'06301'),
	(166,CURDATE(), CURDATE(),'Santa Cruz',29,'06310'),
	(167,CURDATE(), CURDATE(),'Cauquenes',30,'07201'),
	(168,CURDATE(), CURDATE(),'Chanco',30,'07202'),
	(169,CURDATE(), CURDATE(),'Pelluhue',30,'07203'),
	(170,CURDATE(), CURDATE(),'Curicó',31,'07301'),
	(171,CURDATE(), CURDATE(),'Hualañé',31,'07302'),
	(172,CURDATE(), CURDATE(),'Licantén',31,'07303'),
	(173,CURDATE(), CURDATE(),'Molina',31,'07304'),
	(174,CURDATE(), CURDATE(),'Rauco',31,'07305'),
	(175,CURDATE(), CURDATE(),'Romeral',31,'07306'),
	(176,CURDATE(), CURDATE(),'Sagrada Familia',31,'07307'),
	(177,CURDATE(), CURDATE(),'Teno',31,'07308'),
	(178,CURDATE(), CURDATE(),'Vichuquén',31,'07309'),
	(179,CURDATE(), CURDATE(),'Colbún',32,'07402'),
	(180,CURDATE(), CURDATE(),'Linares',32,'07401'),
	(181,CURDATE(), CURDATE(),'Longaví',32,'07403'),
	(182,CURDATE(), CURDATE(),'Parral',32,'07404'),
	(183,CURDATE(), CURDATE(),'Retiro',32,'07405'),
	(184,CURDATE(), CURDATE(),'San Javier',32,'07406'),
	(185,CURDATE(), CURDATE(),'Villa Alegre',32,'07407'),
	(186,CURDATE(), CURDATE(),'Yerbas Buenas',32,'07408'),
	(187,CURDATE(), CURDATE(),'Constitución',33,'07102'),
	(188,CURDATE(), CURDATE(),'Curepto',33,'07103'),
	(189,CURDATE(), CURDATE(),'Empedrado',33,'07104'),
	(190,CURDATE(), CURDATE(),'Maule',33,'07105'),
	(191,CURDATE(), CURDATE(),'Pelarco',33,'07106'),
	(192,CURDATE(), CURDATE(),'Pencahue',33,'07107'),
	(193,CURDATE(), CURDATE(),'Río Claro',33,'07108'),
	(194,CURDATE(), CURDATE(),'San Clemente',33,'07109'),
	(195,CURDATE(), CURDATE(),'San Rafael',33,'07110'),
	(196,CURDATE(), CURDATE(),'Talca',33,'07101'),
	(197,CURDATE(), CURDATE(),'Arauco',34,'08202'),
	(198,CURDATE(), CURDATE(),'Cañete',34,'08203'),
	(199,CURDATE(), CURDATE(),'Contulmo',34,'08204'),
	(200,CURDATE(), CURDATE(),'Curanilahue',34,'08205'),
	(201,CURDATE(), CURDATE(),'Lebu',34,'08201'),
	(202,CURDATE(), CURDATE(),'Los Álamos',34,'08206'),
	(203,CURDATE(), CURDATE(),'Tirúa',34,'08207'),
	(204,CURDATE(), CURDATE(),'Alto Biobío',35,'08314'),
	(205,CURDATE(), CURDATE(),'Antuco',35,'08302'),
	(206,CURDATE(), CURDATE(),'Cabrero',35,'08303'),
	(207,CURDATE(), CURDATE(),'Laja',35,'08304'),
	(208,CURDATE(), CURDATE(),'Los Ángeles',35,'08301'),
	(209,CURDATE(), CURDATE(),'Mulchén',35,'08305'),
	(210,CURDATE(), CURDATE(),'Nacimiento',35,'08306'),
	(211,CURDATE(), CURDATE(),'Negrete',35,'08307'),
	(212,CURDATE(), CURDATE(),'Quilaco',35,'08308'),
	(213,CURDATE(), CURDATE(),'Quilleco',35,'08309'),
	(214,CURDATE(), CURDATE(),'San Rosendo',35,'08310'),
	(215,CURDATE(), CURDATE(),'Santa Bárbara',35,'08311'),
	(216,CURDATE(), CURDATE(),'Tucapel',35,'08312'),
	(217,CURDATE(), CURDATE(),'Yumbel',35,'08313'),
	(218,CURDATE(), CURDATE(),'Chiguayante',36,'08103'),
	(219,CURDATE(), CURDATE(),'Concepción',36,'08101'),
	(220,CURDATE(), CURDATE(),'Coronel',36,'08102'),
	(221,CURDATE(), CURDATE(),'Florida',36,'08104'),
	(222,CURDATE(), CURDATE(),'Hualpén',36,'08112'),
	(223,CURDATE(), CURDATE(),'Hualqui',36,'08105'),
	(224,CURDATE(), CURDATE(),'Lota',36,'08106'),
	(225,CURDATE(), CURDATE(),'Penco',36,'08107'),
	(226,CURDATE(), CURDATE(),'San Pedro de La Paz',36,'08108'),
	(227,CURDATE(), CURDATE(),'Santa Juana',36,'08109'),
	(228,CURDATE(), CURDATE(),'Talcahuano',36,'08110'),
	(229,CURDATE(), CURDATE(),'Tomé',36,'08111'),
	(230,CURDATE(), CURDATE(),'Bulnes',37,'08402'),
	(231,CURDATE(), CURDATE(),'Chillán',37,'08401'),
	(232,CURDATE(), CURDATE(),'Chillán Viejo',37,'08406'),
	(233,CURDATE(), CURDATE(),'Cobquecura',37,'08403'),
	(234,CURDATE(), CURDATE(),'Coelemu',37,'08404'),
	(235,CURDATE(), CURDATE(),'Coihueco',37,'08405'),
	(236,CURDATE(), CURDATE(),'El Carmen',37,'08407'),
	(237,CURDATE(), CURDATE(),'Ninhue',37,'08408'),
	(238,CURDATE(), CURDATE(),'Ñiquen',37,'08409'),
	(239,CURDATE(), CURDATE(),'Pemuco',37,'08410'),
	(240,CURDATE(), CURDATE(),'Pinto',37,'08411'),
	(241,CURDATE(), CURDATE(),'Portezuelo',37,'08412'),
	(242,CURDATE(), CURDATE(),'Quillón',37,'08413'),
	(243,CURDATE(), CURDATE(),'Quirihue',37,'08414'),
	(244,CURDATE(), CURDATE(),'Ránquil',37,'08415'),
	(245,CURDATE(), CURDATE(),'San Carlos',37,'08416'),
	(246,CURDATE(), CURDATE(),'San Fabián',37,'08417'),
	(247,CURDATE(), CURDATE(),'San Ignacio',37,'08418'),
	(248,CURDATE(), CURDATE(),'San Nicolás',37,'08419'),
	(249,CURDATE(), CURDATE(),'Treguaco',37,'08420'),
	(250,CURDATE(), CURDATE(),'Yungay',37,'08421'),
	(251,CURDATE(), CURDATE(),'Carahue',38,'09102'),
	(252,CURDATE(), CURDATE(),'Cholchol',38,'09121'),
	(253,CURDATE(), CURDATE(),'Cunco',38,'09103'),
	(254,CURDATE(), CURDATE(),'Curarrehue',38,'09104'),
	(255,CURDATE(), CURDATE(),'Freire',38,'09105'),
	(256,CURDATE(), CURDATE(),'Galvarino',38,'09106'),
	(257,CURDATE(), CURDATE(),'Gorbea',38,'09107'),
	(258,CURDATE(), CURDATE(),'Lautaro',38,'09108'),
	(259,CURDATE(), CURDATE(),'Loncoche',38,'09109'),
	(260,CURDATE(), CURDATE(),'Melipeuco',38,'09110'),
	(261,CURDATE(), CURDATE(),'Nueva Imperial',38,'09111'),
	(262,CURDATE(), CURDATE(),'Padre Las Casas',38,'09112'),
	(263,CURDATE(), CURDATE(),'Perquenco',38,'09113'),
	(264,CURDATE(), CURDATE(),'Pitrufquén',38,'09114'),
	(265,CURDATE(), CURDATE(),'Pucón',38,'09115'),
	(266,CURDATE(), CURDATE(),'Saavedra',38,'09116'),
	(267,CURDATE(), CURDATE(),'Temuco',38,'09101'),
	(268,CURDATE(), CURDATE(),'Teodoro Schmidt',38,'09117'),
	(269,CURDATE(), CURDATE(),'Toltén',38,'09118'),
	(270,CURDATE(), CURDATE(),'Vilcún',38,'09119'),
	(271,CURDATE(), CURDATE(),'Villarrica',38,'09120'),
	(272,CURDATE(), CURDATE(),'Angol',39,'09201'),
	(273,CURDATE(), CURDATE(),'Collipulli',39,'09202'),
	(274,CURDATE(), CURDATE(),'Curacautín',39,'09203'),
	(275,CURDATE(), CURDATE(),'Ercilla',39,'09204'),
	(276,CURDATE(), CURDATE(),'Lonquimay',39,'09205'),
	(277,CURDATE(), CURDATE(),'Los Sauces',39,'09206'),
	(278,CURDATE(), CURDATE(),'Lumaco',39,'09207'),
	(279,CURDATE(), CURDATE(),'Purén',39,'09208'),
	(280,CURDATE(), CURDATE(),'Renaico',39,'09209'),
	(281,CURDATE(), CURDATE(),'Traiguén',39,'09210'),
	(282,CURDATE(), CURDATE(),'Victoria',39,'09211'),
	(283,CURDATE(), CURDATE(),'Corral',40,'14102'),
	(284,CURDATE(), CURDATE(),'Lanco',40,'14103'),
	(285,CURDATE(), CURDATE(),'Los Lagos',40,'14104'),
	(286,CURDATE(), CURDATE(),'Máfil',40,'14105'),
	(287,CURDATE(), CURDATE(),'Mariquina',40,'14106'),
	(288,CURDATE(), CURDATE(),'Paillaco',40,'14107'),
	(289,CURDATE(), CURDATE(),'Panguipulli',40,'14108'),
	(290,CURDATE(), CURDATE(),'Valdivia',40,'14101'),
	(291,CURDATE(), CURDATE(),'Futrono',41,'14202'),
	(292,CURDATE(), CURDATE(),'La Unión',41,'14201'),
	(293,CURDATE(), CURDATE(),'Lago Ranco',41,'14203'),
	(294,CURDATE(), CURDATE(),'Río Bueno',41,'14204'),
	(295,CURDATE(), CURDATE(),'Ancud',42,'10202'),
	(296,CURDATE(), CURDATE(),'Castro',42,'10201'),
	(297,CURDATE(), CURDATE(),'Chonchi',42,'10203'),
	(298,CURDATE(), CURDATE(),'Curaco de Vélez',42,'10204'),
	(299,CURDATE(), CURDATE(),'Dalcahue',42,'10205'),
	(300,CURDATE(), CURDATE(),'Puqueldón',42,'10206'),
	(301,CURDATE(), CURDATE(),'Queilén',42,'10207'),
	(302,CURDATE(), CURDATE(),'Quemchi',42,'10209'),
	(303,CURDATE(), CURDATE(),'Quellón',42,'10208'),
	(304,CURDATE(), CURDATE(),'Quinchao',42,'10210'),
	(305,CURDATE(), CURDATE(),'Calbuco',43,'10102'),
	(306,CURDATE(), CURDATE(),'Cochamó',43,'10103'),
	(307,CURDATE(), CURDATE(),'Fresia',43,'10104'),
	(308,CURDATE(), CURDATE(),'Frutillar',43,'10105'),
	(309,CURDATE(), CURDATE(),'Llanquihue',43,'10107'),
	(310,CURDATE(), CURDATE(),'Los Muermos',43,'10106'),
	(311,CURDATE(), CURDATE(),'Maullín',43,'10108'),
	(312,CURDATE(), CURDATE(),'Puerto Montt',43,'10101'),
	(313,CURDATE(), CURDATE(),'Puerto Varas',43,'10109'),
	(314,CURDATE(), CURDATE(),'Osorno',44,'10301'),
	(315,CURDATE(), CURDATE(),'Puero Octay',44,'10302'),
	(316,CURDATE(), CURDATE(),'Purranque',44,'10303'),
	(317,CURDATE(), CURDATE(),'Puyehue',44,'10304'),
	(318,CURDATE(), CURDATE(),'Río Negro',44,'10305'),
	(319,CURDATE(), CURDATE(),'San Juan de la Costa',44,'10306'),
	(320,CURDATE(), CURDATE(),'San Pablo',44,'10307'),
	(321,CURDATE(), CURDATE(),'Chaitén',45,'10401'),
	(322,CURDATE(), CURDATE(),'Futaleufú',45,'10402'),
	(323,CURDATE(), CURDATE(),'Hualaihué',45,'10403'),
	(324,CURDATE(), CURDATE(),'Palena',45,'10404'),
	(325,CURDATE(), CURDATE(),'Aisén',46,'11201'),
	(326,CURDATE(), CURDATE(),'Cisnes',46,'11202'),
	(327,CURDATE(), CURDATE(),'Guaitecas',46,'11203'),
	(328,CURDATE(), CURDATE(),'Cochrane',47,'11301'),
	(329,CURDATE(), CURDATE(),'O\'higgins',47,'11302'),
	(330,CURDATE(), CURDATE(),'Tortel',47,'11303'),
	(331,CURDATE(), CURDATE(),'Coihaique',48,'11101'),
	(332,CURDATE(), CURDATE(),'Lago Verde',48,'11102'),
	(333,CURDATE(), CURDATE(),'Chile Chico',49,'11401'),
	(334,CURDATE(), CURDATE(),'Río Ibáñez',49,'11402'),
	(335,CURDATE(), CURDATE(),'Antártica',50,'12202'),
	(336,CURDATE(), CURDATE(),'Cabo de Hornos',50,'12201'),
	(337,CURDATE(), CURDATE(),'Laguna Blanca',51,'12102'),
	(338,CURDATE(), CURDATE(),'Punta Arenas',51,'12101'),
	(339,CURDATE(), CURDATE(),'Río Verde',51,'12103'),
	(340,CURDATE(), CURDATE(),'San Gregorio',51,'12104'),
	(341,CURDATE(), CURDATE(),'Porvenir',52,'12301'),
	(342,CURDATE(), CURDATE(),'Primavera',52,'12302'),
	(343,CURDATE(), CURDATE(),'Timaukel',52,'12303'),
	(344,CURDATE(), CURDATE(),'Natales',53,'12401'),
	(345,CURDATE(), CURDATE(),'Torres del Paine',53,'12402');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Abel', 'abel@gmail.com', '2018-09-12 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Adriana', 'adriana@gmail.com', '2018-09-12 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Juan', 'juan@juan.cl', '2018-09-12 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Nicole', 'nicole@gmail.com', '2018-09-12 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Raquel', 'raquel@raquel.cl', '2018-09-12 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'PauZo', 'pau@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Liz', 'liz@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Mortin', 'mortin@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Aleli', 'aleli@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Marta', 'Marta@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Solange', 'Solange@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Esmeralda', 'Esmeralda@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Vocho', 'Vocho@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Villanueva', 'Villanueva@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Rin', 'Rin@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Volks', 'Volks@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Wagen', 'Wagen@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Xiaomi', 'Xiaomi@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Xena', 'Xena@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Soraya', 'Soraya@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Silvana', 'Silvana@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Special', 'Special@gmail.com', '2018-09-13 00:00:00', '123123', NULL, NULL, NULL);

INSERT INTO `cursos` (`id`, `created_at`, `updated_at`, `nivel`, `basicaMedia`, `arancelAnual`) VALUES (NULL, NULL, NULL, 'PK', 'Pre-Básico', '300000');
INSERT INTO `cursos` (`id`, `created_at`, `updated_at`, `nivel`, `basicaMedia`, `arancelAnual`) VALUES (NULL, NULL, NULL, 'P', 'Pre-Básico', '300000');
INSERT INTO `cursos` (`id`, `created_at`, `updated_at`, `nivel`, `basicaMedia`, `arancelAnual`) VALUES (NULL, NULL, NULL, '1', 'Básico', '300000');
INSERT INTO `cursos` (`id`, `created_at`, `updated_at`, `nivel`, `basicaMedia`, `arancelAnual`) VALUES (NULL, NULL, NULL, '2', 'Básico', '300000');
INSERT INTO `cursos` (`id`, `created_at`, `updated_at`, `nivel`, `basicaMedia`, `arancelAnual`) VALUES (NULL, NULL, NULL, '3', 'Básico', '300000');
INSERT INTO `cursos` (`id`, `created_at`, `updated_at`, `nivel`, `basicaMedia`, `arancelAnual`) VALUES (NULL, NULL, NULL, '4', 'Básico', '309000');
INSERT INTO `cursos` (`id`, `created_at`, `updated_at`, `nivel`, `basicaMedia`, `arancelAnual`) VALUES (NULL, NULL, NULL, '5', 'Básico', '370000');
INSERT INTO `cursos` (`id`, `created_at`, `updated_at`, `nivel`, `basicaMedia`, `arancelAnual`) VALUES (NULL, NULL, NULL, '6', 'Básico', '340000');
INSERT INTO `cursos` (`id`, `created_at`, `updated_at`, `nivel`, `basicaMedia`, `arancelAnual`) VALUES (NULL, NULL, NULL, '7', 'Básico', '33000');
INSERT INTO `cursos` (`id`, `created_at`, `updated_at`, `nivel`, `basicaMedia`, `arancelAnual`) VALUES (NULL, NULL, NULL, '8', 'Básico', '312000');
INSERT INTO `cursos` (`id`, `created_at`, `updated_at`, `nivel`, `basicaMedia`, `arancelAnual`) VALUES (NULL, NULL, NULL, '1', 'Medio', '523000');
INSERT INTO `cursos` (`id`, `created_at`, `updated_at`, `nivel`, `basicaMedia`, `arancelAnual`) VALUES (NULL, NULL, NULL, '2', 'Medio', '513000');
INSERT INTO `cursos` (`id`, `created_at`, `updated_at`, `nivel`, `basicaMedia`, `arancelAnual`) VALUES (NULL, NULL, NULL, '3', 'Medio', '520000');
INSERT INTO `cursos` (`id`, `created_at`, `updated_at`, `nivel`, `basicaMedia`, `arancelAnual`) VALUES (NULL, NULL, NULL, '4', 'Medio', '635000');

INSERT INTO `direcciones` (`id`, `created_at`, `updated_at`, `idComuna`, `calle`, `nroCalle`, `bloqueTorre`, `dpto`) VALUES (NULL, NULL, NULL, '1', 'siempre viva ', '33', '', '');
INSERT INTO `direcciones` (`id`, `created_at`, `updated_at`, `idComuna`, `calle`, `nroCalle`, `bloqueTorre`, `dpto`) VALUES (NULL, NULL, NULL, '45', 'Belisario', '756', '', '');
INSERT INTO `direcciones` (`id`, `created_at`, `updated_at`, `idComuna`, `calle`, `nroCalle`, `bloqueTorre`, `dpto`) VALUES (NULL, NULL, NULL, '70', 'Los Alambres', '1001', '', '305');
INSERT INTO `direcciones` (`id`, `created_at`, `updated_at`, `idComuna`, `calle`, `nroCalle`, `bloqueTorre`, `dpto`) VALUES (NULL, NULL, NULL, '86', 'Siempre viva', '12', 'A', '98');
INSERT INTO `direcciones` (`id`, `created_at`, `updated_at`, `idComuna`, `calle`, `nroCalle`, `bloqueTorre`, `dpto`) VALUES (NULL, NULL, NULL, '20', 'Luis Marco', '555', '', '');
INSERT INTO `direcciones` (`id`, `created_at`, `updated_at`, `idComuna`, `calle`, `nroCalle`, `bloqueTorre`, `dpto`) VALUES (NULL, NULL, NULL, '18', 'Santamo', '34', '', '');
INSERT INTO `direcciones` (`id`, `created_at`, `updated_at`, `idComuna`, `calle`, `nroCalle`, `bloqueTorre`, `dpto`) VALUES (NULL, NULL, NULL, '60', 'Punta Angamos', '2761', '', '');
INSERT INTO `direcciones` (`id`, `created_at`, `updated_at`, `idComuna`, `calle`, `nroCalle`, `bloqueTorre`, `dpto`) VALUES (NULL, NULL, NULL, '55', 'Arica', '53', '', '');
INSERT INTO `direcciones` (`id`, `created_at`, `updated_at`, `idComuna`, `calle`, `nroCalle`, `bloqueTorre`, `dpto`) VALUES (NULL, NULL, NULL, '72', 'Viñeda', '5786', '', '');
INSERT INTO `direcciones` (`id`, `created_at`, `updated_at`, `idComuna`, `calle`, `nroCalle`, `bloqueTorre`, `dpto`) VALUES (NULL, NULL, NULL, '88', 'Manuel Antonio Matta', '53', '', '');
INSERT INTO `direcciones` (`id`, `created_at`, `updated_at`, `idComuna`, `calle`, `nroCalle`, `bloqueTorre`, `dpto`) VALUES (NULL, NULL, NULL, '12', 'Los Andes', '345', '', '');

INSERT INTO `tipos` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'ApoderadoPostulante', 'Apoderado que aún no firma contrato con la escuela.');
INSERT INTO `tipos` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'Apoderado', 'Apoderado permanente del presente año');
INSERT INTO `tipos` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'Alumno', 'Alumno permanente del presente año');
INSERT INTO `tipos` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'AlumnoPostulante', 'Alumno que aún el apoderado no firma contrato con la escuela.');
INSERT INTO `tipos` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'Revisor', 'Revisores de la postulación');
INSERT INTO `tipos` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'Administrador', 'Administrador de la app');
INSERT INTO `tipos` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'Padre', 'El padre del Alumno');
INSERT INTO `tipos` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'Madre', 'La madre del alumno');
INSERT INTO `tipos` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'PrimerContacto', 'El primer contacto del Alumno');
INSERT INTO `tipos` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'SegundoContacto', 'El segundo contacto del Alumno');

INSERT INTO `personas` (`id`, `created_at`, `updated_at`, `PNombre`, `SNombre`, `TNombre`, `ApPat`, `ApMat`, `fonoFijo`, `fonoCelu`, `idUser`, `rut`, `genero`, `email`, `fechaNacimiento`, `fechaDefuncion`, `estadoCivil`, `idDireccion`) VALUES (NULL, NULL, NULL, 'Maria', 'Alejandra', NULL, 'Parra', 'Zufflo', '876778765', '876778765', '1', '171572975',  'Mujer', 'mujer@mujer.cl', '2000-09-12 00:00:00', NULL, 'Soltero/a', '1');
INSERT INTO `personas` (`id`, `created_at`, `updated_at`, `PNombre`, `SNombre`, `TNombre`, `ApPat`, `ApMat`, `fonoFijo`, `fonoCelu`, `idUser`, `rut`,  `genero`, `email`, `fechaNacimiento`, `fechaDefuncion`, `estadoCivil`, `idDireccion`) VALUES (NULL, NULL, NULL, 'Nicole', 'Almendra', NULL, 'Becerra', 'Altipalan', '967887654', '898776567', '2', '249717428',  'Mujer', 'adri@adri.cl', '2001-09-03 00:00:00', NULL, 'Viudo/a', '1');
INSERT INTO `personas` (`id`, `created_at`, `updated_at`, `PNombre`, `SNombre`, `TNombre`, `ApPat`, `ApMat`, `fonoFijo`, `fonoCelu`, `idUser`, `rut`,  `genero`, `email`, `fechaNacimiento`, `fechaDefuncion`, `estadoCivil`, `idDireccion`) VALUES (NULL, NULL, NULL, 'Sofia', 'Estela', NULL, 'Martinez', 'Sifuentes', NULL, '878776545', '3', '127239355', 'Mujer', 'sifusifu@gmail.com', '1987-09-24 00:00:00', NULL, 'Casado/a', '1');
INSERT INTO `personas` (`id`, `created_at`, `updated_at`, `PNombre`, `SNombre`, `TNombre`, `ApPat`, `ApMat`, `fonoFijo`, `fonoCelu`, `idUser`, `rut`,  `genero`, `email`, `fechaNacimiento`, `fechaDefuncion`, `estadoCivil`, `idDireccion`) VALUES (NULL, NULL, NULL, 'Alberto', 'Ignacio', NULL, 'Chang', 'Defelopulus', NULL, '978776534', '4', '198581925',  'Hombre', 'chang@hotmail.com', '1983-09-15 00:00:00', NULL, 'Soltero/a', '10');
INSERT INTO `personas` (`id`, `created_at`, `updated_at`, `PNombre`, `SNombre`, `TNombre`, `ApPat`, `ApMat`, `fonoFijo`, `fonoCelu`, `idUser`, `rut`,  `genero`, `email`, `fechaNacimiento`, `fechaDefuncion`, `estadoCivil`, `idDireccion`) VALUES (NULL, NULL, NULL, 'Valentina', 'Camila', 'Andrea', 'Diaz', 'Sotelo', NULL, '945887345', '5', '95943616', 'Mujer', 'camdi@gmail.com', '1996-02-12 00:00:00', NULL, 'Soltero/a', '6');
INSERT INTO `personas` (`id`, `created_at`, `updated_at`, `PNombre`, `SNombre`, `TNombre`, `ApPat`, `ApMat`, `fonoFijo`, `fonoCelu`, `idUser`, `rut`, `genero`, `email`, `fechaNacimiento`, `fechaDefuncion`, `estadoCivil`, `idDireccion`) VALUES (NULL, NULL, NULL, 'Yan', 'Belen', NULL, 'Ulloa', 'Marchant', NULL, '987554422', '6', '114209317',  'Mujer', 'yanu@gmail.com', '1993-01-12 00:00:00', NULL, 'Soltero/a', '7');
INSERT INTO `personas` (`id`, `created_at`, `updated_at`, `PNombre`, `SNombre`, `TNombre`, `ApPat`, `ApMat`, `fonoFijo`, `fonoCelu`, `idUser`, `rut`,  `genero`, `email`, `fechaNacimiento`, `fechaDefuncion`, `estadoCivil`, `idDireccion`) VALUES (NULL, NULL, NULL, 'Juan', 'Francisco', 'Alberto', 'Sura', 'Sen', NULL, '898774653', '7', '109249173', 'Hombre', 'sen@yahoo.es', '1990-12-24 00:00:00', NULL, 'Casado/a', '8');
INSERT INTO `personas` (`id`, `created_at`, `updated_at`, `PNombre`, `SNombre`, `TNombre`, `ApPat`, `ApMat`, `fonoFijo`, `fonoCelu`, `idUser`, `rut`,  `genero`, `email`, `fechaNacimiento`, `fechaDefuncion`, `estadoCivil`, `idDireccion`) VALUES (NULL, NULL, NULL, 'Luis', 'Abel', 'Abraham', 'Simpson', 'Less', NULL, '980774836', '8', '139178724', 'Hombre', 'abel@hotmail.com', '1981-09-12 00:00:00', NULL, 'Conviviente', '9');
INSERT INTO `personas` (`id`, `created_at`, `updated_at`, `PNombre`, `SNombre`, `TNombre`, `ApPat`, `ApMat`, `fonoFijo`, `fonoCelu`, `idUser`, `rut`,  `genero`, `email`, `fechaNacimiento`, `fechaDefuncion`, `estadoCivil`, `idDireccion`) VALUES (NULL, NULL, NULL, 'Luisa', 'Andrea', 'Antonella', 'Santander', 'Odin', NULL, '980774836', '9', '129178736',  'Mujer', 'antonella@hotmail.com', '1980-09-12 00:00:00', NULL, 'Conviviente', '10');

INSERT INTO `tipo_persona` (`id`, `created_at`, `updated_at`, `idTipo`, `idPersona`) VALUES (NULL, NULL, NULL, '1', '1');
INSERT INTO `tipo_persona` (`id`, `created_at`, `updated_at`, `idTipo`, `idPersona`) VALUES (NULL, NULL, NULL, '2', '2');
INSERT INTO `tipo_persona` (`id`, `created_at`, `updated_at`, `idTipo`, `idPersona`) VALUES (NULL, NULL, NULL, '3', '3');
INSERT INTO `tipo_persona` (`id`, `created_at`, `updated_at`, `idTipo`, `idPersona`) VALUES (NULL, NULL, NULL, '4', '4');
INSERT INTO `tipo_persona` (`id`, `created_at`, `updated_at`, `idTipo`, `idPersona`) VALUES (NULL, NULL, NULL, '5', '5');
INSERT INTO `tipo_persona` (`id`, `created_at`, `updated_at`, `idTipo`, `idPersona`) VALUES (NULL, NULL, NULL, '6', '6');
INSERT INTO `tipo_persona` (`id`, `created_at`, `updated_at`, `idTipo`, `idPersona`) VALUES (NULL, NULL, NULL, '7', '7');
INSERT INTO `tipo_persona` (`id`, `created_at`, `updated_at`, `idTipo`, `idPersona`) VALUES (NULL, NULL, NULL, '8', '8');
INSERT INTO `tipo_persona` (`id`, `created_at`, `updated_at`, `idTipo`, `idPersona`) VALUES (NULL, NULL, NULL, '9', '9');


INSERT INTO `apoderados` (`id`, `created_at`, `updated_at`, `nivelEducacional`, `profesion`, `paisDeOrigen`, `idPersona`, `estado`) VALUES (NULL, NULL, NULL, '4 ° Medio Técnico-Profesional', 'Redes', 'Chile', '2', '');

INSERT INTO `alumnos` (`id`, `created_at`, `updated_at`, `parentesco`, `otroParentesco`, `repitencias`, `condicion`, `estado`, `estadoCivilPadres`, `idPersona`, `idApoderado`, `idCursoActual`, `idCursoPostu`) VALUES (NULL, NULL, NULL, 'Padre', NULL, '0', 'nuevo', 'Revisar', 'Casados/as', '3', '1', '1', '1');

INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'Apoderado', 'Apoderado con alumnos matriculados');
INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'Alumno', 'Alumno matrículado');
INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'ApoderadoPostulante', 'Apoderado que aún no firma contrato con la escuela.');
INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'AlumnoPostulante', 'Alumno que aún el apoderado no firma contrato con la escuela.');
INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'Revisor', 'Apoderado colegio');
INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'Secretariado', 'Secretariado colegio');
INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'Administrador', 'Administrador colegio');
INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES (NULL, NULL, NULL, 'Otro', 'Otro cargo colegio');

INSERT INTO `ficha_alumno` (`id`, `created_at`, `updated_at`, `ingresoFamiliarM`, `viveConPadre`, `viveConMadre`, `viveConAbuelos`, `viveConTios`, `viveConTutor`, `causas`, `nroConvivientes`, `totalHijos`, `nroDeHijo`, `nroHermaIDOP`, `tenenciaVivienda`, `estudiaCon`, `isapreFonasa`, `seguroComple`, `enfermedades`, `medicamentos`, `esAlergico`, `AlergicoA`, `observacionesSalud`, `grupoSanguineo`, `idAlumno`, `PNombrePContacto`, `SNombrePContacto`, `TNombrePContacto`, `ApPatPContacto`, `ApMatPContacto`, `fonoFijoPContacto`, `fonoCeluPContacto`, `emailPContacto`, `parentescoPContacto`, `PNombreSContacto`, `SNombreSContacto`, `TNombreSContacto`, `ApPatSContacto`, `ApMatSContacto`, `fonoFijoSContacto`, `fonoCeluSContacto`, `emailSContacto`, `parentescoSContacto`) VALUES (NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '6', '1', '0', '0', '0', '0', 'Muchas', '2', '2', '2', '2', 'Arrendatario', 'Tutor/Tutura Legal', 'Isapre', '0', 'eter', 'eter', '1', 'eter', 'eter', 'O+', '1', 'eter', 'eter', 'eter', 'eter', 'eter', '123', '123', '123@asd.cl', 'Tío/Tía', 'eter', 'eter', 'eter', 'eter', 'eter', '123', '123', 'eter@eter.cl', 'Madrastra');