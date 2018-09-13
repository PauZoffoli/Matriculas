INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Abel', 'abel@gmail.com', '2018-09-12 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Adriana', 'adriana@gmail.com', '2018-09-12 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Juan', 'juan@juan.cl', '2018-09-12 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Nicole', 'nicole@gmail.com', '2018-09-12 00:00:00', '123123', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Raquel', 'raquel@raquel.cl', '2018-09-12 00:00:00', '123123', NULL, NULL, NULL);

INSERT INTO `cursos` (`id`, `created_at`, `updated_at`, `nivel`, `basicaMedia`, `arancelAnual`) VALUES (NULL, NULL, NULL, '1', 'Básico', '300000');


INSERT INTO `direcciones` (`id`, `created_at`, `updated_at`, `idComuna`, `calle`, `nroCalle`, `bloqueTorre`, `dpto`) VALUES (NULL, NULL, NULL, '1', 'siempre viva ', '33', '', '');

INSERT INTO `personas` (`id`, `created_at`, `updated_at`, `PNombre`, `SNombre`, `TNombre`, `ApPat`, `ApMat`, `fonoFijo`, `fonoCelu`, `idUser`, `rut`, `tipoPersona`, `genero`, `email`, `fechaNacimiento`, `fechaDefuncion`, `estadoCivil`, `idDireccion`) VALUES (NULL, NULL, NULL, 'Maria', 'Alejandra', NULL, 'Parra', 'Zufflo', '876778765', '876778765', '1', '171572975', 'Apoderado', 'Mujer', 'mujer@mujer.cl', '2000-09-12 00:00:00', NULL, 'Soltero/a', '1');

INSERT INTO `personas` (`id`, `created_at`, `updated_at`, `PNombre`, `SNombre`, `TNombre`, `ApPat`, `ApMat`, `fonoFijo`, `fonoCelu`, `idUser`, `rut`, `tipoPersona`, `genero`, `email`, `fechaNacimiento`, `fechaDefuncion`, `estadoCivil`, `idDireccion`) VALUES (NULL, NULL, NULL, 'Nicole', 'Almendra', NULL, 'Becerra', 'Altipalan', '967887654', '898776567', '2', '249717428', 'Alumno', 'Mujer', 'adri@adri.cl', '2001-09-03 00:00:00', NULL, 'Viudo/a', '1');

INSERT INTO `personas` (`id`, `created_at`, `updated_at`, `PNombre`, `SNombre`, `TNombre`, `ApPat`, `ApMat`, `fonoFijo`, `fonoCelu`, `idUser`, `rut`, `tipoPersona`, `genero`, `email`, `fechaNacimiento`, `fechaDefuncion`, `estadoCivil`, `idDireccion`) VALUES (NULL, NULL, NULL, 'Sofia', 'Estela', NULL, 'Martinez', 'Sifuentes', NULL, '878776545', '3', '127239355', 'Secretariado', 'Mujer', 'sifusifu@gmail.com', '1987-09-24 00:00:00', NULL, 'Casado/a', '1');

INSERT INTO `apoderados` (`id`, `created_at`, `updated_at`, `nivelEducacional`, `profesion`, `paisDeOrigen`, `idPersona`, `estado`) VALUES (NULL, NULL, NULL, '4 ° Medio Técnico-Profesional', 'Redes', 'Chile', '2', '');

INSERT INTO `alumnos` (`id`, `created_at`, `updated_at`, `parentesco`, `otroParentesco`, `repitencias`, `condicion`, `estado`, `estadoCivilPadres`, `idPersona`, `idApoderado`, `idCursoActual`, `idCursoPostu`) VALUES (NULL, NULL, NULL, 'Padre', NULL, '0', 'nuevo', 'Revisar', 'Casados/as', '3', '1', '1', '1');


