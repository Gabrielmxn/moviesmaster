<?php
//include "../php/sessao.php";
session_start();
if(isset($_SESSION['id'])){
	$logado = $_SESSION['login'];
	include "php/menu.php";
	//$verificador = $_SESSION['id'];
}else {
	include "php/menuDeslogado.php";
	//$verificador = "false";
}
include "php/carousel.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style_principal.css">
 	<link rel="stylesheet" href="fontawesome/css/all.css">
 	<link rel="stylesheet" href="css/footer.css">
 	<link rel="icon" href="http://localhost/novoSite/img/favicon.ico" sizes="32x32"/>
 	<title>Home - MisterMovie</title>
</head>
<body>
	<div class="container-fluid mt-3 colorDiv">
		<h3 class="ml-3 mt-3">Melhores filmes</h3>
		<div  class="row text-left align-middle d-flex  justify-content-center justify-content-sm-center  justify-content-md-center justify-content-lg-start mx-lg-1" id="listaMelhoresFilmes">	
		</div>
		<h3 class="ml-3">Filmes mais classificados</h3>
		<div  class="row text-left align-middle d-flex  justify-content-center justify-content-sm-center  justify-content-md-center justify-content-lg-start mx-lg-1" id="listaMaisClassificados">		
		</div>
		<h3 class="ml-3">Próximos nos cinemas</h3>
		<div  class="row text-left align-middle d-flex  justify-content-center justify-content-sm-center  justify-content-md-center justify-content-lg-start mx-lg-1" id="listaNosCinemas">	
		</div>
		<br><br>
	</div>
	<?php include "php/footer.php"?>
	<script src="js/aJaxRecuperandoFilmesAPI.js"></script>
	<script src="js/ancora.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
 		$(document).ready(function(){ 
 			getFilmesPrincipais();
 		})   
 	</script>
</body> 
</html>