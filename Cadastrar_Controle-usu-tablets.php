<?php
	include("ConexaoBD.php");
	include("desabilita_erros.php");

	if (isset($_POST['cadastrar-controle-usu-tablets'])) {
		
		// 1 - Registro dos dados
		if (!isset($_SESSION_CAD))
			session_start();

		foreach ($_POST as $chave=>$valor)
			$_SESSION_CAD[$chave] = $server_mysql->real_escape_string($valor);

		// 2 - Validação dos dados 
		if (strlen($_SESSION_CAD['num_tablet']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Tablet\".');</script>";

		if (strlen($_SESSION_CAD['nome_usuario']) == 0) 
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Nome do Usuário\".');</script>";
		
		if (strlen($_SESSION_CAD['select_turma']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Turma\".');</script>";



		//Verificar se registro já existe 
		$num_tablet = $_SESSION_CAD['num_tablet'];

		$nome_usuario = $_SESSION_CAD['nome_usuario'];

		$turma = $_SESSION_CAD['select_turma'];

		$sql_code_select = "SELECT * FROM cadastro_controle_tablet WHERE NUM_TABLET = '".$num_tablet."' AND NOME_USUARIO = '".$nome_usuario."' AND TURMA = '".$turma."'";

		$sql_query = mysqli_query($server_mysql,$sql_code_select);

		if (mysqli_fetch_array($sql_query, MYSQL_ASSOC) > 0) {
			
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Essa reserva já existe. Cadastro não efetuada!');window.location.href='Consultar_Controle-usu-tablets.php';</script>";

		}




		// 3 - Inserção no banco 
		if (count($erro) == 0) {

			$sql_code = "INSERT INTO cadastro_controle_tablet (
		        NUM_TABLET,
		    	NOME_USUARIO,
		        TURMA)
		        VALUES (
		        '".$_SESSION_CAD[num_tablet]."',
		        '".$_SESSION_CAD[nome_usuario]."',
		        '".$_SESSION_CAD[select_turma]."'
		        )";

		    $confirma = $server_mysql->query($sql_code) or die($server_mysql->error);

		    if ($confirma) {

		    	session_start();

		    	session_unset($_SESSION_CAD['num_tablet'],
		    		  $_SESSION_CAD['nome_usuario'],
		    		  $_SESSION_CAD['select_turma']);

		    	echo "<script language='javascript' type='text/javascript'>alert('Cadastro efetuado com sucesso!');window.location.href='Consultar_Controle-usu-tablets.php';</script>";

		    } else {

		    	$erro[] = $confirma;

		    }

		}

	}

	if (count($erro) > 0) {
		
		foreach ($erro as $valor)
			echo "$valor";

	}

?>

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

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="form-controle-usu-tablets">
	<form accept-charset="utf-8" action="Cadastrar_Controle-usu-tablets.php" method="POST">
	    <!-- id controle usuario tablets -->
		<label for="id">ID:</label><br>
		<input type="text" name="id_controle_usu_tablets" disabled id="id"/>
		<!-- -->
		<br>
		<!-- tablet -->
		<label for="num-tablet">Número do Tablet:</label><br>
		<input type="text" name="num_tablet" value="<?php session_start(); echo $_SESSION_CAD['num_tablet']; ?>" required id="num-tablet"/>
		<!-- -->
		<br>
		<!-- nome do usuário -->
		<label for="nome-usuario">Nome do Usuário:</label><br>
		<input type="text" name="nome_usuario" value="<?php session_start(); echo $_SESSION_CAD['nome_usuario']; ?>" required id="nome-usuario"/>
		<!-- -->
		<br>
		<!-- turma -->
		<label for="turma">Turma:</label><br>
		<select name="select_turma" <?php session_start(); ?> required id="turma">
			<option value="">Selecione uma turma:</option>

			<option value="fundamental_1" <?php if($_SESSION_CAD['select_turma'] == "fundamental_1") echo "selected"; ?> >Fundamental I</option>

			<option value="fundamental_2" <?php if($_SESSION_CAD['select_turma'] == "fundamental_2") echo "selected"; ?> >Fundamental II</option>

			<option value="fundamental1_2" <?php if($_SESSION_CAD['select_turma'] == "fundamental1_2") echo "selected"; ?> >Fundamental I e II</option>
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