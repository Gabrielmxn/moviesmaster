<?php 
if(!isset ( $_GET['idFilme'])){
    header("Location:index.php");
}else {
    session_start();
	if(isset ($_SESSION['id'])){
		$listaVerificar = $_SESSION['filmeNaLista'];
	  	$logado = $_SESSION['login'];
	  	$idUsuario = $_SESSION['id'];
	  	include "php/menu.php";
	}else{
	  	$listaVerificar = "false";
	  	$idUsuario = "deslogado";
	  	include "php/menuDeslogado.php";
	}
}
$idDoFilme = $_GET['idFilme'];

?>


<!DOCTYPE html>
<html>
<head>
	<title>MisterMoveis</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style_principal.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<link rel="icon" href="http://localhost/novoSite/img/favicon.ico" sizes="32x32">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/filmeInfoStyle.css">
    <link rel="stylesheet" href="fontawesome/css/all.css" />
 	
</head>
<body onload="getDoFilmes()">
	<!-- Colocando os ID dos filmes dentro do value -->
	<input id="valor" type="hidden" value='<?= $idDoFilme ?>' >
   	<input id="listaVerificar" type="hidden" value='<?= $listaVerificar ?>' >
   	<input id="idUsuario" type="hidden" value='<?= $idUsuario ?>' >
	<div class="container listFilmes" id="lista">
	</div>
    <br>
     
   	<?php include "php/footer.php"?>
	<script src="js/filmeIndividual.js"></script>
	<script src="js/pesquisarFilmes.js"></script>
	<script src="js/ancora.js"></script>
	<script src="js/requisicaoAjax.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script> 
</body>
</html>