function getDoFilmes() {
	let idDoFilme = document.getElementById("valor").value
	console.log(idDoFilme);

	let xmlHttp = new XMLHttpRequest();
	//buscar  API
	xmlHttp.open('GET', 'https://api.themoviedb.org/3/movie/' + idDoFilme + '?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BR');
	
	//Pecorrendo o array xmlHttp
		xmlHttp.onreadystatechange = () => {
			//verificando o status e o state da API.
			if(xmlHttp.readyState == 4 & xmlHttp.status == 200){			
				//Criando um objeto com o response do json
				let XMLFilmes = xmlHttp.responseText; 
				let jsonFilmess = JSON.parse(XMLFilmes);
				console.log(jsonFilmess)
				

				
			}

			//Tratamento do erro 401/404
			if(xmlHttp.readyState == 4 & xmlHttp.status == 401 || xmlHttp.status == 404){
				
		}
	}
	//enviado a requisição
	xmlHttp.send();

	


}











