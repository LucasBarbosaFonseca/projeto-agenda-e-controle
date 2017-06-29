<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastrar Reserva da Sala 704</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Sala704.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
<h1 class="titulo-form">Cadastrar Reserva da Sala 704</h1>

<div class="form-reserva-sala704">
	<form>
		<!-- id reserva sala 704 -->
		<label for="id">ID:</label><br>
		<input type="text" name="id-reserva-sala704" disabled id="id"/>
		<!-- -->
		<br>
		<!-- data reserva sala 704 -->
		<label for="data">Data:</label><br>
		<input type="date" name="data-reserva-sala704" required id="data">
		<!-- -->
		<br>
		<!-- horário reserva sala 704 -->
		<label for="horario">Horário:</label><br>
		<select name="select-horario-reserva-sala704" required id="horario">
			<option>Selecione um horário:</option>
			<option value="1-horario-mat-sala704">1º Hor. Mat. 7h20 ás 8h10</option>
			<option value="2-horario-mat-sala704">2º Hor. Mat. 8h10 ás 9h00</option>
			<option value="3-horario-mat-sala704">3º Hor. Mat. 9h00 ás 9h45</option>
			<option value="4-horario-mat-sala704">4º Hor. Mat. 10h05 ás 11h00</option>
			<option value="5-horario-mat-sala704">5º Hor. Mat. 11h00 ás 11h50</option>
			<option value="6-horario-mat-sala704">6º Hor. Mat. 11h50 ás 12h40</option>
			<option value="7-horario-mat-sala704">7º Hor. Mat. 12h40 ás 13h30</option>
			<option value="1-horario-ves-sala704">1º Hor. Ves. 13h30 ás 18h00</option>
			<option value="1-horario-not-sala704">1º Hor. Not. 18h30 ás 21h10</option>
			<option value="2-horario-not-sala704">2º Hor. Not. 21h10 ás 22h40</option>
		</select>
		<!-- -->
		<br>
		<!-- Responsável pela Reserva sala 704 -->
		<label for="resp-reserva">Responsável Reserva:</label><br>
		<input type="text" name="resp-reserva-sala704" required id="resp-reserva"/>
		<!-- -->
		<br>
		<!-- Botão -->
		<input type="submit" value="Cadastrar" name="cadastrar-reserva-sala704"/>
		<!-- -->
	</form>
</div>
</body>
</html>