<?php
	include("ConexaoBD.php");
	include("desabilita_erros.php");

	if (isset($_POST['cadastrar-reserva-datashow'])) {
		
		// 1 - Registro dos dados 
		if (!isset($_SESSION_CAD)) 
			session_start();

		foreach ($_POST as $chave=>$valor) 
			$_SESSION_CAD[$chave] = $server_mysql->real_escape_string($valor);

		// 2 - Validação dos dados 
		if (strlen($_SESSION_CAD['select_datashow']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Datashow\".');</script>"; 

		if (strlen($_SESSION_CAD['data_reserva_datashow']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Data\".');</script>";

		if (strlen($_SESSION_CAD['select_horario_reserva_datashow']) == 0) 
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Horário\".');</script>";

		if (strlen($_SESSION_CAD['resp_reserva_datashow']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Responsável Reserva\".');</script>";



		//Verificar se registro já existe
		$datashow = $_SESSION_CAD['select_datashow'];

		//Convertendo data para o formato yyyy-mm-dd que é a forma que o banco aceita 
		$data_reserva_datashow = date('y-m-d', strtotime(str_replace('/', '-', $_SESSION_CAD['data_reserva_datashow'])));

		$horario_reserva_datashow = $_SESSION_CAD['select_horario_reserva_datashow'];

		$sql_code_select = "SELECT * FROM datashowreserva WHERE DATASHOW = '".$datashow."' AND DATA_RESERVA = '".$data_reserva_datashow."' AND HORARIO_RESERVA = '".$horario_reserva_datashow."'";

		$sql_query = mysqli_query($server_mysql,$sql_code_select);

		if (mysqli_fetch_array($sql_query, MYSQL_ASSOC) > 0) {

			$erro[] = "<script language='javascript' type='text/javascript'>alert('Essa reserva já existe. Cadastro não efetuado!');window.location.href='Consultar_Datashow.php';</script>";
		}




		// 3 - Inserção no banco 
		if (count($erro) == 0) {
			
			$sql_code = "INSERT INTO datashowreserva (
				DATASHOW,
				DATA_RESERVA,
				HORARIO_RESERVA,
				RESPONS_RESERVA)
				VALUES (
				'".$_SESSION_CAD[select_datashow]."',
				'".$data_reserva_datashow."',
				'".$_SESSION_CAD[select_horario_reserva_datashow]."',
				'".$_SESSION_CAD[resp_reserva_datashow]."'
				)";

			$confirma = $server_mysql->query($sql_code) or die($server_mysql->error);

			if ($confirma) {

				session_start();

				session_unset($_SESSION_CAD['select_datashow'],
					  $_SESSION_CAD['data_reserva_datashow'],
					  $_SESSION_CAD['select_horario_reserva_datashow'],
					  $_SESSION_CAD['resp_reserva_datashow']);

				echo "<script language='javascript' type='text/javascript'>alert('Cadastro efetuado com sucesso!');window.location.href='Consultar_Datashow.php';</script>";

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
	<title>Cadastrar Reserva do Datashow</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Datashow.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script>
		function VerificaData(data_reserva_datashow) {

			var patternVerificaData = /^(((0[1-9]|[12][0-9]|3[01])([-.\/])(0[13578]|10|12)([-.\/])(\d{4}))|(([0][1-9]|[12][0-9]|30)([-.\/])(0[469]|11)([-.\/])(\d{4}))|((0[1-9]|1[0-9]|2[0-8])([-.\/])(02)([-.\/])(\d{4}))|((29)(\.|-|\/)(02)([-.\/])([02468][048]00))|((29)([-.\/])(02)([-.\/])([13579][26]00))|((29)([-.\/])(02)([-.\/])([0-9][0-9][0][48]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][2468][048]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][13579][26])))$/;

			if (!patternVerificaData.test(data_reserva_datashow)) {
				alert("Data inválida!");
				form_reserva_datashow.data_reserva_datashow.value="";
				form_reserva_datashow.data_reserva_datashow.focus();
				return false;
			}
			
		}
	</script>
</head>
<body>

<h1 class="titulo-form">Cadastrar Reserva do Datashow</h1>

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="form-reserva-datashow">
	<form accept-charset="utf-8" action="Cadastrar_Datashow.php" method="POST" id="form_reserva_datashow">
		<!-- id reserva datashow -->
		<label for="id">ID:</label><br>
		<input type="text" name="id_reserva_datashow" disabled id="id"/>
		<!-- -->
		<br>
		<!-- datashow -->
		<label for="datashow">Datashow:</label><br>
		<select name="select_datashow" <?php session_start(); ?> required id="datashow">
			<option value="">Selecione um datashow:</option>

			<option value="Datashow_Sony_pl_ex100" <?php if($_SESSION_CAD['select_datashow'] == "Datashow_Sony_pl_ex100") echo "selected"; ?> >Datashow Sony PL-EX100 (única unidade)</option>

			<option value="Datashow_Betec_bt720_uni1" <?php if($_SESSION_CAD['select_datashow'] == "Datashow_Betec_bt720_uni1") echo "selected"; ?> >Datashow Betec BT720 (unidade 1)</option>

			<option value="Datashow_Betec_bt720_uni2" <?php if($_SESSION_CAD['select_datashow'] == "Datashow_Betec_bt720_uni2") echo "selected"; ?> >Datashow Betec BT720 (unidade 2)</option>

			<option value="Datashow_Epson_h328a" <?php if($_SESSION_CAD['select_datashow'] == "Datashow_Epson_h328a") echo "selected"; ?> >Datashow Epson H328A (única unidade)</option>

			<option value="Datashow_Epson_h283a" <?php if($_SESSION_CAD['select_datashow'] == "Datashow_Epson_h283a") echo "selected"; ?> >Datashow Epson H283A (única unidade) (em manutenção)</option>

			<option value="Datashow_Benq_mp515" <?php if($_SESSION_CAD['select_datashow'] == "Datashow_Benq_mp515") echo "selected"; ?> >Datashow Benq MP515 (única unidade) (em manutenção)</option>
		</select>
		<!-- -->
		<br>
		<!-- data reserva datashow -->
		<label for="data">Data:</label><br>
		<input type="text" name="data_reserva_datashow" value="<?php session_start(); echo $_SESSION_CAD['data_reserva_datashow']; ?>" placeholder="  /  /  " minlength="10" maxlength="10" required id="data" onBlur="VerificaData(this.value)"/>
		<!-- -->
		<br>
		<!-- horário reserva datashow -->
		<label for="horario">Horário:</label><br>
		<select name="select_horario_reserva_datashow" <?php session_start(); ?> required id="horario">
			<option value="">Selecione um horário:</option>

			<option value="1_horario_mat_datashow" <?php if($_SESSION_CAD['select_horario_reserva_datashow'] == "1_horario_mat_datashow") echo "selected"; ?> >1º Hor. Mat. 7h20 ás 8h10</option>

			<option value="2_horario_mat_datashow" <?php if($_SESSION_CAD['select_horario_reserva_datashow'] == "2_horario_mat_datashow") echo "selected"; ?> >2º Hor. Mat. 8h10 ás 9h00</option>

			<option value="3_horario_mat_datashow" <?php if($_SESSION_CAD['select_horario_reserva_datashow'] == "3_horario_mat_datashow") echo "selected"; ?> >3º Hor. Mat. 9h00 ás 9h45</option>

			<option value="4_horario_mat_datashow" <?php if($_SESSION_CAD['select_horario_reserva_datashow'] == "4_horario_mat_datashow") echo "selected"; ?> >4º Hor. Mat. 10h05 ás 11h00</option>

			<option value="5_horario_mat_datashow" <?php if($_SESSION_CAD['select_horario_reserva_datashow'] == "5_horario_mat_datashow") echo "selected"; ?> >5º Hor. Mat. 11h00 ás 11h50</option>

			<option value="6_horario_mat_datashow" <?php if($_SESSION_CAD['select_horario_reserva_datashow'] == "6_horario_mat_datashow") echo "selected"; ?> >6º Hor. Mat. 11h50 ás 12h40</option>

			<option value="7_horario_mat_datashow" <?php if($_SESSION_CAD['select_horario_reserva_datashow'] == "7_horario_mat_datashow") echo "selected"; ?> >7º Hor. Mat. 12h40 ás 13h30</option>

			<option value="1_horario_ves_datashow" <?php if($_SESSION_CAD['select_horario_reserva_datashow'] == "1_horario_ves_datashow") echo "selected"; ?> >1º Hor. Ves. 13h30 ás 18h00</option>

			<option value="1_horario_not_datashow" <?php if($_SESSION_CAD['select_horario_reserva_datashow'] == "1_horario_not_datashow") echo "selected"; ?> >1º Hor. Not. 18h30 ás 21h10</option>

			<option value="2_horario_not_datashow" <?php if($_SESSION_CAD['select_horario_reserva_datashow'] == "2_horario_not_datashow") echo "selected"; ?> >2º Hor. Not. 21h10 ás 22h40</option>
		</select>
		<!-- -->
		<br>
		<!-- responsável pela reserva datashow -->
		<label for="resp-reserva">Responsável Reserva:</label><br>
		<input type="text" name="resp_reserva_datashow" value="<?php session_start(); echo $_SESSION_CAD['resp_reserva_datashow']; ?>" required id="resp-reserva"/>
		<!-- -->
		<br>
		<!-- botão -->
		<input type="submit" value="Cadastrar" name="cadastrar-reserva-datashow"/>
		<!-- -->
	</form>
</div>

</body>
</html>