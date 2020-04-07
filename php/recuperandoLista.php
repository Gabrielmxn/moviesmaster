<?php $dsn = "mysql:host=localhost;dbname=mistermoveis";
	$usuario = "root";
	$senha = '';
	$filmes = '';
	try {
		$conexao = new PDO($dsn, $usuario, $senha);

		$query = 'select * from usuario_filmes WHERE idUsuario = 2';
		

		$stmt = $conexao->query($query);
	
		$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach ($lista as $key => $value) {
			
			$filmes .= $value['idFilmes'] . " ";
			
				}
	}
		
		catch(PDOException $e){
			
		}
?>