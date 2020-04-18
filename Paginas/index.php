<?php

include "../php/sessao.php";
include "../php/menu.php";
include "../php/carousel.php";

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
 	 <link rel="stylesheet" href="../css/footer.css">
	
</head>
<body onload="getFilmesPopulares(); getFilmesMaisClassificados(); getFilmesCinemas();">
	
	<div class="container-fluid mt-3">
		<h3 class="ml-3">Melhores filmes</h3>
		<div  class="row text-left align-middle d-flex justify-content-left ml-2 mr-2" id="listaMelhoresFilmes">	
		</div>


		<h3 class="ml-3">Filmes mais classificados</h3>
		<div  class="row text-center align-middle d-flex justify-content-left ml-2 mr-2" id="listaMaisClassificados">	
			
		</div>
		<h3 class="ml-3">Próximos nos cinemas</h3>
		<div  class=" borde row text-center align-middle d-flex justify-content-left ml-2 mr-2" id="listaNosCinemas">	
		</div>
		<br><br>
	</div>

	<? include "../php/footer.php"?>
	<script src="../js/ajaxFilmesPopulares.js"></script>
	<script src="../js/ancora.js"></script>
	<script src="../js/ajaxFilmesMaisClassificados.js"></script>
	<script src="../js/ajaxEmbreveNosCinemas.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js"></script>
</body> 
</html>