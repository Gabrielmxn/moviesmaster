<?php 
session_start();
if(isset($_SESSION['id'])){
	$logado = $_SESSION['login'];
	include "php/menu.php";
	//$verificador = $_SESSION['id'];
}else {
	include "php/menuDeslogado.php";
	//$verificador = "false";
}
$pesquisa = $_GET['pesquisa'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>MisterMovie - Pesquisar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<link rel="icon" href="http://localhost/novoSite/img/favicon.ico" sizes="32x32">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/footer.css">
  	<link rel="stylesheet" href="fontawesome/css/all.css" />
  	<link rel="stylesheet" href="css/style_principal.css">
</head>
<body>
	<!-- Paginação <nav aria-label="Navegação de página exemplo">
	<ul class="pagination justify-content-center">
		<li class="page-item disabled">
		    <button class="page-link" href="#" tabindex="-1">Anterior</button>
		</li>
		<li class="page-item">
			<button class="page-link" onclick="getPesquisaFilmes(1)">1</button>
		</li>
		<li class="page-item">
			<button class="page-link" onclick="getPesquisaFilmes(2)">2</button>
		</li>
		<li class="page-item">
			<button class="page-link" onclick="getPesquisaFilmes(3)">3</button>
		</li>
		<li class="page-item">
		    <button class="page-link" href="#">Próximo</button>
		</li>
		  </ul>
		</nav> -->
	<input id="pesquisar" type="hidden" value='<?= $pesquisa ?>' >
	<div class="container-fluid">
		<p class="ml-3 mt-3">Você pesquisou por "<?=$pesquisa?>"</p>
		<p class="ml-3 mt-3" id="mensagemVazia"></p>
		<div id="listaPesquisa" class="row text-left align-middle d-flex  justify-content-center justify-content-sm-center  justify-content-md-center justify-content-lg-start mx-lg-1">	
		</div>
	</div>
	<br><br>
    <?php include "php/footer.php"?>
	<script src="js/aJaxRecuperandoFilmesAPI.js"></script>
	<script src="js/ancora.js"></script>
	<script src="js/pesquisarFilmes.js"></script>
	<!--bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
 		$(document).ready(function(){ 
 		 let pesquisaKey = $('#pesquisar').val()
 		if(pesquisaKey == 'DC COMICS'){
			obterFilmesPalavraChave(849);
		}
		else if(pesquisaKey == 'MARVEL'){
			obterFilmesPalavraChave(180547);
		}
		else if(pesquisaKey == "disney"){
			$('#pesquisar').val('disney e pixar');
			getPesquisaFilmes();
		}
		else if(pesquisaKey == ""){
			$('#mensagemVazia').html('Nenhum filme foi encontado');
		}
		else {
			getPesquisaFilmes();
		}
 		  })
 	</script>
</body>
</html>