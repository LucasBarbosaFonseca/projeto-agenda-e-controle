<?php
	//Incluir conexão com o banco de dados 
	include("ConexaoBD.php");

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

    $valor_data = date('y-m-d', strtotime(str_replace('/', '-', $_GET['valor_data'])));

    $sql_code = "SELECT * FROM notebookreserva WHERE DATA_RESERVA_NOTE LIKE '%".$valor_data."%' ";

    $sql_exec = mysqli_query($server_mysql,$sql_code);

    while ($result = mysqli_fetch_array($sql_exec)) { ?>

    	<table>
    		   <tbody>
    		   		<tr>
    		   			<td><?php echo $result['ID_RESERVA_NOTE']; ?></td>

    		   			<td><?php echo $select_notebook[$result['NOTEBOOK']]; ?></td>

    		   			<td><?php

    		   					if ($result['DATA_RESERVA_NOTE'] == "") {
    		   						
    		   						$data_reserva_note = explode("-", $result['DATA_RESERVA_NOTE']);

    		   						$data_reserva_note[2] = "";
    		   						$data_reserva_note[1] = "";
    		   						$data_reserva_note[0] = "";

    		   						echo "$data_reserva_note[2]$data_reserva_note[1]$data_reserva_note[0]";

    		   					} else {

    		   						$data_reserva_note = explode("-", $result['DATA_RESERVA_NOTE']);

    		   						echo "$data_reserva_note[2]/$data_reserva_note[1]/$data_reserva_note[0]";

    		   					}

    		   			?></td>

    		   			<td><?php echo $select_horario_reserva_note[$result['HORARIO_RESERVA_NOTE']]; ?></td>

    		   			<td><?php echo $result['RESPONS_RESERVA_NOTE']; ?></td>

    		   			<td>
    		   				<a href="">Alterar</a> |
    		   				<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_Notebook.php?id_res_note=<?php echo $result['ID_RESERVA_NOTE']; ?>';">Excluir</a>
    		   			</td>
    		   		</tr>
    		   </tbody>
    	</table>

<?php

	}

	//Acentuação
	header("Content-Type: text/html; charset=UTF-8", true);
?>