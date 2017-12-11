<?php
	include("ConexaoBD.php");

	$id = intval($_GET['id_controle']);

	$sql_code = "DELETE FROM cadastro_controle_tablet WHERE ID_CONTROLE = '".$id."'";

	$sql_query = $server_mysql->query($sql_code) or die($server_mysql->error);

	if ($sql_query) {
	 	
		echo "<script language='javascript' type='text/javascript'>alert('Exclusão efetuada com sucesso!');window.location.href='Consultar_Controle-usu-tablets.php';</script>";

	 } else {

	 	echo "<script language='javascript' type='text/javascript'>alert('Exclusão não efetuada.');window.location.href='Consultar_Controle-usu-tablets.php';</script>";

	 }
?>