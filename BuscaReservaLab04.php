<?php
	//Incluir conexão com o banco de dados 
	include("ConexaoBD.php");

    $select_horario_reserva_lab04[''] = "";
    $select_horario_reserva_lab04['1_horario_mat_lab04'] = "1º Hor. Mat. 7h20 ás 8h10";
    $select_horario_reserva_lab04['2_horario_mat_lab04'] = "2º Hor. Mat. 8h10 ás 9h00";
    $select_horario_reserva_lab04['3_horario_mat_lab04'] = "3º Hor. Mat. 9h00 ás 9h45";
    $select_horario_reserva_lab04['4_horario_mat_lab04'] = "4º Hor. Mat. 10h05 ás 11h00";
    $select_horario_reserva_lab04['5_horario_mat_lab04'] = "5º Hor. Mat. 11h00 ás 11h50";
    $select_horario_reserva_lab04['6_horario_mat_lab04'] = "6º Hor. Mat. 11h50 ás 12h40";
    $select_horario_reserva_lab04['7_horario_mat_lab04'] = "7º Hor. Mat. 12h40 ás 13h30";
    $select_horario_reserva_lab04['1_horario_ves_lab04'] = "1º Hor. Ves. 13h30 ás 18h00";
    $select_horario_reserva_lab04['1_horario_not_lab04'] = "1º Hor. Not. 18h30 ás 21h10";
    $select_horario_reserva_lab04['2_horario_not_lab04'] = "2º Hor. Not. 21h10 ás 22h40";

    $valor_data = date('y-m-d', strtotime(str_replace('/', '-', $_GET['valor_data'])));

    $sql_code = "SELECT * FROM lab04reserva WHERE DATA_RESERVA_LAB04 LIKE '%".$valor_data."%' ";

    $sql_exec = mysqli_query($server_mysql,$sql_code);

    while ($result = mysqli_fetch_array($sql_exec)) { ?>

    	<table>
    		   <tbody>
    		   		<tr>
    		   			<td><?php echo $result['ID_RESERVA_LAB04']; ?></td>

    		   			<td><?php

    		   					if ($result['DATA_RESERVA_LAB04'] == "") {
    		   						
    		   						$data_reserva_lab04 = explode("-", $result['DATA_RESERVA_LAB04']);

    		   						$data_reserva_lab04[2] = "";
    		   						$data_reserva_lab04[1] = "";
    		   						$data_reserva_lab04[0] = "";

    		   						echo "$data_reserva_lab04[2]$data_reserva_lab04[1]$data_reserva_lab04[0]";

    		   					} else {

    		   						$data_reserva_lab04 = explode("-", $result['DATA_RESERVA_LAB04']);

    		   						echo "$data_reserva_lab04[2]/$data_reserva_lab04[1]/$data_reserva_lab04[0]";

    		   					}

    		   			?></td>

    		   			<td><?php echo $select_horario_reserva_lab04[$result['HORARIO_RESERVA_LAB04']]; ?></td>

    		   			<td><?php echo $result['RESPONS_RESERVA_LAB04']; ?></td>

    		   			<td>
    		   				<a href="">Alterar</a> |
    		   				<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_Lab04.php?id_res_lab04=<?php echo $result['ID_RESERVA_LAB04']; ?>';">Excluir</a>
    		   			</td>
    		   		</tr>
    		   </tbody>
    	</table>

<?php

	}

	//Acentuação
	header("Content-Type: text/html; charset=UTF-8", true);
?>