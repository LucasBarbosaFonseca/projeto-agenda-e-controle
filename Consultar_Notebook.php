<?php
	include("ConexaoBD.php");
	include("desabilita_erros.php");

	$sql_code = "SELECT * FROM notebookreserva";

	$sql_query = $server_mysql->query($sql_code) or die($server_mysql->error);

	$linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC);

	$select_notebook[''] = "";
	$select_notebook['Notebook_PCMIX_uni1'] = "Notebook PCMIX (unidade 1) (uso no lab redes)";
	$select_notebook['Notebook_PCMIX_uni2'] = "Notebook PCMIX (unidade 2) (uso no lab redes)";
	$select_notebook['Notebook_PCMIX_uni3'] = "Notebook PCMIX (unidade 3) (uso no lab redes)";
	$select_notebook['Notebook_PCMIX_uni4'] = "Notebook PCMIX (unidade 4) (uso no lab redes)";
	$select_notebook['Notebook_PCMIX_uni5'] = "Notebook PCMIX (unidade 5) (uso no lab redes)";
	$select_notebook['Notebook_Positivo_uni1'] = "Notebook Positivo (unidade 1) (uso nas salas com datashow fixo)";
	$select_notebook['Notebook_Positivo_uni2'] = "Notebook Positivo (unidade 2) (uso nas salas com datashow fixo)";
	$select_notebook['Notebook_Positivo_uni3'] = "Notebook Positivo (unidade 3) (uso nas salas com datashow fixo)";

	$select_horario_reserva_note[''] = "";
	$select_horario_reserva_note['1_horario_mat_note'] = "1º Hor. Mat. 7h20 ás 8h10";
	$select_horario_reserva_note['2_horario_mat_note'] = "2º Hor. Mat. 8h10 ás 9h00";
	$select_horario_reserva_note['3_horario_mat_note'] = "3º Hor. Mat. 9h00 ás 9h45";
    $select_horario_reserva_note['4_horario_mat_note'] = "4º Hor. Mat. 10h05 ás 11h00";
    $select_horario_reserva_note['5_horario_mat_note'] = "5º Hor. Mat. 11h00 ás 11h50";
    $select_horario_reserva_note['6_horario_mat_note'] = "6º Hor. Mat. 11h50 ás 12h40";
    $select_horario_reserva_note['7_horario_mat_note'] = "7º Hor. Mat. 12h40 ás 13h30";
    $select_horario_reserva_note['1_horario_ves_note'] = "1º Hor. Ves. 13h30 ás 18h00";
    $select_horario_reserva_note['1_horario_not_note'] = "1º Hor. Not. 18h30 ás 21h10";
    $select_horario_reserva_note['2_horario_not_note'] = "2º Hor. Not. 21h10 ás 22h40";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Consultar Reserva do Notebook</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Notebook.css"/>
	<script type="text/javascript" src="_javascript/FunctionBuscaReservaNotebook.js"></script>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<h1 class="titulo-form">Consultar Reserva do Notebook</h1>

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="data-grid-notebook">
	<table id="datagrid" class="datagrid">
		<thead>
			<tr>
				<th>ID</th>
				<th>Notebook</th>
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
				<td><?php echo $linha['ID_RESERVA_NOTE']; ?></td>
				<td><?php echo $select_notebook[$linha['NOTEBOOK']]; ?></td>
				<td><?php

					if ($linha['DATA_RESERVA_NOTE'] == "") {

						$data_reserva_note = explode("-", $linha['DATA_RESERVA_NOTE']);

						$data_reserva_note[2] = "";
						$data_reserva_note[1] = "";
						$data_reserva_note[0] = "";

						echo "$data_reserva_note[2]$data_reserva_note[1]$data_reserva_note[0]";

					} else {

						$data_reserva_note = explode("-", $linha['DATA_RESERVA_NOTE']);

						echo "$data_reserva_note[2]/$data_reserva_note[1]/$data_reserva_note[0]";

					}

				?></td>
				<td><?php echo $select_horario_reserva_note[$linha['HORARIO_RESERVA_NOTE']]; ?></td>
				<td><?php echo $linha['RESPONS_RESERVA_NOTE']; ?></td>
				<td>
					<a href="">Alterar</a> |
					<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_Notebook.php?id_res_note=<?php echo $linha['ID_RESERVA_NOTE']; ?>';">Excluir</a>
				</td>
			</tr>

			<?php } while($linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC)); ?>

		</tbody>
	</table>
</div>

<div class="quadro-pesq-reserva-notebook">
	<form>
		<fieldset>
		<legend>Pesquisar por Data:</legend>
			<input type="search" name="valor_data" placeholder="  /  /  " id="pesq" onkeyup="BuscaReservaNotebookPorData(this.value)"/>
		</fieldset>
	</form>
</div>

</body>
</html>