<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Alterar Reserva do Notebook</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Notebook.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<h1 class="titulo-form">Alterar Reserva do Notebook</h1>

<div class="form-reserva-notebook">
	<form>
		<!-- id reserva notebook -->
		<label for="id">ID:</label><br>
		<input type="text" name="id-reserva-notebook" disabled id="id"/>
		<!-- -->
		<br>
		<!-- notebook -->
		<label for="notebook">Notebook:</label><br>
		<select name="select-notebook" required id="notebook">
			<option>Selecione um notebook:</option>
			<option value="Notebook-PCMIX-uni1">Notebook PCMIX (unidade 1) (uso no lab redes)</option>
			<option value="Notebook-PCMIX-uni2">Notebook PCMIX (unidade 2) (uso no lab redes)</option>
			<option value="Notebook-PCMIX-uni3">Notebook PCMIX (unidade 3) (uso no lab redes)</option>
			<option value="Notebook-PCMIX-uni4">Notebook PCMIX (unidade 4) (uso no lab redes)</option>
			<option value="Notebook-PCMIX-uni5">Notebook PCMIX (unidade 5) (uso no lab redes)</option>
			<option value="Notebook-Positivo-uni1">Notebook Positivo (unidade 1) (uso nas salas com datashow fixo)</option>
			<option value="Notebook-Positivo-uni2">Notebook Positivo (unidade 2) (uso nas salas com datashow fixo)</option>
			<option value="Notebook-Positivo-uni3">Notebook Positivo (unidade 3) (uso nas salas com datashow fixo)</option>
		</select>
		<!-- -->
		<br>
		<!-- data reserva notebook -->
		<label for="data">Data:</label><br>
		<input type="date" name="data-reserva-notebook" required id="data"/>
		<!-- -->
		<br>
		<!-- horário reserva notebook  -->
		<label for="horario">Horário:</label><br>
		<select name="select-horario-reserva-notebook" required id="horario">
			<option>Selecione um horário:</option>
			<option value="1-horario-mat-notebook">1º Hor. Mat. 7h20 ás 8h10</option>
			<option value="2-horario-mat-notebook">2º Hor. Mat. 8h10 ás 9h00</option>
			<option value="3-horario-mat-notebook">3º Hor. Mat. 9h00 ás 9h45</option>
			<option value="4-horario-mat-notebook">4º Hor. Mat. 10h05 ás 11h00</option>
			<option value="5-horario-mat-notebook">5º Hor. Mat. 11h00 ás 11h50</option>
			<option value="6-horario-mat-notebook">6º Hor. Mat. 11h50 ás 12h40</option>
			<option value="7-horario-mat-notebook">7º Hor. Mat. 12h40 ás 13h30</option>
			<option value="1-horario-ves-notebook">1º Hor. Ves. 13h30 ás 18h00</option>
			<option value="1-horario-not-notebook">1º Hor. Not. 18h30 ás 21h10</option>
			<option value="2-horario-not-notebook">2º Hor. Not. 21h10 ás 22h40</option>
		</select>
		<!-- -->
		<br>
		<!-- responsável pela reserva notebook -->
		<label for="resp-reserva">Responsável Reserva:</label><br>
		<input type="text" name="resp-reserva-notebook" required id="resp-reserva"/>
		<!-- -->
		<br>
		<!-- botão -->
		<input type="submit" value="Alterar" name="alterar-reserva-notebook"/>
		<!-- -->
	</form>
</div>

</body>
</html>