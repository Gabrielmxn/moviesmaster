<?php
	require "../../php_funcional/conexao.php";
	require "../../php_funcional/autenticar_usuario.php";
	require "../../php_funcional/filmesLista.php";
	require "../../php_funcional/filmesFavoritos.php";
	require "../../php_funcional/filmesInteresses.php";
	$conexao = new Conexao();
	$filme = "";
	if($_POST){
		if($_POST['controle'] == 1){
			session_start();
			$listaFilmes = new ListaFilmes($conexao, $_POST['idFilme'], $_SESSION['id'], $_POST['titulo']);
			$listaFilmes->inserirFilmes();	
			//funciona
		}
		else if($_POST['controle'] == 2){
			session_start();
			$listaFilmes = new ListaFilmes($conexao, $_POST['idFilme'], $_SESSION['id'], $_POST['titulo']);
			$listaFilmes->excluirFilmes();
			//ainda não funciona
		}
		else if($_POST['controle'] == 3){
			session_start();
			$listaFilmesFavoritos = new ListaFavoritos($conexao, $_POST['idFilme'], $_SESSION['id'], $_POST['titulo']);
			$listaFilmesFavoritos->inserirFilmesFavoritos();	
			//funciona
		}
		else if($_POST['controle'] == 4){
			$usuario = new Usuario($conexao, $_POST['usuario'], $_POST['senha'], $_POST['senhaConfirmada1'], $_POST['senhaConfirmada2']);
			$usuario->cadastrarUsuario();
			//funcionando
		}
		else if($_POST['controle'] == 5){
			session_start();
			$usuario = new Usuario($conexao, "", $_POST['senha'], $_POST['senhaConfirmada1'], $_POST['senhaConfirmada2']);
			$usuario->trocarSenhaDoUsuario();
			//funciona	
		}
		else if($_POST['controle'] == 6){
			$usuario = new Usuario($conexao, $_POST['usuario'], $_POST['senha'], "", "");
			$usuario->autenticarUsuario();
			//funciona
		}
		else if($_POST['controle'] == 7){
			session_start();
			$listaFilmesFavoritos = new ListaFavoritos($conexao, $_POST['idFilme'], $_SESSION['id'], $_POST['titulo']);
			$listaFilmesFavoritos->excluirFilmesFavoritos();
			//ainda não funciona
		}
		else if($_POST['controle'] == 8){
			session_start();
			$listaFilmesInteresses = new ListaInteresses($conexao, $_POST['idFilme'], $_SESSION['id'], $_POST['titulo']);
			$listaFilmesInteresses->inserirFilmesInteresses();	
			//funciona
		}
		else if($_POST['controle'] == 9){
			session_start();
			$listaFilmesInteresses = new ListaInteresses($conexao, $_POST['idFilme'], $_SESSION['id'], $_POST['titulo']);
			$listaFilmesInteresses->excluirFilmesInteresses();
			//ainda não funciona
		}
	}else if($_GET){
		if($_GET['controle'] == 1){
			session_start();
			$listaFilmesFavoritos = new ListaFavoritos($conexao, "", $_SESSION['id'], "");
			$_SESSION['filmesFavoritosLista'] = $listaFilmesFavoritos->recuperarFilmesFavoritos();
			header("location:favoritos.php?");
			//funciona
		}
		else if($_GET['controle'] == 2){
			session_start();
			$listaFilmesInteresses = new ListaInteresses($conexao, "", $_SESSION['id'], "");
			$_SESSION['filmesInteresses'] = $listaFilmesInteresses->recuperarFilmesInteresses();
			header("location:interesses.php?");
			//funciona
		}
		else if($_GET['controle'] == 3){
			session_start();
			$listaFilmes = new ListaFilmes($conexao, "", $_SESSION['id'], "");
			$_SESSION['filme'] = $listaFilmes->recuperarFilmes();
			header("location:listaFilmes.php?");
			//funciona
		}
		else if($_GET['controle'] == 7){
			$usuario = new Usuario($conexao, "", "", "", "");
			$usuario->sessionDestroyDoUsuario();
			//funciona
		}
		else if($_GET['controle'] == 9){
			session_start();
			$listaFilmes = new ListaFilmes($conexao, $_GET['idFilme'], $_SESSION['id'],  "");
			$listaFilmes->filmeNaLista();
			$listaFilmesFavoritos = new ListaFavoritos($conexao, $_GET['idFilme'], $_SESSION['id'],  "");
			$listaFilmesFavoritos->filmeNaListaFavoritos();
			$listaFilmesInteresses = new ListaInteresses($conexao, $_GET['idFilme'], $_SESSION['id'],  "");
			$listaFilmesInteresses->filmeNaListaInteresses();
			header("location:filmeInfo.php?idFilme=$this->idFilmes");
			//ainda não funciona*/
		}
	}
?>