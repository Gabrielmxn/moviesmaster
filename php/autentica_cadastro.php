
<?php
	
	



  	try {
			$dsn = "mysql:host=localhost;dbname=mistermovie";
			$usuario = "root";
			$senha = '';

			$conexao = new PDO($dsn, $usuario, $senha);
		
			$query = "select * from usuario ";
			$query .= "WHERE nome = :usuario";

			$stmt = $conexao -> prepare($query);
			$stmt->bindValue(':usuario', $_POST['novoUsuario']);
			$stmt->execute();
			$resultado = $stmt->fetch();
			echo "<pre>";
			print_r($resultado);
			echo "</pre>";

			if(!$resultado){
				if($_POST['novaSenha'] == $_POST['novaSenha2']){
					echo "cadastrado com sucesso";
					$conexao = new PDO($dsn, $usuario, $senha);
					$query = "insert into usuario(nome, senha)";
					$query .= "values(:novousuario, :senha)";

					$stmtt = $conexao -> prepare($query);
					$stmtt->bindValue(':novousuario', $_POST['novoUsuario']);
					$stmtt->bindValue(':senha', $_POST['novaSenha']);
					$stmtt->execute();
					$resultado = $stmt->fetch();
					header('location:../Paginas/login.php');
					
				}
				else {
					echo "senha diferente";
					header('location:../Paginas/cadastro.php?erro=senhadusuario');
				}
			}
			else {
				header('location:../Paginas/cadastro.php?erro=exitusuario');
			}
			
			
		
		
		
	}
		catch(PDOExpeption $e){
			
		}
	
	
  
 





	

?>


