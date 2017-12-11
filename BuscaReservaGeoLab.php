<?php
	//Incluir conexão com o banco de dados 
	include("ConexaoBD.php");

    $select_horario_reserva_geolab[''] = "";
    $select_horario_reserva_geolab['1_horario_mat_geolab'] = "1º Hor. Mat. 7h20 ás 8h10";
    $select_horario_reserva_geolab['2_horario_mat_geolab'] = "2º Hor. Mat. 8h10 ás 9h00";
    $select_horario_reserva_geolab['3_horario_mat_geolab'] = "3º Hor. Mat. 9h00 ás 9h45";
    $select_horario_reserva_geolab['4_horario_mat_geolab'] = "4º Hor. Mat. 10h05 ás 11h00";
    $select_horario_reserva_geolab['5_horario_mat_geolab'] = "5º Hor. Mat. 11h00 ás 11h50";
    $select_horario_reserva_geolab['6_horario_mat_geolab'] = "6º Hor. Mat. 11h50 ás 12h40";
    $select_horario_reserva_geolab['7_horario_mat_geolab'] = "7º Hor. Mat. 12h40 ás 13h30";
    $select_horario_reserva_geolab['1_horario_ves_geolab'] = "1º Hor. Ves. 13h30 ás 18h00";
    $select_horario_reserva_geolab['1_horario_not_geolab'] = "1º Hor. Not. 18h30 ás 21h10";
    $select_horario_reserva_geolab['2_horario_not_geolab'] = "2º Hor. Not. 21h10 ás 22h40";

    $valor_data = date('y-m-d', strtotime(str_replace('/', '-', $_GET['valor_data'])));

    $sql_code = "SELECT * FROM geolabreserva WHERE DATA_RESERVA_GEOLAB LIKE '%".$valor_data."%' ";

    $sql_exec = mysqli_query($server_mysql,$sql_code);

    while ($result = mysqli_fetch_array($sql_exec)) { ?>

    	<table>
    		   <tbody>
    		   		<tr>
    		   			<td><?php echo $result['ID_RESERVA_GEOLAB']; ?></td>

    		   			<td><?php

    		   					if ($result['DATA_RESERVA_GEOLAB'] == "") {
    		   						
    		   						$data_reserva_geolab = explode("-", $result['DATA_RESERVA_GEOLAB']);

    		   						$data_reserva_geolab[2] = "";
    		   						$data_reserva_geolab[1] = "";
    		   						$data_reserva_geolab[0] = "";

    		   						echo "$data_reserva_geolab[2]$data_reserva_geolab[1]$data_reserva_geolab[0]";

    		   					} else {

    		   						$data_reserva_geolab = explode("-", $result['DATA_RESERVA_GEOLAB']);

    		   						echo "$data_reserva_geolab[2]/$data_reserva_geolab[1]/$data_reserva_geolab[0]";

    		   					}

    		   			?></td>

    		   			<td><?php echo $select_horario_reserva_geolab[$result['HORARIO_RESERVA_GEOLAB']]; ?></td>

    		   			<td><?php echo $result['RESPONS_RESERVA_GEOLAB']; ?></td>

    		   			<td>
    		   				<a href="">Alterar</a> |
    		   				<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_GeoLab.php?id_res_geolab=<?php echo $result['ID_RESERVA_GEOLAB']; ?>';">Excluir</a>
    		   			</td>
    		   		</tr>
    		   </tbody>
    	</table>

<?php

	}

	//Acentuação
	header("Content-Type: text/html; charset=UTF-8", true);
?>