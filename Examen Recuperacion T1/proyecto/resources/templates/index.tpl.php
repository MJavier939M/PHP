<!doctype html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

	<title>Recuperación T1</title>



	<!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="./resources/css/custom.css" rel="stylesheet">

</head>

<body>

	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
		<h5 class="my-0 mr-md-auto font-weight-normal">Examen recuperación</h5>
	</div>

	<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
		<h1 class="display-4">Tabla de marcas</h1>
	</div>

	<div class="container-lg">
		<div class="row">
			<div class="form-container col-3">
				<div class="row">
					<div class="col-12">
						<form method="post">
							<label for="columna" class="form-label">Columna</label>
							<input type="text" class="form-control" id="columna" name="columna">
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<label for="fila" class="form-label">Fila</label>
						<input type="text" class="form-control" id="fila" name="fila">
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button type="submit" class="btn btn-primary mt-3" name="marcar">Marcar</button>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button type="submit" class="btn btn-danger mt-3" name="limpiar">Limpiar</button>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button type="submit" class="btn btn-success mt-3" name="guardar">Guadar en B.D</button>
					</div>
				</div>
					</form>

			</div>
			<div id="board" class="col-9">
				<div id="messageArea">
					<?php echo isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "" ?>
				</div>
				<table>
					<tr>
						<th class="numbers"></th>
						<th class="numbers">1</th>
						<th class="numbers">2</th>
						<th class="numbers">3</th>
						<th class="numbers">4</th>
						<th class="numbers">5</th>
						<th class="numbers">6</th>
						<th class="numbers">7</th>
					</tr>

					<tr>
						<th class="letters">1</th>
						<td>
							<div id="00" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('1-1',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="01" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('1-2',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="02" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('1-3',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="03" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('1-4',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="04" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('1-5',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="05" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('1-6',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="06" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('1-7',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
					</tr>
					<tr>
						<th class="letters">2</th>
						<td>
							<div id="10" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('2-1',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="11" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('2-2',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="12" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('2-3',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="13" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('2-4',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="14" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('2-5',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="15" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('2-6',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="16" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('2-7',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
					<tr>
						<th class="letters">3</th>
						<td>
							<div id="20" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('3-1',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="21" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('3-2',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="22" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('3-3',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="23" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('3-4',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="24" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('3-5',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="25" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('3-6',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="26" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('3-7',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
					</tr>
					</tr>
					<tr>
						<th class="letters">4</th>
						<td>
							<div id="30" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('4-1',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="31" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('4-2',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="32" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('4-3',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="33" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('4-4',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="34" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('4-5',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="35" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('4-6',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="36" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('4-7',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
					</tr>
					<tr>
						<th class="letters">5</td>
						<td>
							<div id="40" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('5-1',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="41" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('5-2',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="42" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('5-3',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="43" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('5-4',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						
						<td>
							<div id="44" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('5-5',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="45" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('5-6',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="46" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('5-7',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
					</tr>
					<tr>
						<th class="letters">6</td>
						<td>
							<div id="50" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('6-1',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="51" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('6-2',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="52" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('6-3',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="53" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('6-4',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="54" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('6-5',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="55" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('6-6',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="56" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('6-7',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
					</tr>
					<tr>
						<th class="letters">7</td>
						<td>
							<div id="60" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('7-1',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="61" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('7-2',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="62" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('7-3',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="63" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('7-4',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="64" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('7-5',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="65" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('7-6',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td>
						<td>
							<div id="66" class="<?php if (isset($_SESSION['coordenadas'])) { echo in_array('7-7',$_SESSION['coordenadas']) ? 'miss' : '';}?>"></div>
						</td><
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>