<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Alterar Reserva da Sala 707</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Sala707.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
<h1 class="titulo-form">Alterar Reserva da Sala 707</h1>

<div class="form-reserva-sala707">
	<form>
		<!-- id reserva sala 707 -->
		<label for="id">ID:</label><br>
		<input type="text" name="id-reserva-sala707" disabled id="id"/>
		<!-- -->
		<br>
		<!-- data reserva sala 707 -->
		<label for="data">Data:</label><br>
		<input type="date" name="data-reserva-sala707" required id="data">
		<!-- -->
		<br>
		<!-- horário reserva sala 707 -->
		<label for="horario">Horário:</label><br>
		<select name="select-horario-reserva-sala707" required id="horario">
			<option>Selecione um horário:</option>
			<option value="1-horario-mat-sala707">1º Hor. Mat. 7h20 ás 8h10</option>
			<option value="2-horario-mat-sala707">2º Hor. Mat. 8h10 ás 9h00</option>
			<option value="3-horario-mat-sala707">3º Hor. Mat. 9h00 ás 9h45</option>
			<option value="4-horario-mat-sala707">4º Hor. Mat. 10h05 ás 11h00</option>
			<option value="5-horario-mat-sala707">5º Hor. Mat. 11h00 ás 11h50</option>
			<option value="6-horario-mat-sala707">6º Hor. Mat. 11h50 ás 12h40</option>
			<option value="7-horario-mat-sala707">7º Hor. Mat. 12h40 ás 13h30</option>
			<option value="1-horario-ves-sala707">1º Hor. Ves. 13h30 ás 18h00</option>
			<option value="1-horario-not-sala707">1º Hor. Not. 18h30 ás 21h10</option>
			<option value="2-horario-not-sala707">2º Hor. Not. 21h10 ás 22h40</option>
		</select>
		<!-- -->
		<br>
		<!-- Responsável pela Reserva sala 707 -->
		<label for="resp-reserva">Responsável Reserva:</label><br>
		<input type="text" name="resp-reserva-sala707" required id="resp-reserva"/>
		<!-- -->
		<br>
		<!-- Botão -->
		<input type="submit" value="Alterar" name="alterar-reserva-sala707"/>
		<!-- -->
	</form>
</div>
</body>
</html>