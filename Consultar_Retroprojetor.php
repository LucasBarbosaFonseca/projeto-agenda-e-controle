<?php
	include("ConexaoBD.php");
	include("desabilita_erros.php");

	$sql_code = "SELECT * FROM retroprojetorreserva";

	$sql_query = $server_mysql->query($sql_code) or die($server_mysql->error);

	$linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC);

	$select_retroprojetor[''] = "";
	$select_retroprojetor['Retroprojetor'] = "Retroprojetor (única unidade)";

	$select_horario_reserva_retroprojetor[''] = "";
	$select_horario_reserva_retroprojetor['1_horario_mat_retroprojetor'] = "1º Hor. Mat. 7h20 ás 8h10";
	$select_horario_reserva_retroprojetor['2_horario_mat_retroprojetor'] = "2º Hor. Mat. 8h10 ás 9h00";
	$select_horario_reserva_retroprojetor['3_horario_mat_retroprojetor'] = "3º Hor. Mat. 9h00 ás 9h45";
    $select_horario_reserva_retroprojetor['4_horario_mat_retroprojetor'] = "4º Hor. Mat. 10h05 ás 11h00";
    $select_horario_reserva_retroprojetor['5_horario_mat_retroprojetor'] = "5º Hor. Mat. 11h00 ás 11h50";
    $select_horario_reserva_retroprojetor['6_horario_mat_retroprojetor'] = "6º Hor. Mat. 11h50 ás 12h40";
    $select_horario_reserva_retroprojetor['7_horario_mat_retroprojetor'] = "7º Hor. Mat. 12h40 ás 13h30";
    $select_horario_reserva_retroprojetor['1_horario_ves_retroprojetor'] = "1º Hor. Ves. 13h30 ás 18h00";
    $select_horario_reserva_retroprojetor['1_horario_not_retroprojetor'] = "1º Hor. Not. 18h30 ás 21h10";
    $select_horario_reserva_retroprojetor['2_horario_not_retroprojetor'] = "2º Hor. Not. 21h10 ás 22h40";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Consultar Reserva do Retroprojetor</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Retroprojetor.css"/>
	<script type="text/javascript" src="_javascript/FunctionBuscaReservaRetroprojetor.js"></script>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<h1 class="titulo-form">Consultar Reserva do Retroprojetor</h1>

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="data-grid-retroprojetor">
	<table id="datagrid" class="datagrid">
		<thead>
			<tr>
				<th>ID</th>
				<th>Retroprojetor</th>
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
				<td><?php echo $linha['ID_RESERVA_RETRO']; ?></td>
                <td><?php echo $select_retroprojetor[$linha['RETROPROJETOR']]; ?></td>
                <td><?php

                	if ($linha['DATA_RESERVA_RETRO'] == "") {
                		
                		$data_reserva_retro = explode("-", $linha['DATA_RESERVA_RETRO']);

                		$data_reserva_retro[2] = "";
                		$data_reserva_retro[1] = "";
                		$data_reserva_retro[0] = "";

                		echo "$data_reserva_retro[2]$data_reserva_retro[1]$data_reserva_retro[0]";

                	} else {

                		$data_reserva_retro = explode("-", $linha['DATA_RESERVA_RETRO']);

                		echo "$data_reserva_retro[2]/$data_reserva_retro[1]/$data_reserva_retro[0]";

                	}

                ?></td>
                <td><?php echo $select_horario_reserva_retroprojetor[$linha['HORARIO_RESERVA_RETRO']]; ?></td>
                <td><?php echo $linha['RESPONS_RESERVA_RETRO']; ?></td>
                <td>
                	<a href="Alterar_Retroprojetor.php?id_res_retro=<?php echo $linha['ID_RESERVA_RETRO']; ?>">Alterar</a> |
                	<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_Retroprojetor.php?id_res_retro=<?php echo $linha['ID_RESERVA_RETRO']; ?>';">Excluir</a>
                </td>
			</tr>

			<?php } while($linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC)); ?>

		</tbody>
	</table>
</div>

<div class="quadro-pesq-reserva-retroprojetor">
	<form>
		<fieldset>
		<legend>Pesquisar por Data:</legend>
			<input type="search" name="valor_data" placeholder="  /  /  " id="pesq" onkeyup="BuscaReservaRetroprojetorPorData(this.value)" />
		</fieldset>
	</form>
</div>

</body>
</html>