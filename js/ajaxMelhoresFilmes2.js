
function getMelhoresFilmes() {

	



	let xmlHttp = new XMLHttpRequest();
	
	//buscar  API
	xmlHttp.open('GET', 'https://api.themoviedb.org/3/trending/movie/week?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BR');
	
	//Pecorrendo o array xmlHttp
	for(let o in xmlHttp){	
		xmlHttp[o].onreadystatechange = () => {
			//verificando o status e o state da API.
			if(xmlHttp.readyState == 4 & xmlHttp.status == 200){
				

				//Criando um objeto com o response do json
				let XMLFilmes = xmlHttp.responseText; 
				let jsonFilmes = JSON.parse(XMLFilmes)
				console.log(jsonFilmes)
				//console.log(jsonGeneros)
				let m = ""
				//pecorrendo o objeto e recuperando os seus valores.

				
					
				}
			
			}

			//Tratamento do erro 401/404
			if(xmlHttp.readyState == 4 & xmlHttp.status == 401 || xmlHttp.status == 404){
				
		}
	}
	//enviado a requisição
	xmlHttp.send();

}


