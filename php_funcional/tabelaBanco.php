<?php 

class TabelaBanco {
	private $banco;
	
	public function __construct($listaBanco){
			$this->banco = $listaBanco;		
	}

	public function nomeBanco(){
		if($this->banco == 'lista'){
			return 'usuario_filmes';
		}
		else if($this->banco == 'favoritos') {
			return 'usuario_favoritos';
			
		}
		else if($this->banco == 'interesses'){
			return 'usuario_interesses';
		
		}else {
			echo 'diferente';
		}
	}
}	
?>