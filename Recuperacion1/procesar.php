<?php

require_once("config.php");

try {
	$dbConfig = getDatabaseConfigFromEnv(__DIR__ . '/.env');
} catch (Exception $e) {
	echo 'Error: ' . $e->getMessage();
}

if (isset($_POST['vuelo'], $_POST['origen'], $_POST['destino'], $_POST['precio'], $_POST['fecha_vuelo'], $_POST['aerolinea'])) {
	try {
		$dbname = trim($dbConfig['database'], "'");
		$conn = new PDO(
			"mysql:host={$dbConfig['host']};dbname={$dbname}",
			trim($dbConfig['username'], "'"),
			trim($dbConfig['password'], "'")
		);

		foreach ($_POST['vuelo'] as $id) {
			$origen = $_POST['origen'][$id] ?? '';
			$destino = $_POST['destino'][$id] ?? '';
			$precio = $_POST['precio'][$id] ?? '';
			$fecha_vuelo = $_POST['fecha_vuelo'][$id] ?? '';
			$aerolinea = $_POST['aerolinea'][$id] ?? '';

			$stmt = $conn->prepare("
				INSERT INTO vuelos_seleccionados (origen, destino, precio, fecha_vuelo, aerolinea)
				VALUES (:origen, :destino, :precio, :fecha_vuelo, :aerolinea)
			");

			$stmt->bindParam(':origen', $origen, PDO::PARAM_STR);
			$stmt->bindParam(':destino', $destino, PDO::PARAM_STR);
			$stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
			$stmt->bindParam(':fecha_vuelo', $fecha_vuelo, PDO::PARAM_STR);
			$stmt->bindParam(':aerolinea', $aerolinea, PDO::PARAM_STR);
			
			$stmt2 = $conn->prepare("SELECT * FROM vuelos_seleccionados WHERE origen = :origen AND destino = :destino");
			$stmt2->bindParam(':origen', $origen, PDO::PARAM_STR);
			$stmt2->bindParam(':destino', $destino, PDO::PARAM_STR);
			$stmt2->execute();

			if ($stmt2->fetchColumn() > 0) {
				echo "El vuelo $origen => $destino ya está guardado<br>";
			}else {
				$stmt->execute();
				echo "El vuelo $origen => $destino se ha guardado correctamente<br>";
			}

		}
	} catch (PDOException $e) {
		echo "Error al guardar los vuelos: $e";
	}
}
