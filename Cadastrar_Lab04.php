<?php
	include("ConexaoBD.php");
	include("desabilita_erros.php");

	if (isset($_POST['cadastrar-reserva-lab04'])) {

		// 1 - Registro dos dados 
		if (!isset($_SESSION_CAD))
			session_start();

		foreach ($_POST as $chave=>$valor)
			$_SESSION_CAD[$chave] = $server_mysql->real_escape_string($valor);

		// 2 - Validação dos dados 
		if (strlen($_SESSION_CAD['data_reserva_lab04']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Data\".');</script>";

		if (strlen($_SESSION_CAD['select_horario_reserva_lab04']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Horário\".');</script>";

		if (strlen($_SESSION_CAD['respons_reserva_lab04']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Responsável Reserva\".');</script>";
        



        //Verificar se registro já existe
        $data_reserva_lab04 = date('y-m-d', strtotime(str_replace('/', '-', $_SESSION_CAD['data_reserva_lab04'])));

        $horario_reserva_lab04 = $_SESSION_CAD['select_horario_reserva_lab04'];

        $sql_code_select = "SELECT * FROM lab04reserva WHERE DATA_RESERVA_LAB04 = '".$data_reserva_lab04."' AND HORARIO_RESERVA_LAB04 = '".$horario_reserva_lab04."'";

        $sql_query = mysqli_query($server_mysql,$sql_code_select);

        if (mysqli_fetch_array($sql_query, MYSQL_ASSOC) > 0) {

        	$erro[] = "<script language='javascript' type='text/javascript'>alert('Essa reserva já existe. Cadastro não efetuado!');window.location.href='Consultar_Lab04.php';</script>";

        }




        // 3 - Inserção no banco 
        if (count($erro) == 0) {

        	$sql_code = "INSERT INTO lab04reserva (
                DATA_RESERVA_LAB04,
                HORARIO_RESERVA_LAB04,
                RESPONS_RESERVA_LAB04)
                VALUES (
                '".$data_reserva_lab04."',
                '".$_SESSION_CAD[select_horario_reserva_lab04]."',
                '".$_SESSION_CAD[respons_reserva_lab04]."'
                )";

            $confirma = $server_mysql->query($sql_code) or die($server_mysql->error);

            if ($confirma) {

            	session_start();

            	session_unset($_SESSION_CAD['data_reserva_lab04'],
                      $_SESSION_CAD['select_horario_reserva_lab04'],
                      $_SESSION_CAD['respons_reserva_lab04']);

            	echo "<script language='javascript' type='text/javascript'>alert('Cadastro efetuado com sucesso!');window.location.href='Consultar_Lab04.php';</script>";

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
	<title>Cadastrar Reserva do Lab04</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Lab04.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script>
		function VerificaData(data_reserva_lab04) {

			var patternVerificaData = /^(((0[1-9]|[12][0-9]|3[01])([-.\/])(0[13578]|10|12)([-.\/])(\d{4}))|(([0][1-9]|[12][0-9]|30)([-.\/])(0[469]|11)([-.\/])(\d{4}))|((0[1-9]|1[0-9]|2[0-8])([-.\/])(02)([-.\/])(\d{4}))|((29)(\.|-|\/)(02)([-.\/])([02468][048]00))|((29)([-.\/])(02)([-.\/])([13579][26]00))|((29)([-.\/])(02)([-.\/])([0-9][0-9][0][48]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][2468][048]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][13579][26])))$/;

			if (!patternVerificaData.test(data_reserva_lab04)) {
				alert("Data inválida!");
				form_reserva_lab04.data_reserva_lab04.value="";
				form_reserva_lab04.data_reserva_lab04.focus();
				return false;
			}

		}
	</script>
</head>
<body>
<h1 class="titulo-form">Cadastrar Reserva do Lab04</h1>

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="form-reserva-lab04">
	<form accept-charset="utf-8" action="Cadastrar_Lab04.php" method="POST" id="form_reserva_lab04">
		<!-- id reserva lab -->
		<label for="id">ID:</label><br>
		<input type="text" name="id_reserva_lab04" disabled id="id"/>
		<!-- -->
		<br>
		<!-- data reserva lab -->
		<label for="data">Data:</label><br>
		<input type="text" name="data_reserva_lab04" value="<?php session_start(); echo $_SESSION_CAD['data_reserva_lab04']; ?>" placeholder="  /  /  " minlength="10" maxlength="10" required id="data" onBlur="VerificaData(this.value)"/>
		<!-- -->
		<br>
		<!-- horário reserva lab -->
		<label for="horario">Horário:</label><br>
		<select name="select_horario_reserva_lab04" <?php session_start(); ?> required id="horario">
			<option value="">Selecione um horário:</option>

			<option value="1_horario_mat_lab04" <?php if($_SESSION_CAD['select_horario_reserva_lab04'] == "1_horario_mat_lab04") echo "selected"; ?> >1º Hor. Mat. 7h20 ás 8h10</option>

			<option value="2_horario_mat_lab04" <?php if($_SESSION_CAD['select_horario_reserva_lab04'] == "2_horario_mat_lab04") echo "selected"; ?> >2º Hor. Mat. 8h10 ás 9h00</option>

			<option value="3_horario_mat_lab04" <?php if($_SESSION_CAD['select_horario_reserva_lab04'] == "3_horario_mat_lab04") echo "selected"; ?> >3º Hor. Mat. 9h00 ás 9h45</option>

			<option value="4_horario_mat_lab04" <?php if($_SESSION_CAD['select_horario_reserva_lab04'] == "4_horario_mat_lab04") echo "selected"; ?> >4º Hor. Mat. 10h05 ás 11h00</option>

			<option value="5_horario_mat_lab04" <?php if($_SESSION_CAD['select_horario_reserva_lab04'] == "5_horario_mat_lab04") echo "selected"; ?> >5º Hor. Mat. 11h00 ás 11h50</option>

			<option value="6_horario_mat_lab04" <?php if($_SESSION_CAD['select_horario_reserva_lab04'] == "6_horario_mat_lab04") echo "selected"; ?> >6º Hor. Mat. 11h50 ás 12h40</option>

			<option value="7_horario_mat_lab04" <?php if($_SESSION_CAD['select_horario_reserva_lab04'] == "7_horario_mat_lab04") echo "selected"; ?> >7º Hor. Mat. 12h40 ás 13h30</option>

			<option value="1_horario_ves_lab04" <?php if($_SESSION_CAD['select_horario_reserva_lab04'] == "1_horario_ves_lab04") echo "selected"; ?> >1º Hor. Ves. 13h30 ás 18h00</option>

			<option value="1_horario_not_lab04" <?php if($_SESSION_CAD['select_horario_reserva_lab04'] == "1_horario_not_lab04") echo "selected"; ?> >1º Hor. Not. 18h30 ás 21h10</option>

			<option value="2_horario_not_lab04" <?php if($_SESSION_CAD['select_horario_reserva_lab04'] == "2_horario_not_lab04") echo "selected"; ?> >2º Hor. Not. 21h10 ás 22h40</option>
		</select>
		<!-- -->
		<br>
		<!-- Responsável pela Reserva lab -->
		<label for="resp-reserva">Responsável Reserva:</label><br>
		<input type="text" name="respons_reserva_lab04" value="<?php session_start(); echo $_SESSION_CAD['respons_reserva_lab04']; ?>" required id="resp-reserva"/>
		<!-- -->
		<br>
		<!-- Botão -->
		<input type="submit" value="Cadastrar" name="cadastrar-reserva-lab04"/>
		<!-- -->
	</form>
</div>
</body>
</html>