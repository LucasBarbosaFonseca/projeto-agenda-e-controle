<?php
	include("ConexaoBD.php");
	include("desabilita_erros.php");

	if (isset($_POST['cadastrar-reserva-tela'])) {
		
		// 1 - Registro dos dados 
		if (!isset($_SESSION_CAD))
			session_start();

		foreach ($_POST as $chave=>$valor) 
			$_SESSION_CAD[$chave] = $server_mysql->real_escape_string($valor);

		// 2 - Validação dos dados 
		if(strlen($_SESSION_CAD['select_tela']) == 0)
		   $erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Tela\".');</script>";

		if(strlen($_SESSION_CAD['data_reserva_tela']) == 0)
		   $erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Data\".');</script>";
		   
		if(strlen($_SESSION_CAD['select_horario_reserva_tela']) == 0)
		   $erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Horário\".');</script>";	

		if(strlen($_SESSION_CAD['respons_reserva_tela']) == 0)
		   $erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Responsável Reserva\".');</script>";	


		
		//Verificar se registro já existe 
		$tela = $_SESSION_CAD['select_tela'];

		//Convertendo data para o formato yyyy-mm-dd que é a forma que o banco aceita 
		$data_res_tela = date('y-m-d', strtotime(str_replace('/', '-', $_SESSION_CAD['data_reserva_tela'])));

		$horario_res_tela = $_SESSION_CAD['select_horario_reserva_tela'];
		
		$sql_code_select = "SELECT * FROM telareserva WHERE TELA = '".$tela."' AND DATA_RESERVA_TELA = '".$data_res_tela."' AND HORARIO_RESERVA_TELA = '".$horario_res_tela."'";

		$sql_query = mysqli_query($server_mysql,$sql_code_select);

		if (mysqli_fetch_array($sql_query, MYSQL_ASSOC) > 0) {
			
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Essa reserva já existe. Cadastro não efetuado!');window.location.href='Consultar_Tela.php';</script>";

		}       




		// 3 - Inserção no banco 
		if (count($erro) == 0) {
			
			$sql_code = "INSERT INTO telareserva (
		        TELA,
		    	DATA_RESERVA_TELA,
		    	HORARIO_RESERVA_TELA,
		    	RESPONS_RESERVA_TELA)
		    	VALUES (
		    	'".$_SESSION_CAD[select_tela]."',
		    	'".$data_res_tela."',
		    	'".$_SESSION_CAD[select_horario_reserva_tela]."',
		    	'".$_SESSION_CAD[respons_reserva_tela]."'
		    	)";

		    $confirma = $server_mysql->query($sql_code) or die($server_mysql->error);

		    if ($confirma) {
		    	
		    	session_start();

		    	session_unset($_SESSION_CAD['select_tela'],
		    	       $_SESSION_CAD['data_reserva_tela'],
		    	   	   $_SESSION_CAD['select_horario_reserva_tela'],
		    	   	   $_SESSION_CAD['respons_reserva_tela']);

		    	echo "<script language='javascript' type='text/javascript'>alert('Cadastro efetuado com sucesso!');window.location.href='Consultar_Tela.php';</script>";

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
	<title>Cadastrar Reserva da Tela p/ Datashow e Retroprojetor</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Tela.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script>
		function VerificaData(data_reserva_tela) {

			var patternVerificaData = /^(((0[1-9]|[12][0-9]|3[01])([-.\/])(0[13578]|10|12)([-.\/])(\d{4}))|(([0][1-9]|[12][0-9]|30)([-.\/])(0[469]|11)([-.\/])(\d{4}))|((0[1-9]|1[0-9]|2[0-8])([-.\/])(02)([-.\/])(\d{4}))|((29)(\.|-|\/)(02)([-.\/])([02468][048]00))|((29)([-.\/])(02)([-.\/])([13579][26]00))|((29)([-.\/])(02)([-.\/])([0-9][0-9][0][48]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][2468][048]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][13579][26])))$/;

			if (!patternVerificaData.test(data_reserva_tela)) {
				alert("Data inválida!");
				form_reserva_tela.data_reserva_tela.value="";
				form_reserva_tela.data_reserva_tela.focus();
				return false;
			}

		}
	</script>
</head>
<body>

<h1 class="titulo-form">Cadastrar Reserva da Tela p/ Datashow e Retroprojetor</h1>

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="form-reserva-tela">
	<form accept-charset="utf-8" action="Cadastrar_Tela.php" method="POST" id="form_reserva_tela">
		<!-- id reserva tela -->
		<label for="id">ID:</label><br>
		<input type="text" name="id_reserva_tela" disabled id="id"/>
		<!-- -->
		<br>
		<!-- tela -->
		<label for="tela">Tela:</label><br>
		<select name="select_tela" <?php session_start(); ?> required id="tela">
			<option value="">Selecione uma tela:</option>

			<option value="Tela_com_tripe_uni1" <?php if($_SESSION_CAD['select_tela'] == "Tela_com_tripe_uni1") echo "selected"; ?> >Tela com tripé (unidade 1)</option>

			<option value="Tela_com_tripe_uni2" <?php if($_SESSION_CAD['select_tela'] == "Tela_com_tripe_uni2") echo "selected"; ?> >Tela com tripé (unidade 2)</option>

			<option value="Tela_sem_tripe_uni1" <?php if($_SESSION_CAD['select_tela'] == "Tela_sem_tripe_uni1") echo "selected"; ?> >Tela sem tripé (unidade 1)</option>

			<option value="Tela_sem_tripe_uni2" <?php if($_SESSION_CAD['select_tela'] == "Tela_sem_tripe_uni2") echo "selected"; ?> >Tela sem tripé (unidade 2)</option>
		</select>
		<!-- -->
		<br>
		<!-- data reserva tela -->
		<label for="data">Data:</label><br>
		<input type="text" name="data_reserva_tela" value="<?php session_start(); echo $_SESSION_CAD['data_reserva_tela']; ?>" placeholder="  /  /  " minlength="10" maxlength="10" required id="data" onBlur="VerificaData(this.value)"/>
		<!-- -->
		<br>
		<!-- horário reserva tela -->
		<label for="horario">Horário:</label><br>
		<select name="select_horario_reserva_tela" <?php session_start(); ?> required id="horario">
			<option value="">Selecione um horário:</option>

			<option value="1_horario_mat_tela" <?php if($_SESSION_CAD['select_horario_reserva_tela'] == "1_horario_mat_tela") echo "selected"; ?> >1º Hor. Mat. 7h20 ás 8h10</option>

			<option value="2_horario_mat_tela" <?php if($_SESSION_CAD['select_horario_reserva_tela'] == "2_horario_mat_tela") echo "selected"; ?> >2º Hor. Mat. 8h10 ás 9h00</option>

			<option value="3_horario_mat_tela" <?php if($_SESSION_CAD['select_horario_reserva_tela'] == "3_horario_mat_tela") echo "selected"; ?> >3º Hor. Mat. 9h00 ás 9h45</option>

			<option value="4_horario_mat_tela" <?php if($_SESSION_CAD['select_horario_reserva_tela'] == "4_horario_mat_tela") echo "selected"; ?> >4º Hor. Mat. 10h05 ás 11h00</option>

			<option value="5_horario_mat_tela" <?php if($_SESSION_CAD['select_horario_reserva_tela'] == "5_horario_mat_tela") echo "selected"; ?> >5º Hor. Mat. 11h00 ás 11h50</option>

			<option value="6_horario_mat_tela" <?php if($_SESSION_CAD['select_horario_reserva_tela'] == "6_horario_mat_tela") echo "selected"; ?> >6º Hor. Mat. 11h50 ás 12h40</option>

			<option value="7_horario_mat_tela" <?php if($_SESSION_CAD['select_horario_reserva_tela'] == "7_horario_mat_tela") echo "selected"; ?> >7º Hor. Mat. 12h40 ás 13h30</option>

			<option value="1_horario_ves_tela" <?php if($_SESSION_CAD['select_horario_reserva_tela'] == "1_horario_ves_tela") echo "selected"; ?> >1º Hor. Ves. 13h30 ás 18h00</option>

			<option value="1_horario_not_tela" <?php if($_SESSION_CAD['select_horario_reserva_tela'] == "1_horario_not_tela") echo "selected"; ?> >1º Hor. Not. 18h30 ás 21h10</option>

			<option value="2_horario_not_tela" <?php if($_SESSION_CAD['select_horario_reserva_tela'] == "2_horario_not_tela") echo "selected"; ?> >2º Hor. Not. 21h10 ás 22h40</option>
		</select>
		<!-- -->
		<br>
		<!-- responsável pela reserva tela -->
		<label for="resp-reserva">Responsável Reserva:</label><br>
		<input type="text" name="respons_reserva_tela" value="<?php session_start(); echo $_SESSION_CAD['respons_reserva_tela']; ?>" required id="resp-reserva"/>
		<!-- -->
		<br>
		<!-- botão -->
		<input type="submit" value="Cadastrar" name="cadastrar-reserva-tela"/>
		<!-- -->
	</form>
</div>

</body>
</html>