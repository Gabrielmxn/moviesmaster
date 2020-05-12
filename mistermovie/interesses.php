<?php 
	include "php/sessao.php";
	include "php/menu.php";
	include "mistermovies_controller.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Página que vai lista os filmes do usuário -->
		<title>Interesses - MisterMovie</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style_principal.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="icon" href="http://localhost/novoSite/img/favicon.ico" sizes="32x32">
		<link rel="stylesheet" href="fontawesome/css/all.css" />
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/footer.css">
	</head>
<body>
	<input id="valor" type="hidden" value='<?=$_SESSION['filmesInteresses']?>' >
	<input id="pagQuant" type="hidden" value='0' >
	<div class="container-fluid">
		<h3 class="my-3">Minha lista de interesses</h3>
		<div id="listFilmes" class="row text-left align-middle d-flex  justify-content-center justify-content-sm-center  justify-content-md-center justify-content-lg-start mx-lg-1">	
		</div>
	</div>
	<button id="botaoMostrarMaisLista" class="d-block btn btn-primary btn-block my-2">Mostrar mais</button>
    <br>
    <br>
	<?php include "php/footer.php"?>
	<script src="js/ancora.js"></script>
	<script src="js/aJaxRecuperandoFilmesAPI.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$('#botaoMostrarMaisLista').click( () => {
			getIdFilmes();
		})
 		$(document).ready(function(){ 
 			getIdFilmes();
 		})   
 	</script>
</body >
</html>