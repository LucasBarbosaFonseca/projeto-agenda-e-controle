<?php
	include("ConexaoBD.php");

	$id = intval($_GET['id_res_lab06']);

	$sql_code = "DELETE FROM lab06reserva WHERE ID_RESERVA_LAB06 = '".$id."'";

	$sql_query = $server_mysql->query($sql_code) or die($server_mysql->error);

	if ($sql_query) {
	 	
		echo "<script language='javascript' type='text/javascript'>alert('Exclusão efetuada com sucesso!');window.location.href='Consultar_Lab06.php';</script>";

	} else {

	 	echo "<script language='javascript' type='text/javascript'>alert('Exclusão não efetuada.');window.location.href='Consultar_Lab06.php';</script>";

	}
?>