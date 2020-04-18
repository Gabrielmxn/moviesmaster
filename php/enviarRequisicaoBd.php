<?php
	
	include "sessao.php";



  	try {
  			
			$dsn = "mysql:host=localhost;dbname=mistermovie";
			$usuario = "root";
			$senha = '';

			$conexao = new PDO($dsn, $usuario, $senha);
			
			$query = "select * FROM usuario_filmes ";
			$query .= "WHERE idFilmes = :idFilme AND idUsuario = :usuario";

			$stmt = $conexao -> prepare($query);
			$stmt->bindValue(':usuario', $_SESSION['id']);
			$stmt->bindValue(':idFilme', $_POST['idFilme']);
			$stmt->execute();
			$resultado = $stmt->rowCount();
			echo "valor do resultado " . $resultado;
			

			if($resultado === 0){
				echo "Filme não está na sua lista";
				
				$conexao = new PDO($dsn, $usuario, $senha);
				
			
				$query = "select * FROM filmes";
				$query .= "WHERE idFilmes = :idFilmes";
				$stmt = $conexao -> prepare($query);
				$stmt->bindValue(':idFilmes', $_POST['idFilme']);
				$stmt->execute();
				$resultado = $stmt->fetchColumn();
				echo "<pre>";
				print_r($resultado);
				echo "</pre>";
					if($resultado > 0){
						echo "Já tem filme no BANCO DE DADOS";
						$conexao = new PDO($dsn, $usuario, $senha);
						$query = "insert into usuario_filmes(idFilmes, idUsuario, idStatus)";
						$query .= "values(:idFilme,:idusuario,1)";
						$stmtt = $conexao -> prepare($query);
						$stmtt->bindValue(':idFilme', $_POST['idFilme']);
						$stmtt->bindValue(':idusuario', $_SESSION['id']);
						$stmtt->execute();

					}
					else {
						echo "Não tem no banco de dados";
						$conexao = new PDO($dsn, $usuario, $senha);
						$query = "insert into filmes(idFilmes, nome)";
						$query .= "values(:idFilmes, :tituloFilme)";
						$stmt = $conexao -> prepare($query);
						$stmt->bindValue(':idFilmes', $_POST['idFilme']);
						$stmt->bindValue(':tituloFilme', $_POST['titulo']);
						$stmt->execute();

						
						$conexao2 = new PDO($dsn, $usuario, $senha);
						$query1 = "insert into usuario_filmes(idFilmes, idUsuario, idStatus)";
						$query1 .= "values(:idFilme,:idusuario,1)";
						$stmt1 = $conexao2 -> prepare($query1);
						$stmt1 ->bindValue(':idFilme', $_POST['idFilme']);
						$stmt1 ->bindValue(':idusuario', $_SESSION['id']);
						$stmt1 ->execute();
						echo $_SESSION['id'];
					}

				
					
					
			}
				else {
					echo "o filme já está na sua lista";
					//header('location:../Paginas/cadastro.php?erro=senhadusuario');
				}
			
			
			
		
		
		
	}
		catch(PDOExpeption $e){
			
		}
	
	
  
 





	

?>


