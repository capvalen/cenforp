# cenforp
Cambios en sql:
ALTER TABLE alumnos ADD registro DATETIME DEFAULT CURRENT_TIMESTAMP AFTER notaTres;


ALTER TABLE `alumnos` ADD `idOcupacion` INT NOT NULL AFTER `codigo`; 
ALTER TABLE `alumnos` DROP `opcionOcupacional`;
UPDATE `ocupaciones` SET `id` = '6' WHERE `ocupaciones`.`id` = 7; 
UPDATE `ocupaciones` SET `id` = '7' WHERE `ocupaciones`.`id` = 8; 
UPDATE `ocupaciones` SET `id` = '8' WHERE `ocupaciones`.`id` = 10; 
UPDATE `ocupaciones` SET `opcionOcupacional` = 'NINGUNO' WHERE `ocupaciones`.`id` = 8; 
UPDATE `alumnos` SET  `departamento` = '02', `provincia`='0201', `distrito`='020102' where 1;
ALTER TABLE `alumnos` DROP `nacionalidad`;
CREATE TABLE `cenforp`.`nacionalidad` (`id` INT NOT NULL AUTO_INCREMENT , `nacionalidad` VARCHAR(250) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 
INSERT INTO `nacionalidad` (`id`, `nacionalidad`) VALUES (NULL, 'Peruana'), (NULL, 'Venezolana'), (NULL, 'Otros');
ALTER TABLE `alumnos` ADD `idNacionalidad` INT NOT NULL DEFAULT '1' AFTER `lugarNacimiento`; 
ALTER TABLE `usuarios` DROP `opcionOcupacional`;
ALTER TABLE `usuarios` ADD `idOcupacion` INT NOT NULL DEFAULT '1' AFTER `password`; 
CREATE TABLE `cenforp`.`asistencias` (`id` INT NOT NULL AUTO_INCREMENT , `idAlumno` INT NOT NULL , `fecha` DATE NOT NULL , `presente` INT NOT NULL COMMENT '1=presente; 0=falta' , `registro` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB; 
UPDATE `usuarios` SET `idOcupacion` = '3' WHERE `usuarios`.`id` = 17; 
UPDATE `usuarios` SET `idOcupacion` = '4' WHERE `usuarios`.`id` = 18; 
UPDATE `usuarios` SET `idOcupacion` = '5' WHERE `usuarios`.`id` = 19; 
UPDATE `usuarios` SET `idOcupacion` = '6' WHERE `usuarios`.`id` = 20; 