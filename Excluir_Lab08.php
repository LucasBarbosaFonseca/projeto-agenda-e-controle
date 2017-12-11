<?php
	include("ConexaoBD.php");

	$id = intval($_GET['id_res_lab08']);

	$sql_code = "DELETE FROM lab08reserva WHERE ID_RESERVA_LAB08 = '".$id."'";

	$sql_query = $server_mysql->query($sql_code) or die($server_mysql->error);

	if ($sql_query) {
		
		echo "<script language='javascript' type='text/javascript'>alert('Exclusão efetuada com sucesso!');window.location.href='Consultar_Lab08.php';</script>";

	} else {

		echo "<script language='javascript' type='text/javascript'>alert('Exclusão não efetuada.');window.location.href='Consultar_Lab08.php';</script>";

	}
?>