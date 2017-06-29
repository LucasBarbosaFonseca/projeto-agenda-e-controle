<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastrar Reserva do Microfone</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Microfone.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<h1 class="titulo-form">Cadastrar Reserva do Microfone</h1>

<div class="form-reserva-microfone">
	<form>
		<!-- id reserva microfone -->
		<label for="id">ID:</label><br>
		<input type="text" name="id-reserva-microfone" disabled id="id"/>
		<!-- -->
		<br>
		<!-- microfone -->
		<label for="microfone">Microfone:</label><br>
		<select name="select-microfone" required id="microfone">
			<option>Selecione um microfone:</option>
			<option value="Microfone-Leson-LS58-fio">Microfone Leson LS58 (com fio 5 metros) (única unidade)</option>
			<option value="Microfone-UH-02MM-semFio-uni1">Microfone Lyco UH-02MM (sem fio) (unidade 1)</option>
			<option value="Microfone-UH-02MM-semFio-uni2">Microfone Lyco UH-02MM (sem fio) (unidade 2)</option>
		</select>
		<!-- -->
		<br>
		<!-- data reserva microfone -->
		<label for="data">Data:</label><br>
		<input type="date" name="data-reserva-microfone" required id="data"/>
		<!-- -->
		<br>
		<!-- horário reserva microfone -->
		<label for="horario">Horário:</label><br>
		<select name="select-horario-reserva-microfone" required id="horario">
			<option>Selecione um horário:</option>
			<option value="1-horario-mat-microfone">1º Hor. Mat. 7h20 ás 8h10</option>
			<option value="2-horario-mat-microfone">2º Hor. Mat. 8h10 ás 9h00</option>
			<option value="3-horario-mat-microfone">3º Hor. Mat. 9h00 ás 9h45</option>
			<option value="4-horario-mat-microfone">4º Hor. Mat. 10h05 ás 11h00</option>
			<option value="5-horario-mat-microfone">5º Hor. Mat. 11h00 ás 11h50</option>
			<option value="6-horario-mat-microfone">6º Hor. Mat. 11h50 ás 12h40</option>
			<option value="7-horario-mat-microfone">7º Hor. Mat. 12h40 ás 13h30</option>
			<option value="1-horario-ves-microfone">1º Hor. Ves. 13h30 ás 18h00</option>
			<option value="1-horario-not-microfone">1º Hor. Not. 18h30 ás 21h10</option>
			<option value="2-horario-not-microfone">2º Hor. Not. 21h10 ás 22h40</option>
		</select>
		<!-- -->
		<br>
		<!-- responsável pela reserva microfone -->
		<label for="resp-reserva">Responsável Reserva:</label><br>
		<input type="text" name="resp-reserva-microfone" required id="resp-reserva"/>
		<!-- -->
		<br>
		<!-- botão -->
		<input type="submit" value="Cadastrar" name="cadastrar-reserva-microfone"/>
		<!-- -->
	</form>
</div>

</body>
</html>