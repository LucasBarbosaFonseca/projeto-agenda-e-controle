<?php
	//Incluir conexão com o banco de dados 
	include("ConexaoBD.php");

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

    $valor_data = date('y-m-d', strtotime(str_replace('/', '-', $_GET['valor_data'])));

    $sql_code = "SELECT * FROM telareserva WHERE DATA_RESERVA_TELA LIKE '%".$valor_data."%' ";

    $sql_exec = mysqli_query($server_mysql,$sql_code);

    while ($result = mysqli_fetch_array($sql_exec)) { ?>

    	<table>
    		   <tbody>
    		   		<tr>
    		   			<td><?php echo $result['ID_RESERVA_TELA']; ?></td>

    		   			<td><?php echo $select_tela[$result['TELA']]; ?></td>

    		   			<td><?php

    		   					if ($result['DATA_RESERVA_TELA'] == "") {
    		   						
    		   						$data_res_tela = explode("-", $result['DATA_RESERVA_TELA']);

    		   						$data_res_tela[2] = "";
    		   						$data_res_tela[1] = "";
    		   						$data_res_tela[0] = "";

    		   						echo "$data_res_tela[2]$data_res_tela[1]$data_res_tela[0]";

    		   					} else {

    		   						$data_res_tela = explode("-", $result['DATA_RESERVA_TELA']);

    		   						echo "$data_res_tela[2]/$data_res_tela[1]/$data_res_tela[0]";

    		   					}

    		   			?></td>

    		   			<td><?php echo $select_horario_reserva_tela[$result['HORARIO_RESERVA_TELA']]; ?></td>

    		   			<td><?php $result['RESPONS_RESERVA_TELA']; ?></td>

    		   			<td>
    		   				<a href="">Alterar</a> |
    		   				<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_Tela.php?id_res_tela=<?php echo $result['ID_RESERVA_TELA']; ?>';">Excluir</a>
    		   			</td>
    		   		</tr>
    		   </tbody>
    	</table>

<?php

	}

	//Acentuação
	header("Content-Type: text/html; charset=UTF-8", true);
?>