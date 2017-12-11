<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Alterar Reserva da Tela p/ Datashow e Retroprojetor</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Tela.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<h1 class="titulo-form">Alterar Reserva da Tela p/ Datashow e Retroprojetor</h1>

<div class="form-reserva-tela">
	<form>
		<!-- id reserva tela -->
		<label for="id">ID:</label><br>
		<input type="text" name="id-reserva-tela" disabled id="id"/>
		<!-- -->
		<br>
		<!-- tela -->
		<label for="tela">Tela:</label><br>
		<select name="select-tela" required id="tela">
			<option>Selecione uma tela:</option>
			<option value="Tela-com-tripe-uni1">Tela com tripé (unidade 1)</option>
			<option value="Tela-com-tripe-uni2">Tela com tripé (unidade 2)</option>
			<option value="Tela-sem-tripe-uni1">Tela sem tripé (unidade 1)</option>
			<option value="Tela-sem-tripe-uni2">Tela sem tripé (unidade 2)</option>
		</select>
		<!-- -->
		<br>
		<!-- data reserva tela -->
		<label for="data">Data:</label><br>
		<input type="date" name="data-reserva-tela" required id="data"/>
		<!-- -->
		<br>
		<!-- horário reserva tela -->
		<label for="horario">Horário:</label><br>
		<select name="select-horario-reserva-tela" required id="horario">
			<option>Selecione um horário:</option>
			<option value="1-horario-mat-tela">1º Hor. Mat. 7h20 ás 8h10</option>
			<option value="2-horario-mat-tela">2º Hor. Mat. 8h10 ás 9h00</option>
			<option value="3-horario-mat-tela">3º Hor. Mat. 9h00 ás 9h45</option>
			<option value="4-horario-mat-tela">4º Hor. Mat. 10h05 ás 11h00</option>
			<option value="5-horario-mat-tela">5º Hor. Mat. 11h00 ás 11h50</option>
			<option value="6-horario-mat-tela">6º Hor. Mat. 11h50 ás 12h40</option>
			<option value="7-horario-mat-tela">7º Hor. Mat. 12h40 ás 13h30</option>
			<option value="1-horario-ves-tela">1º Hor. Ves. 13h30 ás 18h00</option>
			<option value="1-horario-not-tela">1º Hor. Not. 18h30 ás 21h10</option>
			<option value="2-horario-not-tela">2º Hor. Not. 21h10 ás 22h40</option>
		</select>
		<!-- -->
		<br>
		<!-- responsável pela reserva tela -->
		<label for="resp-reserva">Responsável Reserva:</label><br>
		<input type="text" name="resp-reserva-tela" required id="resp-reserva"/>
		<!-- -->
		<br>
		<!-- botão -->
		<input type="submit" value="Alterar" name="alterar-reserva-tela"/>
		<!-- -->
	</form>
</div>

</body>
</html>