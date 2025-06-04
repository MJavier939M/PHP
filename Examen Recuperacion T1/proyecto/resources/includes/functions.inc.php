<?php

//TO DO: Rellena aquí todas las funciones que consideres. Trata de respetar la separación de la lógica de negocio y de presentación

function dump($vars){
	echo '<pre>'.print_r($vars,true).'</pre>';
}

function marcar() {

	if (is_numeric($_POST['fila']) && $_POST['fila'] >= 1 && $_POST['fila'] <= 7 && is_numeric($_POST['fila']) && $_POST['columna'] >= 1 && $_POST['columna'] <= 7) {
		$fila = $_POST['fila'];
		$columna = $_POST['columna'];
		$coordenada = $columna ."-".$fila;

		if (in_array($coordenada,($_SESSION['coordenadas']))) {
			$_SESSION['mensaje'] = "Ya existen";
		}else {
			$_SESSION['coordenadas'][] = $coordenada;
		}

	}else {
		$_SESSION['mensaje'] = "Error al introducir los valores";
	}

	dump($_SESSION['coordenadas']);

}

function limpiar() {
	session_unset();
	session_destroy();
}

function guardarBD() {

	$coordenas = json_encode($_SESSION['coordenadas']);

	$conn = new PDO('mysql:host=localhost;dbname=mi_base_de_datos', 'root', '');
	$stmt = $conn->prepare("INSERT INTO tableros (marcas) VALUES (:marcas)");
	$stmt->bindParam(':marcas',$coordenas);
	$stmt->execute();
	
}