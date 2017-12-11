<?php
	//Incluir conexão com o banco de dados 
	include("ConexaoBD.php");

    $select_horario_reserva_labfoto[''] = "";
    $select_horario_reserva_labfoto['1_horario_mat_labfoto'] = "1º Hor. Mat. 7h20 ás 8h10";
    $select_horario_reserva_labfoto['2_horario_mat_labfoto'] = "2º Hor. Mat. 8h10 ás 9h00";
    $select_horario_reserva_labfoto['3_horario_mat_labfoto'] = "3º Hor. Mat. 9h00 ás 9h45";
    $select_horario_reserva_labfoto['4_horario_mat_labfoto'] = "4º Hor. Mat. 10h05 ás 11h00";
    $select_horario_reserva_labfoto['5_horario_mat_labfoto'] = "5º Hor. Mat. 11h00 ás 11h50";
    $select_horario_reserva_labfoto['6_horario_mat_labfoto'] = "6º Hor. Mat. 11h50 ás 12h40";
    $select_horario_reserva_labfoto['7_horario_mat_labfoto'] = "7º Hor. Mat. 12h40 ás 13h30";
    $select_horario_reserva_labfoto['1_horario_ves_labfoto'] = "1º Hor. Ves. 13h30 ás 18h00";
    $select_horario_reserva_labfoto['1_horario_not_labfoto'] = "1º Hor. Not. 18h30 ás 21h10";
    $select_horario_reserva_labfoto['2_horario_not_labfoto'] = "2º Hor. Not. 21h10 ás 22h40";

    $valor_data = date('y-m-d', strtotime(str_replace('/', '-', $_GET['valor_data'])));

    $sql_code = "SELECT * FROM lab_fotografia_reserva WHERE DATA_RESERVA_LABFOTO LIKE '%".$valor_data."%' ";

    $sql_exec = mysqli_query($server_mysql,$sql_code);

    while ($result = mysqli_fetch_array($sql_exec)) { ?>

    	<table>
    		   <tbody>
    		   		<tr>
    		   			<td><?php echo $result['ID_RESERVA_LABFOTO']; ?></td>

    		   			<td><?php

    		   					if ($result['DATA_RESERVA_LABFOTO'] == "") {
    		   						
    		   						$data_reserva_labfoto = explode("-", $result['DATA_RESERVA_LABFOTO']);

    		   						$data_reserva_labfoto[2] = "";
    		   						$data_reserva_labfoto[1] = "";
    		   						$data_reserva_labfoto[0] = "";

    		   						echo "$data_reserva_labfoto[2]$data_reserva_labfoto[1]$data_reserva_labfoto[0]";

    		   					} else {

    		   						$data_reserva_labfoto = explode("-", $result['DATA_RESERVA_LABFOTO']);

    		   						echo "$data_reserva_labfoto[2]/$data_reserva_labfoto[1]/$data_reserva_labfoto[0]";

    		   					}

    		   			?></td>

    		   			<td><?php echo $select_horario_reserva_labfoto[$result['HORARIO_RESERVA_LABFOTO']]; ?></td>

    		   			<td><?php echo $result['RESPONS_RESERVA_LABFOTO']; ?></td>

    		   			<td>
    		   				<a href="">Alterar</a> |
    		   				<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_LabFotografia.php?id_res_labfoto=<?php echo $result['ID_RESERVA_LABFOTO']; ?>';">Excluir</a>
    		   			</td>
    		   		</tr>
    		   </tbody>
    	</table>

<?php

	}

	//Acentuação
	header("Content-Type: text/html; charset=UTF-8", true);
?>