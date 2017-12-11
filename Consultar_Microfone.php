<?php
	include("ConexaoBD.php");
	include("desabilita_erros.php");

	$sql_code = "SELECT * FROM microfonereserva";

	$sql_query = $server_mysql->query($sql_code) or die($server_mysql->error);

	$linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC);

	$select_microfone[''] = "";
	$select_microfone['Microfone_Leson_LS58_fio'] = "Microfone Leson LS58 (com fio 5 metros) (única unidade)";
	$select_microfone['Microfone_UH_02MM_semFio_uni1'] = "Microfone Lyco UH-02MM (sem fio) (unidade 1)";
	$select_microfone['Microfone_UH_02MM_semFio_uni2'] = "Microfone Lyco UH-02MM (sem fio) (unidade 2)";

	$select_horario_reserva_micro[''] = "";
	$select_horario_reserva_micro['1_horario_mat_micro'] = "1º Hor. Mat. 7h20 ás 8h10";
	$select_horario_reserva_micro['2_horario_mat_micro'] = "2º Hor. Mat. 8h10 ás 9h00";
	$select_horario_reserva_micro['3_horario_mat_micro'] = "3º Hor. Mat. 9h00 ás 9h45";
    $select_horario_reserva_micro['4_horario_mat_micro'] = "4º Hor. Mat. 10h05 ás 11h00";
    $select_horario_reserva_micro['5_horario_mat_micro'] = "5º Hor. Mat. 11h00 ás 11h50";
    $select_horario_reserva_micro['6_horario_mat_micro'] = "6º Hor. Mat. 11h50 ás 12h40";
    $select_horario_reserva_micro['7_horario_mat_micro'] = "7º Hor. Mat. 12h40 ás 13h30";
    $select_horario_reserva_micro['1_horario_ves_micro'] = "1º Hor. Ves. 13h30 ás 18h00";
    $select_horario_reserva_micro['1_horario_not_micro'] = "1º Hor. Not. 18h30 ás 21h10";
    $select_horario_reserva_micro['2_horario_not_micro'] = "2º Hor. Not. 21h10 ás 22h40";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Consultar Reserva do Microfone</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Microfone.css"/>
	<script type="text/javascript" src="_javascript/FunctionBuscaReservaMicrofone.js"></script>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<h1 class="titulo-form">Consultar Reserva do Microfone</h1>

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="data-grid-microfone">
	<table id="datagrid" class="datagrid">
		<thead>
			<tr>
				<th>ID</th>
				<th>Microfone</th>
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
				<td><?php echo $linha['ID_RESERVA_MICROFONE']; ?></td>
				<td><?php echo $select_microfone[$linha['MICROFONE']]; ?></td>
				<td><?php

				    if ($linha['DATA_RESERVA_MICROFONE'] == "") {
				    	
				    	$data_reserva_micro = explode("-", $linha['DATA_RESERVA_MICROFONE']);

				    	$data_reserva_micro[2] = "";
				    	$data_reserva_micro[1] = "";
				    	$data_reserva_micro[0] = "";

				    	echo "$data_reserva_micro[2]$data_reserva_micro[1]$data_reserva_micro[0]";

				    } else {

				    	$data_reserva_micro = explode("-", $linha['DATA_RESERVA_MICROFONE']);

				    	echo "$data_reserva_micro[2]/$data_reserva_micro[1]/$data_reserva_micro[0]";

				    }

				?></td>
				<td><?php echo $select_horario_reserva_micro[$linha['HORARIO_RESERVA_MICROFONE']]; ?></td>
				<td><?php echo $linha['RESPONS_RESERVA_MICROFONE']; ?></td>
				<td>
					<a href="">Alterar</a> |
					<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_Microfone.php?id_res_micro=<?php
					echo $linha['ID_RESERVA_MICROFONE']; ?>';">Excluir</a>
				</td>
			</tr>

			<?php } while($linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC)); ?>

		</tbody>
	</table>
</div>

<div class="quadro-pesq-reserva-microfone">
	<form>
		<fieldset>
		<legend>Pesquisar por Data:</legend>
			<input type="search" name="valor_data" placeholder="  /  /  " id="pesq" onkeyup="BuscaReservaMicrofonePorData(this.value)" />
		</fieldset>
	</form>
</div>

</body>
</html>