<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastrar Reserva do Conversor VGA</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_ConversorVGA.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<h1 class="titulo-form">Cadastrar Reserva do Conversor VGA</h1>

<div class="form-reserva-conversor">
	<form>
		<!-- id reserva conversor -->
		<label for="id">ID:</label><br>
		<input type="text" name="id-reserva-conversor" disabled id="id"/>
		<!-- -->
		<br>
		<!-- conversor vga -->
		<label for="conversor">Conversor VGA:</label><br>
		<select name="select-conversor" required id="conversor">
			<option>Selecione um conversor VGA:</option>
			<option value="Conversor-VGA">Conversor VGA (única unidade)</option>
		</select>
		<!-- -->
		<br>
		<!-- data reserva conversor -->
		<label for="data">Data:</label><br>
		<input type="date" name="data-reserva-conversor" required id="data"/>
		<!-- -->
		<br>
		<!-- horário reserva conversor -->
		<label for="horario">Horário:</label><br>
		<select name="select-horario-reserva-conversor" required id="horario">
			<option>Selecione um horário:</option>
			<option value="1-horario-mat-conv">1º Hor. Mat. 7h20 ás 8h10</option>
			<option value="2-horario-mat-conv">2º Hor. Mat. 8h10 ás 9h00</option>
			<option value="3-horario-mat-conv">3º Hor. Mat. 9h00 ás 9h45</option>
			<option value="4-horario-mat-conv">4º Hor. Mat. 10h05 ás 11h00</option>
			<option value="5-horario-mat-conv">5º Hor. Mat. 11h00 ás 11h50</option>
			<option value="6-horario-mat-conv">6º Hor. Mat. 11h50 ás 12h40</option>
			<option value="7-horario-mat-conv">7º Hor. Mat. 12h40 ás 13h30</option>
			<option value="1-horario-ves-conv">1º Hor. Ves. 13h30 ás 18h00</option>
			<option value="1-horario-not-conv">1º Hor. Not. 18h30 ás 21h10</option>
			<option value="2-horario-not-conv">2º Hor. Not. 21h10 ás 22h40</option>
		</select>
		<!-- -->
		<br>
		<!-- responsável pela reserva conversor -->
		<label for="resp-reserva">Responsável Reserva:</label><br>
		<input type="text" name="resp-reserva-conversor" required id="resp-reserva"/>
		<!-- -->
		<br>
		<!-- botão -->
		<input type="submit" value="Cadastrar" name="cadastrar-reserva-conversor"/>
		<!-- -->
	</form>
</div>

</body>
</html>