<?php
	include "../php/menu.php";

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
 		.borde {
 			border: 1px solid red;
 			
 		}
 		.img {
 			
 			width: 50px;
 		}
 		.listFilmes {
 			
 			background:  url(../img/starb.jpg) center center;
 			background-size: cover;
 		}
 		
 		body {
 			/* mobile font-size: 13px; */
 		}
 	</style>
</head>
<body>
	<!-- Colocando os ID dos filmes dentro do value -->
	<input id="valor" type="hidden" value='' >
	<div class="container-fluid listFilmes" id="lista">
	
		<div class="row mt-0 p-0">
		
			<div class="col-4 col-sm-2 col-md-2 col-lg-3 p-0 m-0 align-self-center img">
				<img src="../img/teste.jpg" class="img-fluid p-0 my-0 rounded mx-auto d-block">
			</div>
			<div class="col-8 col-sm-10 col-md-10 col-lg-9 align-self-center">
				<p class="h2 text-center">
					<strong>Bad Boys Para Sempre</strong>
				</p>
				<p>
					<strong>Sinopse</strong>
					<br>
					<span>
						Armando é um assassino de sangue frio com uma natureza cruel e provocadora. Ele está comprometido com o trabalho do cartel e é enviado por sua mãe para matar Mike (Smith). Nuñez assumirá o papel de Rita, psicóloga criminal durona e engraçada que é recém-nomeada chefe da AMMO e é ex-namorada de Mike.
					</span>
				</p>
				<p>
					<strong>Gênero</strong>
					<br>
					<span>Ação, terror, suspense</span>
				</p>
				<p>
					<strong>Data de lançamento</strong>
					<br>
					<span>15 de Janeiro 2020</span>
				</p>
			</div>
			</div>
		

	</div>

	<script src="../js/filmeindividual.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>