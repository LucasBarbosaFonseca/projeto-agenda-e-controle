<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastrar Reserva do Auditório</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Auditorio.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
<h1 class="titulo-form">Cadastrar Reserva do Auditório</h1>

<div class="form-reserva-auditorio">
	<form>
		<!-- id reserva auditório -->
		<label for="id">ID:</label><br>
		<input type="text" name="id-reserva-auditorio" disabled id="id"/>
		<!-- -->
		<br>
		<!-- data reserva auditorio -->
		<label for="data">Data:</label><br>
		<input type="date" name="data-reserva-auditorio" required id="data">
		<!-- -->
		<br>
		<!-- horário reserva auditorio -->
		<label for="horario">Horário:</label><br>
		<select name="select-horario-reserva-auditorio" required id="horario">
			<option>Selecione um horário:</option>
			<option value="1-horario-mat-audit">1º Hor. Mat. 7h20 ás 8h10</option>
			<option value="2-horario-mat-audit">2º Hor. Mat. 8h10 ás 9h00</option>
			<option value="3-horario-mat-audit">3º Hor. Mat. 9h00 ás 9h45</option>
			<option value="4-horario-mat-audit">4º Hor. Mat. 10h05 ás 11h00</option>
			<option value="5-horario-mat-audit">5º Hor. Mat. 11h00 ás 11h50</option>
			<option value="1-horario-ves-audit">1º Hor. Ves. 11h50 ás 14h00</option>
			<option value="2-horario-ves-audit">2º Hor. Ves. 14h00 ás 18h00</option>
			<option value="1-horario-not-audit">1º Hor. Not. 18h30 ás 21h10</option>
			<option value="2-horario-not-audit">2º Hor. Not. 21h10 ás 22h40</option>
		</select>
		<!-- -->
		<br>
		<!-- Responsável pela Reserva auditório -->
		<label for="resp-reserva">Responsável Reserva:</label><br>
		<input type="text" name="resp-reserva-auditorio" required id="resp-reserva"/>
		<!-- -->
		<br>
		<!-- Botão -->
		<input type="submit" value="Cadastrar" name="cadastrar-reserva-auditorio"/>
		<!-- -->
	</form>
</div>
</body>
</html>