<?php
//Definir servidor, usuário, senha e banco de dados
	define('BD_SERVER','localhost');
	define('BD_USER','root');
	define('BD_PASSWORD','');
	define('BD_DATABASE','bd_agenda');

//Fazendo conexão com o banco de dados
	$server_mysql = mysqli_connect(BD_SERVER, BD_USER, BD_PASSWORD, BD_DATABASE);

//Se houver algum erro na conexão, será retornado um aviso e o sistema vai parar
	if (mysqli_connect_errno($server_mysql)) {
		echo "verifique os dados do servidor.";

		die();   //Encerra a conexão
	}
?>