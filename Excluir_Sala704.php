<?php
	include("ConexaoBD.php");

	$id = intval($_GET['id_res_sala704']);

	$sql_code = "DELETE FROM sala704reserva WHERE ID_RESERVA_SALA704 = '".$id."'";

	$sql_query = $server_mysql->query($sql_code) or die($server_mysql->error);

	if ($sql_query) {
		
		echo "<script language='javascript' type='text/javascript'>alert('Exclusão efetuada com sucesso!');window.location.href='Consultar_Sala704.php';</script>";

	} else {

		echo "<script language='javascript' type='text/javascript'>alert('Exclusão não efetuada.');window.location.href='Consultar_Sala704.php';</script>";

	}
?>