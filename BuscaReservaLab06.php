<?php
	//Incluir conexão com o banco de dados 
	include("ConexaoBD.php");

    $select_horario_reserva_lab06[''] = "";
    $select_horario_reserva_lab06['1_horario_mat_lab06'] = "1º Hor. Mat. 7h20 ás 8h10";
    $select_horario_reserva_lab06['2_horario_mat_lab06'] = "2º Hor. Mat. 8h10 ás 9h00";
    $select_horario_reserva_lab06['3_horario_mat_lab06'] = "3º Hor. Mat. 9h00 ás 9h45";
    $select_horario_reserva_lab06['4_horario_mat_lab06'] = "4º Hor. Mat. 10h05 ás 11h00";
    $select_horario_reserva_lab06['5_horario_mat_lab06'] = "5º Hor. Mat. 11h00 ás 11h50";
    $select_horario_reserva_lab06['6_horario_mat_lab06'] = "6º Hor. Mat. 11h50 ás 12h40";
    $select_horario_reserva_lab06['7_horario_mat_lab06'] = "7º Hor. Mat. 12h40 ás 13h30";
    $select_horario_reserva_lab06['1_horario_ves_lab06'] = "1º Hor. Ves. 13h30 ás 18h00";
    $select_horario_reserva_lab06['1_horario_not_lab06'] = "1º Hor. Not. 18h30 ás 21h10";
    $select_horario_reserva_lab06['2_horario_not_lab06'] = "2º Hor. Not. 21h10 ás 22h40";

    $valor_data = date('y-m-d', strtotime(str_replace('/', '-', $_GET['valor_data'])));

    $sql_code = "SELECT * FROM lab06reserva WHERE DATA_RESERVA_LAB06 LIKE '%".$valor_data."%' ";

    $sql_exec = mysqli_query($server_mysql,$sql_code);

    while ($result = mysqli_fetch_array($sql_exec)) { ?>

    	<table>
    		   <tbody>
    		   		<tr>
    		   			<td><?php echo $result['ID_RESERVA_LAB06']; ?></td>

    		   			<td><?php

    		   					if ($result['DATA_RESERVA_LAB06'] == "") {
    		   						
    		   						$data_reserva_lab06 = explode("-", $result['DATA_RESERVA_LAB06']);

    		   						$data_reserva_lab06[2] = "";
    		   						$data_reserva_lab06[1] = "";
    		   						$data_reserva_lab06[0] = "";

    		   						echo "$data_reserva_lab06[2]$data_reserva_lab06[1]$data_reserva_lab06[0]";

    		   					} else {

    		   						$data_reserva_lab06 = explode("-", $result['DATA_RESERVA_LAB06']);

    		   						echo "$data_reserva_lab06[2]/$data_reserva_lab06[1]/$data_reserva_lab06[0]";

    		   					}

    		   			?></td>

    		   			<td><?php echo $select_horario_reserva_lab06[$result['HORARIO_RESERVA_LAB06']]; ?></td>

    		   			<td><?php echo $result['RESPONS_RESERVA_LAB06']; ?></td>

    		   			<td>
    		   				<a href="Alterar_Lab06.php?id_res_lab06=<?php echo $result['ID_RESERVA_LAB06']; ?>">Alterar</a> |
    		   				<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_Lab06.php?id_res_lab06=<?php echo $result['ID_RESERVA_LAB06']; ?>';">Excluir</a>
    		   			</td>
    		   		</tr>
    		   </tbody>
    	</table>

<?php

	}

	//Acentuação
	header("Content-Type: text/html; charset=UTF-8", true);
?>