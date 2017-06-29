<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Alterar Reserva do Cabo HDMI</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_CaboHDMI.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<h1 class="titulo-form">Alterar Reserva do Cabo HDMI</h1>

<div class="form-reserva-cabo">
	<form>
		<!-- id reserva cabo -->
		<label for="id">ID:</label><br>
		<input type="text" name="id-reserva-cabo" disabled id="id"/>
		<!-- -->
		<br>
		<!-- cabo hdmi -->
		<label for="cabo">Cabo HDMI:</label><br>
		<select name="select-cabo" required id="cabo">
			<option>Selecione um cabo HDMI:</option>
			<option value="CaboHDMI-1Metro">Cabo HDMI de 1 metro (única unidade)</option>
			<option value="CaboHDMI-4Metros">Cabo HDMI de 4 metros (única unidade)</option>
		</select>
		<!-- -->
		<br>
		<!-- data reserva cabo -->
		<label for="data">Data:</label><br>
		<input type="date" name="data-reserva-cabo" required id="data"/>
		<!-- -->
		<br>
		<!-- horário reserva cabo  -->
		<label for="horario">Horário:</label><br>
		<select name="select-horario-reserva-cabo" required id="horario">
			<option>Selecione um horário:</option>
			<option value="1-horario-mat-cabo">1º Hor. Mat. 7h20 ás 8h10</option>
			<option value="2-horario-mat-cabo">2º Hor. Mat. 8h10 ás 9h00</option>
			<option value="3-horario-mat-cabo">3º Hor. Mat. 9h00 ás 9h45</option>
			<option value="4-horario-mat-cabo">4º Hor. Mat. 10h05 ás 11h00</option>
			<option value="5-horario-mat-cabo">5º Hor. Mat. 11h00 ás 11h50</option>
			<option value="6-horario-mat-cabo">6º Hor. Mat. 11h50 ás 12h40</option>
			<option value="7-horario-mat-cabo">7º Hor. Mat. 12h40 ás 13h30</option>
			<option value="1-horario-ves-cabo">1º Hor. Ves. 13h30 ás 18h00</option>
			<option value="1-horario-not-cabo">1º Hor. Not. 18h30 ás 21h10</option>
			<option value="2-horario-not-cabo">2º Hor. Not. 21h10 ás 22h40</option>
		</select>
		<!-- -->
		<br>
		<!-- responsável pela reserva cabo -->
		<label for="resp-reserva">Responsável Reserva:</label><br>
		<input type="text" name="resp-reserva-cabo" required id="resp-reserva"/>
		<!-- -->
		<br>
		<!-- botão -->
		<input type="submit" value="Alterar" name="alterar-reserva-cabo"/>
		<!-- -->
	</form>
</div>

</body>
</html>