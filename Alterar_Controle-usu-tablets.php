<?php
	include("ConexaoBD.php");
	include("desabilita_erros.php");



	if (!isset($_GET['id_controle'])) {
		
		echo "<script language='javascript' type='text/javascript'>alert('Código inválido!');window.location.href='menu.php';</script>";

	} else {

	$id = intval($_GET['id_controle']);

	if (isset($_POST['alterar-controle-usu-tablets'])) {
		
		// 1 - Registro dos dados
		if (!isset($_SESSION))
			session_start();

		foreach ($_POST as $chave=>$valor)
			$_SESSION[$chave] = $server_mysql->real_escape_string($valor);

		// 2 - Validação dos dados 
		if (strlen($_SESSION['num_tablet']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Tablet\".');</script>";

		if (strlen($_SESSION['nome_usuario']) == 0) 
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Nome do Usuário\".');</script>";
		
		if (strlen($_SESSION['select_turma']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Turma\".');</script>";



		//Verificar se registro já existe 
		$num_tablet = $_SESSION['num_tablet'];

		$nome_usuario = $_SESSION['nome_usuario'];

		$turma = $_SESSION['select_turma'];

		$sql_code_select = "SELECT * FROM cadastro_controle_tablet WHERE NUM_TABLET = '".$num_tablet."' AND NOME_USUARIO = '".$nome_usuario."' AND TURMA = '".$turma."'";

		$sql_query = mysqli_query($server_mysql,$sql_code_select);

		if (mysqli_fetch_array($sql_query, MYSQL_ASSOC) > 0) {
			
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Essa reserva já existe. Alteração não efetuada!');window.location.href='Consultar_Controle-usu-tablets.php';</script>";

		}



		// 3 - Inserção no banco 
		if (count($erro) == 0) {

			$sql_code = "UPDATE cadastro_controle_tablet SET
		        NUM_TABLET = '".$_SESSION[num_tablet]."',
		    	NOME_USUARIO = '".$_SESSION[nome_usuario]."',
		        TURMA = '".$_SESSION[select_turma]."'
		        WHERE ID_CONTROLE = '".$id."'";

		    $confirma = $server_mysql->query($sql_code) or die($server_mysql->error);

		    if ($confirma) {

		    	session_start();

		    	session_unset($_SESSION['id_controle_usu_tablets'],		    		   
		    		   $_SESSION['num_tablet'],
		    		   $_SESSION['nome_usuario'],
		    		   $_SESSION['select_turma']);

		    	echo "<script language='javascript' type='text/javascript'>alert('Alteração efetuada com sucesso!');window.location.href='Consultar_Controle-usu-tablets.php';</script>";

		    } else {

		    	$erro[] = $confirma;

		    }

		}

	} else {

		$sql_code = "SELECT * FROM cadastro_controle_tablet WHERE ID_CONTROLE = '".$id."' ";

		$sql_query = $server_mysql->query($sql_code) or die($server_mysql->error);

		$linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC);

		if (!isset($_SESSION))
			session_start();

		$_SESSION['id_controle_usu_tablets'] = $linha['ID_CONTROLE'];
		$_SESSION['num_tablet'] = $linha['NUM_TABLET'];
		$_SESSION['nome_usuario'] = $linha['NOME_USUARIO'];
		$_SESSION['select_turma'] = $linha['TURMA'];


	}


	if (count($erro) > 0) {
		
		foreach ($erro as $valor)
			echo "$valor";

	}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Alterar - Controle de Usuários de Tablets</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Controle-usu-tablets.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<h1 class="titulo-form">Alterar - Controle de Usuários de Tablets</h1>

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="form-controle-usu-tablets">
	<form accept-charset="utf-8" action="Alterar_Controle-usu-tablets.php?id_controle=<?php echo $id; ?>" method="POST">
	    <!-- id controle usuario tablets -->
		<label for="id">ID:</label><br>
		<input type="text" name="id_controle_usu_tablets" value="<?php session_start(); echo $_SESSION['id_controle_usu_tablets']; ?>" disabled id="id"/>
		<!-- -->
		<br>
		<!-- tablet -->
		<label for="num-tablet">Número do Tablet:</label><br>
		<input type="text" name="num_tablet" value="<?php session_start(); echo $_SESSION['num_tablet']; ?>"  id="num-tablet"/>
		<!-- -->
		<br>
		<!-- nome do usuário -->
		<label for="nome-usuario">Nome do Usuário:</label><br>
		<input type="text" name="nome_usuario" value="<?php session_start(); echo $_SESSION['nome_usuario']; ?>"  id="nome-usuario"/>
		<!-- -->
		<br>
		<!-- turma -->
		<label for="turma">Turma:</label><br>
		<select name="select_turma" <?php session_start(); ?>  id="turma">
			<option value="">Selecione uma turma:</option>

			<option value="fundamental_1" <?php if($_SESSION['select_turma'] == "fundamental_1") echo "selected"; ?> >Fundamental I</option>

			<option value="fundamental_2" <?php if($_SESSION['select_turma'] == "fundamental_2") echo "selected"; ?> >Fundamental II</option>

			<option value="fundamental1_2" <?php if($_SESSION['select_turma'] == "fundamental1_2") echo "selected"; ?> >Fundamental I e II</option>
		</select>
		<!-- -->
		<br>
		<!-- botão -->
		<input type="submit" value="Alterar" name="alterar-controle-usu-tablets"/>
		<!-- -->
	</form>
</div>

<?php } ?>

</body>
</html>