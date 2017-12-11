<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Alterar Reserva do Lab02</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Lab02.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
<h1 class="titulo-form">Alterar Reserva do Lab02</h1>

<div class="form-reserva-lab02">
	<form>
		<!-- id reserva lab -->
		<label for="id">ID:</label><br>
		<input type="text" name="id-reserva-lab" disabled id="id"/>
		<!-- -->
		<br>
		<!-- data reserva lab -->
		<label for="data">Data:</label><br>
		<input type="date" name="data-reserva-lab" required id="data">
		<!-- -->
		<br>
		<!-- horário reserva lab -->
		<label for="horario">Horário:</label><br>
		<select name="select-horario-reserva-lab" required id="horario">
			<option>Selecione um horário:</option>
			<option value="1-horario-mat-lab02">1º Hor. Mat. 7h20 ás 8h10</option>
			<option value="2-horario-mat-lab02">2º Hor. Mat. 8h10 ás 9h00</option>
			<option value="3-horario-mat-lab02">3º Hor. Mat. 9h00 ás 9h45</option>
			<option value="4-horario-mat-lab02">4º Hor. Mat. 10h05 ás 11h00</option>
			<option value="5-horario-mat-lab02">5º Hor. Mat. 11h00 ás 11h50</option>
			<option value="6-horario-mat-lab02">6º Hor. Mat. 11h50 ás 12h40</option>
			<option value="7-horario-mat-lab02">7º Hor. Mat. 12h40 ás 13h30</option>
			<option value="1-horario-ves-lab02">1º Hor. Ves. 13h30 ás 18h00</option>
			<option value="1-horario-not-lab02">1º Hor. Not. 18h30 ás 21h10</option>
			<option value="2-horario-not-lab02">2º Hor. Not. 21h10 ás 22h40</option>
		</select>
		<!-- -->
		<br>
		<!-- Responsável pela Reserva lab -->
		<label for="resp-reserva">Responsável Reserva:</label><br>
		<input type="text" name="resp-reserva-lab" required id="resp-reserva"/>
		<!-- -->
		<br>
		<!-- Botão -->
		<input type="submit" value="Alterar" name="alterar-reserva-lab02"/>
		<!-- -->
	</form>
</div>
</body>
</html>