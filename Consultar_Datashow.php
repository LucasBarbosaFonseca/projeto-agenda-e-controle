<?php
	include("ConexaoBD.php");
	include("desabilita_erros.php");

	$sql_code = "SELECT * FROM datashowreserva";

	$sql_query = $server_mysql->query($sql_code) or die($server_mysql->error);

	$linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC);

	$select_datashow[''] = "";
	$select_datashow['Datashow_Sony_pl_ex100'] = "Datashow Sony PL-EX100 (única unidade)"; 
	$select_datashow['Datashow_Betec_bt720_uni1'] = "Datashow Betec BT720 (unidade 1)";
	$select_datashow['Datashow_Betec_bt720_uni2'] = "Datashow Betec BT720 (unidade 2)";
	$select_datashow['Datashow_Epson_h328a'] = "Datashow Epson H328A (única unidade)";
	$select_datashow['Datashow_Epson_h283a'] = "Datashow Epson H283A (única unidade) (em manutenção)";
	$select_datashow['Datashow_Benq_mp515'] = "Datashow Benq MP515 (única unidade) (em manutenção)";

	$select_horario_reserva_datashow[''] = "";
	$select_horario_reserva_datashow['1_horario_mat_datashow'] = "1º Hor. Mat. 7h20 ás 8h10";
	$select_horario_reserva_datashow['2_horario_mat_datashow'] = "2º Hor. Mat. 8h10 ás 9h00";
	$select_horario_reserva_datashow['3_horario_mat_datashow'] = "3º Hor. Mat. 9h00 ás 9h45";
	$select_horario_reserva_datashow['4_horario_mat_datashow'] = "4º Hor. Mat. 10h05 ás 11h00";
	$select_horario_reserva_datashow['5_horario_mat_datashow'] = "5º Hor. Mat. 11h00 ás 11h50";
	$select_horario_reserva_datashow['6_horario_mat_datashow'] = "6º Hor. Mat. 11h50 ás 12h40";
	$select_horario_reserva_datashow['7_horario_mat_datashow'] = "7º Hor. Mat. 12h40 ás 13h30";
	$select_horario_reserva_datashow['1_horario_ves_datashow'] = "1º Hor. Ves. 13h30 ás 18h00";
	$select_horario_reserva_datashow['1_horario_not_datashow'] = "1º Hor. Not. 18h30 ás 21h10";
	$select_horario_reserva_datashow['2_horario_not_datashow'] = "2º Hor. Not. 21h10 ás 22h40"; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Consultar Reserva do Datashow</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Datashow.css"/>
	<script type="text/javascript" src="_javascript/FunctionBuscaReservaDatashow.js"></script>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<h1 class="titulo-form">Consultar Reserva do Datashow</h1>

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="data-grid-datashow">
	<table id="datagrid" class="datagrid">
		<thead>
			<tr>
				<th>ID</th>
				<th>Datashow</th>
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
				<td><?php echo $linha['ID_RESERVA']; ?></td>
                <td><?php echo $select_datashow[$linha['DATASHOW']]; ?></td>
                <td><?php

                	if ($linha['DATA_RESERVA'] == "") {
                		
                		$data_reserva_datashow = explode("-", $linha['DATA_RESERVA']);

                		$data_reserva_datashow[2] = "";
                		$data_reserva_datashow[1] = "";
                		$data_reserva_datashow[0] = "";

                		echo "$data_reserva_datashow[2]$data_reserva_datashow[1]$data_reserva_datashow[0]";

                	} else {

                		$data_reserva_datashow = explode("-", $linha['DATA_RESERVA']);

                		echo "$data_reserva_datashow[2]/$data_reserva_datashow[1]/$data_reserva_datashow[0]";

                	}

                ?></td>
                <td><?php echo $select_horario_reserva_datashow[$linha['HORARIO_RESERVA']]; ?></td>
                <td><?php echo $linha['RESPONS_RESERVA']; ?></td>
                <td>
                	<a href="Alterar_Datashow.php?id_res_datashow=<?php echo $linha['ID_RESERVA']; ?>">Alterar</a> |
                	<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_Datashow.php?id_res_datashow=<?php echo $linha['ID_RESERVA']; ?>';">Excluir</a>
                </td>
			</tr>

			<?php } while($linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC)); ?>

		</tbody>
	</table>
</div>

<div class="quadro-pesq-reserva-datashow">
	<form>
		<fieldset>
		<legend>Pesquisar por Data:</legend>
			<input type="search" name="valor_data" placeholder="  /  /  " id="pesq" onkeyup="BuscaReservaDatashowPorData(this.value)" />
		</fieldset>
	</form>
</div>

</body>
</html>