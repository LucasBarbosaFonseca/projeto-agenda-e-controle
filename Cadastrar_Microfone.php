<?php 
	include("ConexaoBD.php");
	include("desabilita_erros.php");

	if (isset($_POST['cadastrar-reserva-microfone'])) {
		
		// 1 - Registro dos dados 
		if (!isset($_SESSION_CAD))
			session_start();

		foreach ($_POST as $chave=>$valor)
			$_SESSION_CAD[$chave] = $server_mysql->real_escape_string($valor);

		// 2 - Validação dos dados 
		if (strlen($_SESSION_CAD['select_microfone']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Microfone\".');</script>";

		if (strlen($_SESSION_CAD['data_reserva_micro']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Data\".');</script>";

		if (strlen($_SESSION_CAD['select_horario_reserva_micro']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Horário\".');</script>";

		if (strlen($_SESSION_CAD['respons_reserva_micro']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Responsável Reserva\".');</script>";



		//Verificar se registro já existe 
		$microfone = $_SESSION_CAD['select_microfone'];

		$data_reserva_micro = date('y-m-d', strtotime(str_replace('/', '-', $_SESSION_CAD['data_reserva_micro'])));

		$horario_reserva_micro = $_SESSION_CAD['select_horario_reserva_micro'];

		$sql_code_select = "SELECT * FROM microfonereserva WHERE MICROFONE = '".$microfone."' AND DATA_RESERVA_MICROFONE = '".$data_reserva_micro."' AND HORARIO_RESERVA_MICROFONE = '".$horario_reserva_micro."'";

		$sql_query = mysqli_query($server_mysql,$sql_code_select);

		if (mysqli_fetch_array($sql_query, MYSQL_ASSOC) > 0) {
			
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Essa reserva já existe. Cadastro não efetuado!');window.location.href='Consultar_Microfone.php';</script>";

		}




		// 3 - Inserção no banco 
		if (count($erro) == 0) {
			
			$sql_code = "INSERT INTO microfonereserva (
			    MICROFONE,
			    DATA_RESERVA_MICROFONE,
			    HORARIO_RESERVA_MICROFONE,
			    RESPONS_RESERVA_MICROFONE)
			    VALUES (
			    '".$_SESSION_CAD[select_microfone]."',
			    '".$data_reserva_micro."',
			    '".$_SESSION_CAD[select_horario_reserva_micro]."',
			    '".$_SESSION_CAD[respons_reserva_micro]."'
			    )";

			$confirma = $server_mysql->query($sql_code) or die($server_mysql->error);

			if ($confirma) {

				session_start();

				session_unset($_SESSION_CAD['select_microfone'],
			          $_SESSION_CAD['data_reserva_micro'],
			          $_SESSION_CAD['select_horario_reserva_micro'],
			          $_SESSION_CAD['respons_reserva_micro']);

				echo "<script language='javascript' type='text/javascript'>alert('Cadastro efetuado com sucesso!');window.location.href='Consultar_Microfone.php';</script>";

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
	<title>Cadastrar Reserva do Microfone</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Microfone.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script>
		function VerificaData(data_reserva_micro) {

			var patternVerificaData = /^(((0[1-9]|[12][0-9]|3[01])([-.\/])(0[13578]|10|12)([-.\/])(\d{4}))|(([0][1-9]|[12][0-9]|30)([-.\/])(0[469]|11)([-.\/])(\d{4}))|((0[1-9]|1[0-9]|2[0-8])([-.\/])(02)([-.\/])(\d{4}))|((29)(\.|-|\/)(02)([-.\/])([02468][048]00))|((29)([-.\/])(02)([-.\/])([13579][26]00))|((29)([-.\/])(02)([-.\/])([0-9][0-9][0][48]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][2468][048]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][13579][26])))$/;

			if (!patternVerificaData.test(data_reserva_micro)) {
				alert("Data inválida!");
				form_reserva_microfone.data_reserva_micro.value="";
				form_reserva_microfone.data_reserva_micro.focus();
				return false;
			}

		}
	</script>
</head>
<body>

<h1 class="titulo-form">Cadastrar Reserva do Microfone</h1>

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="form-reserva-microfone">
	<form accept-charset="utf-8" action="Cadastrar_Microfone.php" method="POST" id="form_reserva_microfone">
		<!-- id reserva microfone -->
		<label for="id">ID:</label><br>
		<input type="text" name="id_reserva_micro" disabled id="id"/>
		<!-- -->
		<br>
		<!-- microfone -->
		<label for="microfone">Microfone:</label><br>
		<select name="select_microfone" <?php session_start(); ?> required id="microfone">
			<option value="">Selecione um microfone:</option>

			<option value="Microfone_Leson_LS58_fio" <?php if($_SESSION_CAD['select_microfone'] == "Microfone_Leson_LS58_fio") echo "selected"; ?> >Microfone Leson LS58 (com fio 5 metros) (única unidade)</option>

			<option value="Microfone_UH_02MM_semFio_uni1" <?php if($_SESSION_CAD['select_microfone'] == "Microfone_UH_02MM_semFio_uni1") echo "selected"; ?> >Microfone Lyco UH-02MM (sem fio) (unidade 1)</option>

			<option value="Microfone_UH_02MM_semFio_uni2" <?php if($_SESSION_CAD['select_microfone'] == "Microfone_UH_02MM_semFio_uni2") echo "selected"; ?> >Microfone Lyco UH-02MM (sem fio) (unidade 2)</option>
		</select>
		<!-- -->
		<br>
		<!-- data reserva microfone -->
		<label for="data">Data:</label><br>
		<input type="text" name="data_reserva_micro" value="<?php session_start(); echo $_SESSION_CAD['data_reserva_micro']; ?>" placeholder="  /  /  " minlength="10" maxlength="10" required id="data" onBlur="VerificaData(this.value)"/>
		<!-- -->
		<br>
		<!-- horário reserva microfone -->
		<label for="horario">Horário:</label><br>
		<select name="select_horario_reserva_micro" <?php session_start(); ?> required id="horario">
			<option value="">Selecione um horário:</option>

			<option value="1_horario_mat_micro" <?php if($_SESSION_CAD['select_horario_reserva_micro'] == "1_horario_mat_micro") echo "selected"; ?> >1º Hor. Mat. 7h20 ás 8h10</option>

			<option value="2_horario_mat_micro" <?php if($_SESSION_CAD['select_horario_reserva_micro'] == "2_horario_mat_micro") echo "selected"; ?> >2º Hor. Mat. 8h10 ás 9h00</option>

			<option value="3_horario_mat_micro" <?php if($_SESSION_CAD['select_horario_reserva_micro'] == "3_horario_mat_micro") echo "selected"; ?> >3º Hor. Mat. 9h00 ás 9h45</option>

			<option value="4_horario_mat_micro" <?php if($_SESSION_CAD['select_horario_reserva_micro'] == "4_horario_mat_micro") echo "selected"; ?> >4º Hor. Mat. 10h05 ás 11h00</option>

			<option value="5_horario_mat_micro" <?php if($_SESSION_CAD['select_horario_reserva_micro'] == "5_horario_mat_micro") echo "selected"; ?> >5º Hor. Mat. 11h00 ás 11h50</option>

			<option value="6_horario_mat_micro" <?php if($_SESSION_CAD['select_horario_reserva_micro'] == "6_horario_mat_micro") echo "selected"; ?> >6º Hor. Mat. 11h50 ás 12h40</option>

			<option value="7_horario_mat_micro" <?php if($_SESSION_CAD['select_horario_reserva_micro'] == "7_horario_mat_micro") echo "selected"; ?> >7º Hor. Mat. 12h40 ás 13h30</option>

			<option value="1_horario_ves_micro" <?php if($_SESSION_CAD['select_horario_reserva_micro'] == "1_horario_ves_micro") echo "selected"; ?> >1º Hor. Ves. 13h30 ás 18h00</option>

			<option value="1_horario_not_micro" <?php if($_SESSION_CAD['select_horario_reserva_micro'] == "1_horario_not_micro") echo "selected"; ?> >1º Hor. Not. 18h30 ás 21h10</option>

			<option value="2_horario_not_micro" <?php if($_SESSION_CAD['select_horario_reserva_micro'] == "2_horario_not_micro") echo "selected"; ?> >2º Hor. Not. 21h10 ás 22h40</option>
		</select>
		<!-- -->
		<br>
		<!-- responsável pela reserva microfone -->
		<label for="resp-reserva">Responsável Reserva:</label><br>
		<input type="text" name="respons_reserva_micro" value="<?php session_start(); echo $_SESSION_CAD['respons_reserva_micro']; ?>" required id="resp-reserva"/>
		<!-- -->
		<br>
		<!-- botão -->
		<input type="submit" value="Cadastrar" name="cadastrar-reserva-microfone"/>
		<!-- -->
	</form>
</div>

</body>
</html>