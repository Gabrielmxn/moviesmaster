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
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>