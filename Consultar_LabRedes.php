<?php
	include("ConexaoBD.php");
	include("desabilita_erros.php");

	$sql_code = "SELECT * FROM lab_redes_reserva";

	$sql_query = $server_mysql->query($sql_code) or die($server_mysql->error);

	$linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC);

	$select_horario_reserva_labredes[''] = "";
	$select_horario_reserva_labredes['1_horario_mat_labredes'] = "1º Hor. Mat. 7h20 ás 8h10";
	$select_horario_reserva_labredes['2_horario_mat_labredes'] = "2º Hor. Mat. 8h10 ás 9h00";
	$select_horario_reserva_labredes['3_horario_mat_labredes'] = "3º Hor. Mat. 9h00 ás 9h45";
    $select_horario_reserva_labredes['4_horario_mat_labredes'] = "4º Hor. Mat. 10h05 ás 11h00";
    $select_horario_reserva_labredes['5_horario_mat_labredes'] = "5º Hor. Mat. 11h00 ás 11h50";
    $select_horario_reserva_labredes['6_horario_mat_labredes'] = "6º Hor. Mat. 11h50 ás 12h40";
    $select_horario_reserva_labredes['7_horario_mat_labredes'] = "7º Hor. Mat. 12h40 ás 13h30";
    $select_horario_reserva_labredes['1_horario_ves_labredes'] = "1º Hor. Ves. 13h30 ás 18h00";
    $select_horario_reserva_labredes['1_horario_not_labredes'] = "1º Hor. Not. 18h30 ás 21h10";
    $select_horario_reserva_labredes['2_horario_not_labredes'] = "2º Hor. Not. 21h10 ás 22h40";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Consultar Reserva do Lab Redes</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_LabRedes.css"/>
	<script type="text/javascript" src="_javascript/FunctionBuscaReservaLabRedes.js"></script>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
<h1 class="titulo-form">Consultar Reserva do Lab Redes</h1>

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="data-grid-lab-redes">
	<table id="datagrid" class="datagrid">
		<thead>
			<tr>
				<th>ID</th>
				<th>Data</th>
				<th>Horário</th>
				<th>Responsável Reserva</th>
				<th>Ação</th>
			</tr>

			<?php

			do {

			?>

		</thead>
		<tbody>
			<tr>
				<td><?php echo $linha['ID_RESERVA_LAB_REDES']; ?></td>
				<td><?php

					if ($linha['DATA_RESERVA_LAB_REDES'] == "") {
						
						$data_reserva_labredes = explode("-", $linha['DATA_RESERVA_LAB_REDES']);

						$data_reserva_labredes[2] = "";
						$data_reserva_labredes[1] = "";
						$data_reserva_labredes[0] = "";

						echo "$data_reserva_labredes[2]$data_reserva_labredes[1]$data_reserva_labredes[0]";

					} else {

						$data_reserva_labredes = explode("-", $linha['DATA_RESERVA_LAB_REDES']);

						echo "$data_reserva_labredes[2]/$data_reserva_labredes[1]/$data_reserva_labredes[0]";

					}

				?></td>
				<td><?php echo $select_horario_reserva_labredes[$linha['HORARIO_RESERVA_LAB_REDES']]; ?></td>
				<td><?php echo $linha['RESPONS_RESERVA_LAB_REDES']; ?></td>
				<td>
					<a href="">Alterar</a> |
					<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_LabRedes.php?id_res_labredes=<?php echo $linha['ID_RESERVA_LAB_REDES']; ?>';">Excluir</a>
				</td>
			</tr>

			<?php } while($linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC)); ?>

		</tbody>
	</table>
</div>

<div class="quadro-pesq-reserva-lab-redes">
	<form>
		<fieldset>
		<legend>Pesquisar por Data:</legend>
			<input type="search" name="valor_data" placeholder="  /  /  " id="pesq"  onkeyup="BuscaReservaLabRedesPorData(this.value)" />
		</fieldset>
	</form>
</div>
</body>
</html>