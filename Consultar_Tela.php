<?php
	include("ConexaoBD.php");
	include("desabilita_erros.php");

	$sql_code = "SELECT * FROM telareserva";

	$sql_query = $server_mysql->query($sql_code) or die($server_mysql->error);

	$linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC);

	$select_tela[''] = "";
	$select_tela['Tela_com_tripe_uni1'] = "Tela com tripé (unidade 1)";
	$select_tela['Tela_com_tripe_uni2'] = "Tela com tripé (unidade 2)";
	$select_tela['Tela_sem_tripe_uni1'] = "Tela sem tripé (unidade 1)";
	$select_tela['Tela_sem_tripe_uni2'] = "Tela sem tripé (unidade 2)";

	$select_horario_reserva_tela[''] = "";
	$select_horario_reserva_tela['1_horario_mat_tela'] = "1º Hor. Mat. 7h20 ás 8h10";
	$select_horario_reserva_tela['2_horario_mat_tela'] = "2º Hor. Mat. 8h10 ás 9h00";
	$select_horario_reserva_tela['3_horario_mat_tela'] = "3º Hor. Mat. 9h00 ás 9h45";
    $select_horario_reserva_tela['4_horario_mat_tela'] = "4º Hor. Mat. 10h05 ás 11h00";
    $select_horario_reserva_tela['5_horario_mat_tela'] = "5º Hor. Mat. 11h00 ás 11h50";
    $select_horario_reserva_tela['6_horario_mat_tela'] = "6º Hor. Mat. 11h50 ás 12h40";
    $select_horario_reserva_tela['7_horario_mat_tela'] = "7º Hor. Mat. 12h40 ás 13h30";
    $select_horario_reserva_tela['1_horario_ves_tela'] = "1º Hor. Ves. 13h30 ás 18h00";
    $select_horario_reserva_tela['1_horario_not_tela'] = "1º Hor. Not. 18h30 ás 21h10";
    $select_horario_reserva_tela['2_horario_not_tela'] = "2º Hor. Not. 21h10 ás 22h40";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Consultar Reserva da Tela p/ Datashow e Retroprojetor</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Tela.css"/>
	<script type="text/javascript" src="_javascript/FunctionBuscaReservaTela.js"></script>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<h1 class="titulo-form">Consultar Reserva da Tela p/ Datashow e Retroprojetor</h1>

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="data-grid-tela">
	<table id="datagrid" class="datagrid">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tela</th>
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
				<td><?php echo $linha['ID_RESERVA_TELA']; ?></td>
                <td><?php echo $select_tela[$linha['TELA']]; ?></td>
                <td><?php

                	if ($linha['DATA_RESERVA_TELA'] == "") {
                		
                		$data_res_tela = explode("-", $linha['DATA_RESERVA_TELA']);

                		$data_res_tela[2] = "";
                		$data_res_tela[1] = "";
                		$data_res_tela[0] = "";

                		echo "$data_res_tela[2]$data_res_tela[1]$data_res_tela[0]";

                	} else {

                		$data_res_tela = explode("-", $linha['DATA_RESERVA_TELA']);

                		echo "$data_res_tela[2]/$data_res_tela[1]/$data_res_tela[0]";

                	}
                	
                ?></td>
                <td><?php echo $select_horario_reserva_tela[$linha['HORARIO_RESERVA_TELA']]; ?></td>
                <td><?php echo $linha['RESPONS_RESERVA_TELA']; ?></td>
                <td>
                	<a href="">Alterar</a> |
                	<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_Tela.php?id_res_tela=<?php echo $linha['ID_RESERVA_TELA']; ?>';">Excluir</a>
                </td>
			</tr>

			<?php } while($linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC)); ?>

		</tbody>
	</table>
</div>

<div class="quadro-pesq-reserva-tela">
	<form>
		<fieldset>
		<legend>Pesquisar por Data:</legend>
			<input type="search" name="valor_data" placeholder="  /  /  " id="pesq" onkeyup="BuscaReservaTelaPorData(this.value)" />
		</fieldset>
	</form>
</div>

</body>
</html>