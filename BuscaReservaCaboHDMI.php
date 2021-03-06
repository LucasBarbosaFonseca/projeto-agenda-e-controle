<?php
	//Incluir conexão com o banco de dados 
	include("ConexaoBD.php");

	$select_cabo[''] = "";
	$select_cabo['CaboHDMI_1Metro'] = "Cabo HDMI de 1 metro (única unidade)";
	$select_cabo['CaboHDMI_4Metros'] = "Cabo HDMI de 4 metros (única unidade)";

	$select_horario_reserva_cabo[''] = "";
	$select_horario_reserva_cabo['1_horario_mat_cabo'] = "1º Hor. Mat. 7h20 ás 8h10";
	$select_horario_reserva_cabo['2_horario_mat_cabo'] = "2º Hor. Mat. 8h10 ás 9h00";
	$select_horario_reserva_cabo['3_horario_mat_cabo'] = "3º Hor. Mat. 9h00 ás 9h45";
    $select_horario_reserva_cabo['4_horario_mat_cabo'] = "4º Hor. Mat. 10h05 ás 11h00";
    $select_horario_reserva_cabo['5_horario_mat_cabo'] = "5º Hor. Mat. 11h00 ás 11h50";
    $select_horario_reserva_cabo['6_horario_mat_cabo'] = "6º Hor. Mat. 11h50 ás 12h40";
    $select_horario_reserva_cabo['7_horario_mat_cabo'] = "7º Hor. Mat. 12h40 ás 13h30";
    $select_horario_reserva_cabo['1_horario_ves_cabo'] = "1º Hor. Ves. 13h30 ás 18h00";
    $select_horario_reserva_cabo['1_horario_not_cabo'] = "1º Hor. Not. 18h30 ás 21h10";
    $select_horario_reserva_cabo['2_horario_not_cabo'] = "2º Hor. Not. 21h10 ás 22h40";

    $valor_data = date('y-m-d', strtotime(str_replace('/', '-', $_GET['valor_data'])));

    $sql_code = "SELECT * FROM cabo_hdmi_reserva WHERE DATA_RESERVA_CABO LIKE '%".$valor_data."%' ";

    $sql_exec = mysqli_query($server_mysql,$sql_code);

    while ($result = mysqli_fetch_array($sql_exec)) { ?>

    	<table>
    		   <tbody>
    		  	    <tr>
    		  	    	<td><?php echo $result['ID_RESERVA_CABO']; ?></td>

    		  	    	<td><?php echo $select_cabo[$result['CABO_HDMI']]; ?></td>

    		  	    	<td><?php

    		  	    		if ($result['DATA_RESERVA_CABO'] == "") {

    		  	    			$data_reserva_cabo = explode("-", $result['DATA_RESERVA_CABO']);

    		  	    			$data_reserva_cabo[2] = "";
    		  	    			$data_reserva_cabo[1] = "";
    		  	    			$data_reserva_cabo[0] = "";

    		  	    			echo "$data_reserva_cabo[2]$data_reserva_cabo[1]$data_reserva_cabo[0]";

    		  	    		} else {

    		  	    			$data_reserva_cabo = explode("-", $result['DATA_RESERVA_CABO']);

    		  	    			echo "$data_reserva_cabo[2]/$data_reserva_cabo[1]/$data_reserva_cabo[0]";

    		  	    		}

    		  	    	?></td>

    		  	    	<td><?php echo $select_horario_reserva_cabo[$result['HORARIO_RESERVA_CABO']]; ?></td>

    		  	    	<td><?php echo $result['RESPONS_RESERVA_CABO']; ?></td>

    		  	    	<td>
    		  	    		<a href="">Alterar</a> |
    		  	    		<a href="javascript: if(confirm('Tem certeza que deseja excluir essa reserva?'))window.location.href='Excluir_CaboHDMI.php?id_res_cabo=<?php echo $result['ID_RESERVA_CABO']; ?>';">Excluir</a>
    		  	    	</td>
    		  	    </tr>
    		   </tbody>
    	</table>

<?php

    }

    //Acentuação
    header("Content-Type: text/html; charset=UTF-8", true);
?>