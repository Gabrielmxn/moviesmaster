<?php 
//echo "<pre>";
//print_r($_GET);
//echo "</pre>";
include "../php/sessao.php";
include "../php/menu.php";
$idDoFilme = $_GET['idFilme'];

?>


<!DOCTYPE html>
<html>
<head>
	<title>MisterMoveis</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style_principal.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<link rel="icon" href="http://localhost/mistermoveis/img/favicon.ico" sizes="32x32">
 	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
 	<style type="text/css">
 		.btn {
		  display:block;
		  height: 50px;
		  width: 50px;
		  border-radius: 50%;
		 background-color: #000;
		  
		}

		.clear {
			clear: both;
		}

		.row {
 			background-color: rgba(1, 1, 1, 0.7);
 			
 			
 		}
 		
 		.container-fluid {
 			height: 90%;
 		}
 		.row  {
 			height: 100%;
 		}
 	</style>
</head>
<body onload="getDoFilmes()">
	<!-- Colocando os ID dos filmes dentro do value -->
	<input id="valor" type="hidden" value='<?= $idDoFilme ?>' >
	<div class="container listFilmes" id="lista">
	</div>
	<div>dawdwad</div>

	<script src="../js/filmeindividual.js"></script>
	<script src="../js/requisicaoAjax.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>