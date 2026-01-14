
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Fechas PHP</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="output">
		<?php
		date_default_timezone_set('Europe/Madrid');
		$actual= time();
		$fecha = date('d \d\e F \d\e Y', $actual);
		$fechaMañana = date ('d \d\e F \d\e Y', strtotime('+ 1 day', $actual));
		$hora = date('H:i:s');
		$proxLunes = date('d \d\e F \d\e Y', strtotime("next Monday"));
		echo $fecha, "<br>" . $fechaMañana . "<br>" . $hora . "<br>" . $proxLunes;
		?>
	</div>
</body>
</html>

