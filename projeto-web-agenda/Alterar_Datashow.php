<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Alterar Reserva do Datashow</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Datashow.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<h1 class="titulo-form">Alterar Reserva do Datashow</h1>

<div class="form-reserva-datashow">
	<form>
		<!-- id reserva datashow -->
		<label for="id">ID:</label><br>
		<input type="text" name="id-reserva-datashow" disabled id="id"/>
		<!-- -->
		<br>
		<!-- datashow -->
		<label for="datashow">Datashow:</label><br>
		<select name="select-datashow" required id="datashow">
			<option>Selecione um datashow:</option>
			<option value="Datashow-Sony-pl-ex100">Datashow Sony PL-EX100 (única unidade)</option>
			<option value="Datashow-Betec-bt720-uni1">Datashow Betec BT720 (unidade 1)</option>
			<option value="Datashow-Betec-bt720-uni2">Datashow Betec BT720 (unidade 2)</option>
			<option value="Datashow-Epson-h328a">Datashow Epson H328A (única unidade)</option>
			<option value="Datashow-Epson-h283a">Datashow Epson H283A (única unidade) (em manutenção)</option>
			<option value="Datashow-Benq-mp515">Datashow Benq MP515 (única unidade) (em manutenção)</option>
		</select>
		<!-- -->
		<br>
		<!-- data reserva datashow -->
		<label for="data">Data:</label><br>
		<input type="date" name="data-reserva-datashow" required id="data"/>
		<!-- -->
		<br>
		<!-- horário reserva datashow -->
		<label for="horario">Horário:</label><br>
		<select name="select-horario-reserva-datashow" required id="horario">
			<option>Selecione um horário:</option>
			<option value="1-horario-mat-datashow">1º Hor. Mat. 7h20 ás 8h10</option>
			<option value="2-horario-mat-datashow">2º Hor. Mat. 8h10 ás 9h00</option>
			<option value="3-horario-mat-datashow">3º Hor. Mat. 9h00 ás 9h45</option>
			<option value="4-horario-mat-datashow">4º Hor. Mat. 10h05 ás 11h00</option>
			<option value="5-horario-mat-datashow">5º Hor. Mat. 11h00 ás 11h50</option>
			<option value="6-horario-mat-datashow">6º Hor. Mat. 11h50 ás 12h40</option>
			<option value="7-horario-mat-datashow">7º Hor. Mat. 12h40 ás 13h30</option>
			<option value="1-horario-ves-datashow">1º Hor. Ves. 13h30 ás 18h00</option>
			<option value="1-horario-not-datashow">1º Hor. Not. 18h30 ás 21h10</option>
			<option value="2-horario-not-datashow">2º Hor. Not. 21h10 ás 22h40</option>
		</select>
		<!-- -->
		<br>
		<!-- responsável pela reserva datashow -->
		<label for="resp-reserva">Responsável Reserva:</label><br>
		<input type="text" name="resp-reserva-datashow" required id="resp-reserva"/>
		<!-- -->
		<br>
		<!-- botão -->
		<input type="submit" value="Alterar" name="alterar-reserva-datashow"/>
		<!-- -->
	</form>
</div>

</body>
</html>