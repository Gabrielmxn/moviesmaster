<?php 
	include "php/recuperandoLista.php"
	
?>
<!DOCTYPE html>

<html>
<head>
	<!-- Página que vai lista os filmes do usuário -->
	<title>Lista - Usuário</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style_principal.css" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="css/stule_lista.css">
</head>
<body onload="getIdFilmes()">
	<!-- Colocando os ID dos filmes dentro do value -->
	<input id="valor" type="hidden" value='<?= $filmes ?>' >

	<div class="container" >
		<div id="listFilmes" class="row text-center align-middle borde d-flex justify-content-center">	
		</div>
	</div>
	<script src="js/pesquisarFilmes.js"></script>
</body >
</html>