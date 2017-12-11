<?php
	//Incluir conexão com o banco de dados 
	include("ConexaoBD.php");

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

    $valor_data = date('y-m-d', strtotime(str_replace('/', '-', $_GET['valor_data'])));

    $sql_code = "SELECT * FROM auditorioreserva WHERE DATA_RESERVA_AUDITORIO LIKE '%".$valor_data."%' ";

    $sql_exec = mysqli_query($server_mysql,$sql_code);

    while ($result = mysqli_fetch_array($sql_exec)) { ?>

    	<table>
    		   <tbody>
    		   		<tr>
    		   			<td><?php echo $result['ID_RESERVA_AUDITORIO']; ?></td>

    		   			<td><?php

    		   					if ($result['DATA_RESERVA_AUDITORIO'] == "") {
    		   						
    		   						$data_reserva_audi = explode("-", $result['DATA_RESERVA_AUDITORIO']);

    		   						$data_reserva_audi[2] = "";
    		   						$data_reserva_audi[1] = "";
    		   						$data_reserva_audi[0] = "";

    		   						echo "$data_reserva_audi[2]$data_reserva_audi[1]$data_reserva_audi[0]";

    		   					} else {

    		   						$data_reserva_audi = explode("-", $result['DATA_RESERVA_AUDITORIO']);

    		   						echo "$data_reserva_audi[2]/$data_reserva_audi[1]/$data_reserva_audi[0]";

    		   					}

    		   			?></td>

    		   			<td><?php echo $select_horario_reserva_audi[$result['HORARIO_RESERVA_AUDITORIO']]; ?></td>

    		   			<td><?php echo $result['RESPONS_RESERVA_AUDITORIO']; ?></td>

    		   			<td>
    		   				<a href="">Alterar</a> |
    		   				<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_Auditorio.php?id_res_audi=<?php echo $result['ID_RESERVA_AUDITORIO']; ?>';">Excluir</a>
    		   			</td>
    		   		</tr>
    		   </tbody>
    	</table>

<?php

	}

	//Acentuação
	header("Content-Type: text/html; charset=UTF-8", true);
?>