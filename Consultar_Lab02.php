<?php
	include("ConexaoBD.php");
	include("desabilita_erros.php");

	$sql_code = "SELECT * FROM lab02reserva";

	$sql_query = $server_mysql->query($sql_code) or die($server_mysql->error);

	$linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC);

	$select_horario_reserva_lab02[''] = "";
	$select_horario_reserva_lab02['1_horario_mat_lab02'] = "1º Hor. Mat. 7h20 ás 8h10";
	$select_horario_reserva_lab02['2_horario_mat_lab02'] = "2º Hor. Mat. 8h10 ás 9h00";
	$select_horario_reserva_lab02['3_horario_mat_lab02'] = "3º Hor. Mat. 9h00 ás 9h45";
    $select_horario_reserva_lab02['4_horario_mat_lab02'] = "4º Hor. Mat. 10h05 ás 11h00";
    $select_horario_reserva_lab02['5_horario_mat_lab02'] = "5º Hor. Mat. 11h00 ás 11h50";
    $select_horario_reserva_lab02['6_horario_mat_lab02'] = "6º Hor. Mat. 11h50 ás 12h40";
    $select_horario_reserva_lab02['7_horario_mat_lab02'] = "7º Hor. Mat. 12h40 ás 13h30";
    $select_horario_reserva_lab02['1_horario_ves_lab02'] = "1º Hor. Ves. 13h30 ás 18h00";
    $select_horario_reserva_lab02['1_horario_not_lab02'] = "1º Hor. Not. 18h30 ás 21h10";
    $select_horario_reserva_lab02['2_horario_not_lab02'] = "2º Hor. Not. 21h10 ás 22h40";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Consultar Reserva do Lab02</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Lab02.css"/>
	<script type="text/javascript" src="_javascript/FunctionBuscaReservaLab02.js"></script>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
<h1 class="titulo-form">Consultar Reserva do Lab02</h1>

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="data-grid-lab02">
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
				<td><?php echo $linha['ID_RESERVA_LAB02']; ?></td>
				<td><?php 

					if ($linha['DATA_RESERVA_LAB02'] == "") {

						$data_reserva_lab02 = explode("-", $linha['DATA_RESERVA_LAB02']);

						$data_reserva_lab02[2] = "";
						$data_reserva_lab02[1] = "";
						$data_reserva_lab02[0] = "";

						echo "$data_reserva_lab02[2]$data_reserva_lab02[1]$data_reserva_lab02[0]";

					} else {

						$data_reserva_lab02 = explode("-", $linha['DATA_RESERVA_LAB02']);

						echo "$data_reserva_lab02[2]/$data_reserva_lab02[1]/$data_reserva_lab02[0]";

					}

				?></td>
				<td><?php echo $select_horario_reserva_lab02[$linha['HORARIO_RESERVA_LAB02']]; ?></td>
				<td><?php echo $linha['RESPONS_RESERVA_LAB02']; ?></td>
				<td>
					<a href="">Alterar</a> |
					<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_Lab02.php?id_res_lab02=<?php echo $linha['ID_RESERVA_LAB02']; ?>';">Excluir</a>
				</td>
			</tr>

			<?php } while($linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC)); ?>

		</tbody>
	</table>
</div>

<div class="quadro-pesq-reserva-lab02">
	<form>
		<fieldset>
		<legend>Pesquisar por Data:</legend>
			<input type="search" name="valor_data" placeholder="  /  /  " id="pesq"
			onkeyup="BuscaReservaLab02PorData(this.value)" />
		</fieldset>
	</form>
</div>
</body>
</html>