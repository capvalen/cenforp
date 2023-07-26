<?php

require_once "conexion.php";

Class ModeloUbigeo{
	static public function mostrar($tabla, $valor){
		switch ($tabla) {
			case 'departamentos':
				$stmt = Conexion::conectar()->prepare("SELECT * FROM `udepartamentos`;"); break;
			case 'provincias':
				$stmt = Conexion::conectar()->prepare("SELECT * FROM `uprovincias` where department_id=:id; ");
				$stmt->bindParam(":id" , $valor, PDO::PARAM_INT);
			 break;
			case 'distritos':
				$stmt = Conexion::conectar()->prepare("SELECT * FROM `udistritos` where province_id=:id; ");
				$stmt->bindParam(":id" , $valor, PDO::PARAM_INT);
			 break;
			default:
				# code...
				break;
		}
		$stmt->execute();
		return $stmt->fetchAll();
	}
}