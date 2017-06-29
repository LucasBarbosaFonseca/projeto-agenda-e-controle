<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastrar - Controle de Usuários de Tablets</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Controle-usu-tablets.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<h1 class="titulo-form">Cadastrar - Controle de Usuários de Tablets</h1>

<div class="form-controle-usu-tablets">
	<form>
	    <!-- id controle usuario tablets -->
		<label for="id">ID:</label><br>
		<input type="text" name="id-controle-usu-tablets" disabled id="id"/>
		<!-- -->
		<br>
		<!-- tablet -->
		<label for="num-tablet">Número do Tablet:</label><br>
		<input type="text" name="num-tablet" required id="num-tablet"/>
		<!-- -->
		<br>
		<!-- nome do usuário -->
		<label for="nome-usuario">Nome do Usuário:</label><br>
		<input type="text" name="nome-usuario" required id="nome-usuario"/>
		<!-- -->
		<br>
		<!-- turma -->
		<label for="turma">Turma:</label><br>
		<select name="select-turma" required id="turma">
			<option>Selecione uma turma:</option>
			<option value="fundamental-1">Fundamental I</option>
			<option value="fundamental-2">Fundamental II</option>
			<option value="fundamental-1e2">Fundamental I e II</option>
		</select>
		<!-- -->
		<br>
		<!-- botão -->
		<input type="submit" value="Cadastrar" name="cadastrar-controle-usu-tablets"/>
		<!-- -->
	</form>
</div>

</body>
</html>