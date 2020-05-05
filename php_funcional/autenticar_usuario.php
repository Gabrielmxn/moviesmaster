<?php 


class Usuario {
	private $conexao;
	private $usuario;
	private $senha;
	private $senhaConfirmada1;
	private $senhaConfirmada2;


	public function __construct(Conexao $conexao, $usuario, $senha, $senhaConfirmada1, $senhaConfirmada2){
			$this->conexao = $conexao->conectar();
			$this->usuario = $usuario;
			$this->senha = $senha;
			$this->senhaConfirmada1 = $senhaConfirmada1;
			$this->senhaConfirmada2 = $senhaConfirmada2;


	}

	public function autenticarUsuario(){
		try {
			$query = "select * from usuario WHERE ";
			$query .= "nome =  :usuario";
			$query .= " AND senha = :senha";
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':usuario',  $this->usuario);
			$stmt->bindValue(':senha', $this->senha);
			$stmt->execute();
			$resultado = $stmt->fetch();
			if($resultado){
				session_start();
				$_SESSION['id'] = $resultado['idUsuario'];
				$_SESSION['login'] = $this->usuario;
				$_SESSION['senha'] = $this->senha;
				header("location:index.php");
			}
			else{
				header('location:login.php');
			}
		}

		catch(PDOExpeption $e){
					echo $e;
		}
	}
	
	public function cadastrarUsuario(){
		try {
			$query = "select * from usuario ";
			$query .= "WHERE nome = :usuario";
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':usuario', $this->usuario);
			$stmt->execute();
			$resultado = $stmt->rowCount();
			if($resultado !== 1){
				if($this->senha == $this->senhaConfirmada1){
					echo "cadastrado com sucesso";
					$query = "insert into usuario(nome, senha)";
					$query .= "values(:novousuario, :senha)";
					$stmtt = $this->conexao->prepare($query);
					$stmtt->bindValue(':novousuario', $this->usuario);
					$stmtt->bindValue(':senha', $this->senha);
					$stmtt->execute();
					header('location:login.php?cadastro=sucesso');
				}
				else {
					header("location:cadastro.php?erro=senhadusuario");
				}
			}
			else {
				header("location:cadastro.php?erro=exitusuario");
			}
		}
		catch(PDOExpeption $e){
			echo $e;
		}
	}
	//trocar senha do usuaário
	public function trocarSenhaDoUsuario(){
		//Trocar senha
		if($_SESSION['senha'] == $this->senha){
	  		try {
	  			if($this->senhaConfirmada1 === $this->senhaConfirmada2){
					$query = "update usuario set ";
					$query .= "senha = :senha ";
					$query .= "WHERE idUsuario = " . $_SESSION['id'];
					$stmt = $this->conexao->prepare($query);
					$stmt->bindValue(':senha',$this->senhaConfirmada1);
					$stmt->execute();
					$resultado = $stmt->fetch();
					session_destroy();
					header("location:login.php?trocaSenha=sucesso");
					exit;
				}
				else{
					//senha é diferente
					header("location:trocarSenhaUsuario.php?erro=nerro");
				}
			}
			catch(PDOExpeption $e){
				echo $e;
			}	
		}
		else{
			header("location:trocarSenhaUsuario.php?erro=serro");
		}		
	}

	public function sessionDestroy(){
		session_start();
		session_destroy();
		header("location:index.php");
		exit;
	}
}

?>