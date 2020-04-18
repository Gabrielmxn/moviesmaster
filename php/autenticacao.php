
<?php
	
	session_start();
	if(!empty($_POST['usuario']) && !empty($_POST['senha'])){
			$dsn = "mysql:host=localhost;dbname=mistermovie";
			$usuario = "root";
			$senha = '';


		try {
			$conexao = new PDO($dsn, $usuario, $senha);

			$query = "select * from usuario where ";
			$query .= "nome = :usuario ";
			$query .= "AND senha = :senha ";

			$stmt = $conexao -> prepare($query);
			$stmt->bindValue(':usuario', $_POST['usuario']);
			$stmt->bindValue(':senha', $_POST['senha']);
			$stmt->execute();

			$resultado = $stmt->fetch();
			echo "<pre>";
			print_r($resultado);
			echo "</pre>";
			echo 'teste';
			
			
			if($resultado == ""){
				unset ($_SESSION['id']);
				unset ($_SESSION['login']);
				unset ($_SESSION['senha']);
				header('location:../Paginas/login.php');
			}else{
				echo "não foi";
				$_SESSION['id'] = $resultado['idUsuario'];
				$_SESSION['login'] = $_POST['usuario'];
				$_SESSION['senha'] = $_POST['senha'];
				header('location:../Paginas/index.php');
			}
		}

		catch(PDOExpeption $e){
			
		}
	}
	else {
			unset ($_SESSION['id']);
			unset ($_SESSION['login']);
			unset ($_SESSION['senha']);
			header('location:../Paginas/login.php');
	}



?>