<?php
	include("ConexaoBD.php");
	include("desabilita_erros.php");

	$sql_code = "SELECT * FROM cadastro_controle_tablet";

	$sql_query = $server_mysql->query($sql_code) or die($server_mysql->error);

	$linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC);

	$select_turma[''] = "";
	$select_turma['fundamental_1'] = "Fundamental I";
	$select_turma['fundamental_2'] = "Fundamental II";
	$select_turma['fundamental1_2'] = "Fundamental I e II";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Consultar - Controle de Usuários de Tablets</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="_css/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="_css/Estilo_Controle-usu-tablets.css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<h1 class="titulo-form">Consultar - Controle de Usuários de Tablets</h1>

<a class="ancora-voltar" href="menu.php">Voltar ao menu</a>

<div class="data-grid-controle-usu-tablets">

	<table class="datagrid">
		<thead>
			<tr>
				<th>ID</th>
				<th>Número do Tablet</th>
				<th>Nome do Usuário</th>
				<th>Turma</th>
				<th>Ação</th>
			</tr>

			<?php

			do {

			?>

		</thead>
		<tbody>
			<tr>
				<td><?php echo $linha['ID_CONTROLE']; ?></td>
				<td><?php echo $linha['NUM_TABLET']; ?></td>
				<td><?php echo $linha['NOME_USUARIO']; ?></td>
				<td><?php echo $select_turma[$linha['TURMA']]; ?></td>
				<td>
					<a href="Alterar_Controle-usu-tablets.php?id_controle=<?php echo $linha['ID_CONTROLE']; ?>">Alterar</a> |
					<a href="javascript: if(confirm('Tem certeza que deseja excluir esse registro?'))window.location.href='Excluir_Controle-usu-tablets.php?id_controle=<?php echo $linha['ID_CONTROLE']; ?>';">Excluir</a>
				</td>
			</tr>

			<?php } while($linha = mysqli_fetch_array($sql_query, MYSQL_ASSOC)); ?>

		</tbody>	
	</table>

</div>

</body>
</html>