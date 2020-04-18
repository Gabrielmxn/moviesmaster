
<?php
	
	include "sessao.php";


 if($senha == $_POST['senhaUsuario']){
  	try {
  		if($_POST['novasenha1'] === $_POST['novasenha2'] && $_POST['novasenha1'] !== "" && $_POST['novasenha2'] !== ""){
  			echo "nova senha correta";
			$dsn = "mysql:host=localhost;dbname=mistermoveis";
			$usuario = "root";
			$senha = '';

			$conexao = new PDO($dsn, $usuario, $senha);

			$query = "update usuario set ";
			$query .= "senha = :senha ";
			$query .= "WHERE idUsuario = " . $_SESSION['id'];

			$stmt = $conexao -> prepare($query);
			$stmt->bindValue(':senha', $_POST['novasenha2']);
			$stmt->execute();

			$resultado = $stmt->fetch();
			echo "<pre>";
			print_r($resultado);
			echo "</pre>";
			session_destroy();
			header("location:../Paginas/login.php");
			exit;
			
		}
		else{
			header("location:../Paginas/cadastro1.php?erro=nerro");
		}	
		
	}
		catch(PDOExpeption $e){
			
		}
	
	}else {
		header("location:../Paginas/cadastro1.php?erro=serro");
	}
  
 





	

?>