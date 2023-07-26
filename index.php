<?php
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/ocupaciones.controlador.php";
require_once "controladores/correo.controlador.php";
require_once "controladores/alumnos.controlador.php";
require_once "controladores/ubigeo.controlador.php";
// require_once "controladores/ventas.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/ocupaciones.modelo.php";
require_once "modelos/correo.modelo.php";
require_once "modelos/alumnos.modelo.php";
require_once "modelos/ubigeo.modelo.php";
// require_once "modelos/ventas.modelo.php";
require_once "extensiones/vendor/autoload.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();