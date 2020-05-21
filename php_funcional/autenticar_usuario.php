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
				header('location:login.php?mensagem=errousuario');
			}
		}

		catch(PDOExpeption $e){
					echo '<p>'.$e->getMessege().'</p>';
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
					$query = "insert into usuario(nome, senha)";
					$query .= "values(:novousuario, :senha)";
					$stmtt = $this->conexao->prepare($query);
					$stmtt->bindValue(':novousuario', $this->usuario);
					$stmtt->bindValue(':senha', $this->senha);
					$stmtt->execute();
					header("location:login.php?mensagem=cadastroSucesso");
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
			echo '<p>'.$e->getMessege().'</p>';
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
					header("location:login.php?mensagem=trocarSenhaSucesso");
					exit;
				}
				else{
					//senha é diferente
					header("location:trocarSenhaUsuario.php?erro=nerro");
				}
			}
			catch(PDOExpeption $e){
				echo '<p>'.$e->getMessege().'</p>';
			}	
		}
		else{
			header("location:trocarSenhaUsuario.php?erro=serro");
		}		
	}

	public function sessionDestroyDoUsuario(){
		session_start();
		session_destroy();
		header("location:index.php");
		exit;
	}
}

?>