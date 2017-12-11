<?php
	include("ConexaoBD.php");
	include("desabilita_erros.php");

	if (isset($_POST['cadastrar-reserva-audi'])) {
		
		// 1 - Registro dos dados 
		if (!isset($_SESSION_CAD))
			session_start();

		foreach ($_POST as $chave=>$valor)
			$_SESSION_CAD[$chave] = $server_mysql->real_escape_string($valor);

		// 2 - Validação dos dados 
		if (strlen($_SESSION_CAD['data_reserva_audi']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Data\".');</script>";

		if (strlen($_SESSION_CAD['select_horario_reserva_audi']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Horário\".');</script>";

		if (strlen($_SESSION_CAD['respons_reserva_audi']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Responsável Reserva\".');</script>";




		//Verificar se registro já existe 
		$data_reserva_audi = date('y-m-d', strtotime(str_replace('/', '-', $_SESSION_CAD['data_reserva_audi'])));

		$horario_reserva_audi = $_SESSION_CAD['select_horario_reserva_audi'];

		$sql_code_select = "SELECT * FROM auditorioreserva WHERE DATA_RESERVA_AUDITORIO = '".$data_reserva_audi."' AND HORARIO_RESERVA_AUDITORIO = '".$horario_reserva_audi."'";

		$sql_query = mysqli_query($server_mysql,$sql_code_select);

		if (mysqli_fetch_array($sql_query, MYSQL_ASSOC) > 0) {
			
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Essa reserva já existe. Cadastro não efetuado!');window.location.href='Consultar_Auditorio.php';</script>";

		}




		// 3 - Inserção no banco 
		if (count($erro) == 0) {

			$sql_code = "INSERT INTO auditorioreserva (
		        DATA_RESERVA_AUDITORIO,
		        HORARIO_RESERVA_AUDITORIO,
		        RESPONS_RESERVA_AUDITORIO)
		        VALUES (
		        '".$data_reserva_audi."',
		        '".$_SESSION_CAD[select_horario_reserva_audi]."',
		        '".$_SESSION_CAD[respons_reserva_audi]."'
		        )";

		    $confirma = $server_mysql->query($sql_code) or die($server_mysql->error);

		    if ($confirma) {
		    	
		    	session_start();

		    	session_unset($_SESSION_CAD['data_reserva_audi'],
		              $_SESSION_CAD['select_horario_reserva_audi'],
		              $_SESSION_CAD['respons_reserva_audi']);

		    	echo "<script language='javascript' type='text/javascript'>alert('Cadastro efetuado com sucesso!');window.location.href='Consultar_Auditorio.php';</script>";

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
	<title>Cadastrar Reserva do Auditório</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Auditorio.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script>
		function VerificaData(data_reserva_audi) {

			var patternVerificaData = /^(((0[1-9]|[12][0-9]|3[01])([-.\/])(0[13578]|10|12)([-.\/])(\d{4}))|(([0][1-9]|[12][0-9]|30)([-.\/])(0[469]|11)([-.\/])(\d{4}))|((0[1-9]|1[0-9]|2[0-8])([-.\/])(02)([-.\/])(\d{4}))|((29)(\.|-|\/)(02)([-.\/])([02468][048]00))|((29)([-.\/])(02)([-.\/])([13579][26]00))|((29)([-.\/])(02)([-.\/])([0-9][0-9][0][48]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][2468][048]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][13579][26])))$/;

			if (!patternVerificaData.test(data_reserva_audi)) {
				alert("Data inválida!");
				form_reserva_auditorio.data_reserva_audi.value="";
				form_reserva_auditorio.data_reserva_audi.focus();
				return false;
			}

		}
	</script>
</head>
<body>
<h1 class="titulo-form">Cadastrar Reserva do Auditório</h1>

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="form-reserva-auditorio">
	<form accept-charset="utf-8" action="Cadastrar_Auditorio.php" method="POST" id="form_reserva_auditorio">
		<!-- id reserva auditório -->
		<label for="id">ID:</label><br>
		<input type="text" name="id_reserva_audi" disabled id="id"/>
		<!-- -->
		<br>
		<!-- data reserva auditorio -->
		<label for="data">Data:</label><br>
		<input type="text" name="data_reserva_audi" value="<?php session_start(); echo $_SESSION_CAD['data_reserva_audi']; ?>" placeholder="  /  /  " minlength="10" maxlength="10" required id="data" onBlur="VerificaData(this.value)">
		<!-- -->
		<br>
		<!-- horário reserva auditorio -->
		<label for="horario">Horário:</label><br>
		<select name="select_horario_reserva_audi" <?php session_start(); ?> required id="horario">
			<option value="">Selecione um horário:</option>

			<option value="1_horario_mat_audi" <?php if($_SESSION_CAD['select_horario_reserva_audi'] == "1_horario_mat_audi") echo "selected"; ?> >1º Hor. Mat. 7h20 ás 8h10</option>

			<option value="2_horario_mat_audi" <?php if($_SESSION_CAD['select_horario_reserva_audi'] == "2_horario_mat_audi") echo "selected"; ?> >2º Hor. Mat. 8h10 ás 9h00</option>

			<option value="3_horario_mat_audi" <?php if($_SESSION_CAD['select_horario_reserva_audi'] == "3_horario_mat_audi") echo "selected"; ?> >3º Hor. Mat. 9h00 ás 9h45</option>

			<option value="4_horario_mat_audi" <?php if($_SESSION_CAD['select_horario_reserva_audi'] == "4_horario_mat_audi") echo "selected"; ?> >4º Hor. Mat. 10h05 ás 11h00</option>

			<option value="5_horario_mat_audi" <?php if($_SESSION_CAD['select_horario_reserva_audi'] == "5_horario_mat_audi") echo "selected"; ?> >5º Hor. Mat. 11h00 ás 11h50</option>

			<option value="1_horario_ves_audi" <?php if($_SESSION_CAD['select_horario_reserva_audi'] == "1_horario_ves_audi") echo "selected"; ?> >1º Hor. Ves. 11h50 ás 14h00</option>

			<option value="2_horario_ves_audi" <?php if($_SESSION_CAD['select_horario_reserva_audi'] == "2_horario_ves_audi") echo "selected"; ?> >2º Hor. Ves. 14h00 ás 18h00</option>

			<option value="1_horario_not_audi" <?php if($_SESSION_CAD['select_horario_reserva_audi'] == "1_horario_not_audi") echo "selected"; ?> >1º Hor. Not. 18h30 ás 21h10</option>

			<option value="2_horario_not_audi" <?php if($_SESSION_CAD['select_horario_reserva_audi'] == "2_horario_not_audi") echo "selected"; ?> >2º Hor. Not. 21h10 ás 22h40</option>
		</select>
		<!-- -->
		<br>
		<!-- Responsável pela Reserva auditório -->
		<label for="resp-reserva">Responsável Reserva:</label><br>
		<input type="text" name="respons_reserva_audi" value="<?php session_start(); echo $_SESSION_CAD['respons_reserva_audi']; ?>" required id="resp-reserva"/>
		<!-- -->
		<br>
		<!-- Botão -->
		<input type="submit" value="Cadastrar" name="cadastrar-reserva-audi"/>
		<!-- -->
	</form>
</div>
</body>
</html>