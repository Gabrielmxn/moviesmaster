<?php 
echo "<pre>";
print_r($_GET);
echo "</pre>";
$idDoFilme = $_GET['idFilme'];

?>


<!DOCTYPE html>
<html>
<head>
	<title>MisterMoveis - Nome do Filme</title>
</head>
<body onload="getDoFilmes()">
	<!-- Colocando os ID dos filmes dentro do value -->
	<input id="valor" type="hidden" value='<?= $idDoFilme ?>' >
	<p>Recuperar filmes</p>
	<div class="container listFilmes" >
	</div>

	<script src="js/filmeindividual.js"></script>
</body>
</html>