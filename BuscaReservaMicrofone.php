<?php
	//Incluir conexão com o banco de dados 
	include("ConexaoBD.php");

	$select_microfone[''] = "";
    $select_microfone['Microfone_Leson_LS58_fio'] = "Microfone Leson LS58 (com fio 5 metros) (única unidade)";
    $select_microfone['Microfone_UH_02MM_semFio_uni1'] = "Microfone Lyco UH-02MM (sem fio) (unidade 1)";
    $select_microfone['Microfone_UH_02MM_semFio_uni2'] = "Microfone Lyco UH-02MM (sem fio) (unidade 2)";

    $select_horario_reserva_micro[''] = "";
    $select_horario_reserva_micro['1_horario_mat_micro'] = "1º Hor. Mat. 7h20 ás 8h10";
    $select_horario_reserva_micro['2_horario_mat_micro'] = "2º Hor. Mat. 8h10 ás 9h00";
    $select_horario_reserva_micro['3_horario_mat_micro'] = "3º Hor. Mat. 9h00 ás 9h45";
    $select_horario_reserva_micro['4_horario_mat_micro'] = "4º Hor. Mat. 10h05 ás 11h00";
    $select_horario_reserva_micro['5_horario_mat_micro'] = "5º Hor. Mat. 11h00 ás 11h50";
    $select_horario_reserva_micro['6_horario_mat_micro'] = "6º Hor. Mat. 11h50 ás 12h40";
    $select_horario_reserva_micro['7_horario_mat_micro'] = "7º Hor. Mat. 12h40 ás 13h30";
    $select_horario_reserva_micro['1_horario_ves_micro'] = "1º Hor. Ves. 13h30 ás 18h00";
    $select_horario_reserva_micro['1_horario_not_micro'] = "1º Hor. Not. 18h30 ás 21h10";
    $select_horario_reserva_micro['2_horario_not_micro'] = "2º Hor. Not. 21h10 ás 22h40";

    $valor_data = date('y-m-d', strtotime(str_replace('/', '-', $_GET['valor_data'])));

    $sql_code = "SELECT * FROM microfonereserva WHERE DATA_RESERVA_MICROFONE LIKE '%".$valor_data."%' ";

    $sql_exec = mysqli_query($server_mysql,$sql_code);

    while ($result = mysqli_fetch_array($sql_exec)) { ?>

    	<table>
    		   <tbody>
    		   		<tr>
    		   			<td><?php echo $result['ID_RESERVA_MICROFONE']; ?></td>

    		   			<td><?php echo $select_microfone[$result['MICROFONE']]; ?></td>

    		   			<td><?php

    		   					if ($result['DATA_RESERVA_MICROFONE'] == "") {
    		   						
    		   						$data_reserva_micro = explode("-", $result['DATA_RESERVA_MICROFONE']);

    		   						$data_reserva_micro[2] = "";
    		   						$data_reserva_micro[1] = "";
    		   						$data_reserva_micro[0] = "";

    		   						echo "$data_reserva_micro[2]$data_reserva_micro[1]$data_reserva_micro[0]";

    		   					} else {

    		   						$data_reserva_micro = explode("-", $result['DATA_RESERVA_MICROFONE']);

    		   						echo "$data_reserva_micro[2]/$data_reserva_micro[1]/$data_reserva_micro[0]";

    		   					}

    		   			?></td>

    		   			<td><?php echo $select_horario_reserva_micro[$result['HORARIO_RESERVA_MICROFONE']]; ?></td>

    		   			<td><?php echo $result['RESPONS_RESERVA_MICROFONE']; ?></td>

    		   			<td>
    		   				<a href="Alterar_Microfone.php?id_res_micro=<?php echo $result['ID_RESERVA_MICROFONE']; ?>">Alterar</a> |
    		   				<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_Microfone.php?id_res_micro=<?php echo $result['ID_RESERVA_MICROFONE']; ?>';">Excluir</a>
    		   			</td>
    		   		</tr>
    		   </tbody>
    	</table>

<?php

	}

	//Acentuação
	header("Content-Type: text/html; charset=UTF-8", true);
?>