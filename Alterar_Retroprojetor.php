<?php 
	include("ConexaoBD.php");
	include("desabilita_erros.php");


	if (!isset($_GET['id_res_retro'])) {
		
		echo "<script language='javascript' type='text/javascript'>alert('Código inválido!');window.location.href='menu.php';</script>";

	} else {

	$id = intval($_GET['id_res_retro']);

	if (isset($_POST['alterar-reserva-retroprojetor'])) {
		
		// 1 - Registro dos dados 
		if (!isset($_SESSION)) 
			session_start();

		foreach ($_POST as $chave=>$valor) 
			$_SESSION[$chave] = $server_mysql->real_escape_string($valor);

		// 2 - Validação dos dados 
		if (strlen($_SESSION['select_retroprojetor']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Retroprojetor\".');</script>"; 

		if (strlen($_SESSION['data_reserva_retroprojetor']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Data\".');</script>";

		if (strlen($_SESSION['select_horario_reserva_retroprojetor']) == 0) 
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Horário\".');</script>";

		if (strlen($_SESSION['respons_reserva_retroprojetor']) == 0)
			$erro[] = "<script language='javascript' type='text/javascript'>alert('Preencha o campo \"Responsável Reserva\".');</script>";



		
		$retroprojetor = $_SESSION['select_retroprojetor'];
 
		$data_res_retro = date('Y-m-d', strtotime(str_replace('/', '-', $_SESSION['data_reserva_retroprojetor'])));

		$horario_res_retro = $_SESSION['select_horario_reserva_retroprojetor'];
		
		$respons_res_retro = $_SESSION['respons_reserva_retroprojetor'];


		

		
			// 3 - Inserção no banco 
			if (count($erro) == 0) {	
				
				$sql_code_select = "SELECT RETROPROJETOR, DATA_RESERVA_RETRO, HORARIO_RESERVA_RETRO FROM retroprojetorreserva WHERE RETROPROJETOR = '".$retroprojetor."' AND DATA_RESERVA_RETRO = '".$data_res_retro."' AND HORARIO_RESERVA_RETRO = '".$horario_res_retro."'";

				$sql_query = mysqli_query($server_mysql,$sql_code_select);

				$array = mysqli_fetch_array($sql_query);

				$checarretro = $array['RETROPROJETOR'];
				$checardata = $array['DATA_RESERVA_RETRO'];
				$checarhorario = $array['HORARIO_RESERVA_RETRO'];

				if ($checarretro == $retroprojetor && ($checardata == $data_res_retro && $checarhorario == $horario_res_retro)) {

					echo "<script language='javascript' type='text/javascript'>alert('Essa reserva já existe. Alteração não efetuada.');window.location.href='Consultar_Retroprojetor.php';</script>";

					die();

				} else {

					$sql_code = "UPDATE retroprojetorreserva SET
							RETROPROJETOR = '".$_SESSION[select_retroprojetor]."',
							DATA_RESERVA_RETRO = '".$data_res_retro."',
							HORARIO_RESERVA_RETRO = '".$_SESSION[select_horario_reserva_retroprojetor]."',
							RESPONS_RESERVA_RETRO = '".$_SESSION[respons_reserva_retroprojetor]."'
							WHERE ID_RESERVA_RETRO = '".$id."'";  				

					$confirma = $server_mysql->query($sql_code) or die($server_mysql->error);

					if ($confirma) {

						session_start();

						session_unset($_SESSION['id_reserva_retroprojetor'],
								$_SESSION['select_retroprojetor'],
								$_SESSION['data_reserva_retroprojetor'],
								$_SESSION['select_horario_reserva_retroprojetor'],
								$_SESSION['respons_reserva_retroprojetor']);
					
						echo "<script language='javascript' type='text/javascript'>alert('Alteração efetuada com sucesso!');window.location.href='Consultar_Retroprojetor.php';</script>";

					} else {

						$erro[] = $confirma;

					}

				}
				
				
						
						

					 

			}				
				
		} else {

			$sql_code = "SELECT * FROM retroprojetorreserva WHERE ID_RESERVA_RETRO = '".$id."'";

			$sql_query = $server_mysql->query($sql_code) or die($server_mysql->error);

			$linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC);

			if (!isset($_SESSION))
				session_start();

			$_SESSION['id_reserva_retroprojetor'] = $linha['ID_RESERVA_RETRO'];
			$_SESSION['select_retroprojetor'] = $linha['RETROPROJETOR'];
			$_SESSION['data_reserva_retroprojetor'] = date('d/m/Y', strtotime(str_replace('-', '/', $linha['DATA_RESERVA_RETRO'])));
			$_SESSION['select_horario_reserva_retroprojetor'] = $linha['HORARIO_RESERVA_RETRO'];
			$_SESSION['respons_reserva_retroprojetor'] = $linha['RESPONS_RESERVA_RETRO'];

		}
	
		
	if (count($erro) > 0) {
			
			foreach ($erro as $valor) 
				echo "$valor";

		}	
		
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Alterar Reserva do Retroprojetor</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Retroprojetor.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<h1 class="titulo-form">Alterar Reserva do Retroprojetor</h1>

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="form-reserva-retroprojetor">
	<form accept-charset="utf-8" action="Alterar_Retroprojetor.php?id_res_retro=<?php echo $id; ?>" method="POST" id="form_reserva_retroprojetor">
		<!-- id reserva retroprojetor -->
		<label for="id">ID:</label><br>
		<input type="text" name="id_reserva_retroprojetor" value="<?php session_start(); echo $_SESSION['id_reserva_retroprojetor']; ?>" disabled id="id"/>
		<!-- -->
		<br>
		<!-- retroprojetor -->
		<label for="retroprojetor">Retroprojetor:</label><br>
		<select name="select_retroprojetor" <?php session_start(); ?>  id="retroprojetor">
			<option value="">Selecione um retroprojetor:</option>

			<option value="Retroprojetor" <?php if($_SESSION['select_retroprojetor'] == "Retroprojetor") echo "selected"; ?> >Retroprojetor (única unidade)</option>
		</select>
		<!-- -->
		<br>
		<!-- data reserva retroprojetor -->
		<label for="data">Data:</label><br>
		<input type="text" name="data_reserva_retroprojetor" value="<?php session_start(); echo $_SESSION['data_reserva_retroprojetor']; ?>" placeholder="  /  /  " minlength="10" maxlength="10"  id="data" onBlur=""/>
		<!-- -->
		<br>
		<!-- horário reserva retroprojetor -->
		<label for="horario">Horário:</label><br>
		<select name="select_horario_reserva_retroprojetor" <?php session_start(); ?>  id="horario">
			<option value="">Selecione um horário:</option>

			<option value="1_horario_mat_retroprojetor" <?php if($_SESSION['select_horario_reserva_retroprojetor'] == "1_horario_mat_retroprojetor") echo "selected"; ?> >1º Hor. Mat. 7h20 ás 8h10</option>

			<option value="2_horario_mat_retroprojetor" <?php if($_SESSION['select_horario_reserva_retroprojetor'] == "2_horario_mat_retroprojetor") echo "selected"; ?> >2º Hor. Mat. 8h10 ás 9h00</option>

			<option value="3_horario_mat_retroprojetor" <?php if($_SESSION['select_horario_reserva_retroprojetor'] == "3_horario_mat_retroprojetor") echo "selected"; ?> >3º Hor. Mat. 9h00 ás 9h45</option>

			<option value="4_horario_mat_retroprojetor" <?php if($_SESSION['select_horario_reserva_retroprojetor'] == "4_horario_mat_retroprojetor") echo "selected"; ?> >4º Hor. Mat. 10h05 ás 11h00</option>

			<option value="5_horario_mat_retroprojetor" <?php if($_SESSION['select_horario_reserva_retroprojetor'] == "5_horario_mat_retroprojetor") echo "selected"; ?> >5º Hor. Mat. 11h00 ás 11h50</option>

			<option value="6_horario_mat_retroprojetor" <?php if($_SESSION['select_horario_reserva_retroprojetor'] == "6_horario_mat_retroprojetor") echo "selected"; ?> >6º Hor. Mat. 11h50 ás 12h40</option>

			<option value="7_horario_mat_retroprojetor" <?php if($_SESSION['select_horario_reserva_retroprojetor'] == "7_horario_mat_retroprojetor") echo "selected"; ?> >7º Hor. Mat. 12h40 ás 13h30</option>

			<option value="1_horario_ves_retroprojetor" <?php if($_SESSION['select_horario_reserva_retroprojetor'] == "1_horario_ves_retroprojetor") echo "selected"; ?> >1º Hor. Ves. 13h30 ás 18h00</option>

			<option value="1_horario_not_retroprojetor" <?php if($_SESSION['select_horario_reserva_retroprojetor'] == "1_horario_not_retroprojetor") echo "selected"; ?> >1º Hor. Not. 18h30 ás 21h10</option>

			<option value="2_horario_not_retroprojetor" <?php if($_SESSION['select_horario_reserva_retroprojetor'] == "2_horario_not_retroprojetor") echo "selected"; ?> >2º Hor. Not. 21h10 ás 22h40</option>
		</select>
		<!-- -->
		<br>
		<!-- responsável pela reserva retroprojetor -->
		<label for="resp-reserva">Responsável Reserva:</label><br>
		<input type="text" name="respons_reserva_retroprojetor" value="<?php session_start(); echo $_SESSION['respons_reserva_retroprojetor']; ?>"  id="resp-reserva"/>
		<!-- -->
		<br>
		<!-- botão -->
		<input type="submit" value="Alterar" name="alterar-reserva-retroprojetor"/>
		<!-- -->
	</form>
</div>

<?php } ?>

</body>
</html>