<?php
	include("ConexaoBD.php");
	include("desabilita_erros.php");

	$sql_code = "SELECT * FROM auditorioreserva";

	$sql_query = $server_mysql->query($sql_code) or die($server_mysql->error);

	$linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC);

	$select_horario_reserva_audi[''] = "";
	$select_horario_reserva_audi['1_horario_mat_audi'] = "1º Hor. Mat. 7h20 ás 8h10";
	$select_horario_reserva_audi['2_horario_mat_audi'] = "2º Hor. Mat. 8h10 ás 9h00";
	$select_horario_reserva_audi['3_horario_mat_audi'] = "3º Hor. Mat. 9h00 ás 9h45";
    $select_horario_reserva_audi['4_horario_mat_audi'] = "4º Hor. Mat. 10h05 ás 11h00";
    $select_horario_reserva_audi['5_horario_mat_audi'] = "5º Hor. Mat. 11h00 ás 11h50";
    $select_horario_reserva_audi['1_horario_ves_audi'] = "1º Hor. Ves. 11h50 ás 14h00";
    $select_horario_reserva_audi['2_horario_ves_audi'] = "2º Hor. Ves. 14h00 ás 18h00";
    $select_horario_reserva_audi['1_horario_not_audi'] = "1º Hor. Not. 18h30 ás 21h10";
    $select_horario_reserva_audi['2_horario_not_audi'] = "2º Hor. Not. 21h10 ás 22h40";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Consultar Reserva do Auditório</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Auditorio.css"/>
	<script type="text/javascript" src="_javascript/FunctionBuscaReservaAuditorio.js"></script>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
<h1 class="titulo-form">Consultar Reserva do Auditório</h1>

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="data-grid-auditorio">
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
				<td><?php echo $linha['ID_RESERVA_AUDITORIO']; ?></td>
				<td><?php

					if ($linha['DATA_RESERVA_AUDITORIO'] == "") {
						
						$data_reserva_audi = explode("-", $linha['DATA_RESERVA_AUDITORIO']);

						$data_reserva_audi[2] = "";
						$data_reserva_audi[1] = "";
						$data_reserva_audi[0] = "";

						echo "$data_reserva_audi[2]$data_reserva_audi[1]$data_reserva_audi[0]";

					} else {

						$data_reserva_audi = explode("-", $linha['DATA_RESERVA_AUDITORIO']);

						echo "$data_reserva_audi[2]/$data_reserva_audi[1]/$data_reserva_audi[0]";

					}

				?></td>
				<td><?php echo $select_horario_reserva_audi[$linha['HORARIO_RESERVA_AUDITORIO']]; ?></td>
				<td><?php echo $linha['RESPONS_RESERVA_AUDITORIO']; ?></td>
				<td>
					<a href="">Alterar</a> |
					<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_Auditorio.php?id_res_audi=<?php echo $linha['ID_RESERVA_AUDITORIO']; ?>';">Excluir</a>
				</td>
			</tr>

			<?php } while($linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC)); ?>

		</tbody>
	</table>
</div>

<div class="quadro-pesq-reserva-auditorio">
	<form>
		<fieldset>
		<legend>Pesquisar por Data:</legend>
			<input type="search" name="valor_data" placeholder="  /  /  " id="pesq" onkeyup="BuscaReservaAuditorioPorData(this.value)" />
		</fieldset>
	</form>
</div>
</body>
</html>