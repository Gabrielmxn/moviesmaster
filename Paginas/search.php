<?php 
include "../php/sessao.php";
include "../php/menu.php";
$pesquisa = $_GET['pesquisa'];
if($pesquisa == 'DC COMICS'){
	$funcao = 'obterFilmesPalavraChave(849)';
}
else if($pesquisa == 'MARVEL'){
	$funcao = 'obterFilmesPalavraChave(180547)';
}
else if($pesquisa == "disney"){
	$pesquisa = 'disney e pixar';
	$funcao = 'getPesquisaFilmes()';
}

else {
	$funcao = 'getPesquisaFilmes()';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="icon" href="http://localhost/mistermoveis/img/favicon.ico" sizes="32x32">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
  	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
  	<link rel="stylesheet" href="../css/style_principal.css">
</head>
<body onload="<?= $funcao ?>">
	
	<input id="pesquisar" type="hidden" value='<?= $pesquisa ?>' >

	<div class="container-fluid" >
		<p class="ml-3 mt-3">Você pesquisou por "<?= $pesquisa ?>"</p>
		<div id="listaPesquisa" class="row text-left align-middle d-flex justify-content-left ml-2 mr-2">	
		</div>
	</div>

	<script src="../js/ajaxFilmes.js"></script>
	<script src="../js/ancora.js"></script>
	<script src="../js/obterFilmesKey.js"></script>
	<!--bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>