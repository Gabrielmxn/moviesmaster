

function getPesquisaFilmes() {
	let pes = document.getElementById("pesquisar").value
	document.getElementById("search").value = " ";
	
	//buscar  API
	for(let h = 1; h<=2; h++){
		let xmlHttp = new XMLHttpRequest();
	xmlHttp.open('GET', 'https://api.themoviedb.org/3/search/movie?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BRS&query=' + pes + '&page=' + h +'&include_adult=false');

	console.log("Valor de H: " + h);
	//Pecorrendo o array xmlHttp
		xmlHttp.onreadystatechange = () => {
			//verificando o status e o state da API.
			if(xmlHttp.readyState == 4 & xmlHttp.status == 200){			
				//Criando um objeto com o response do json
				let XMLFilmes = xmlHttp.responseText; 
				let jsonFilmes = JSON.parse(XMLFilmes);
				console.log(jsonFilmes)
				//console.log(jsonGeneros)
				let m = ""
				//Criando uma coluna para outras informações
				for(let i in jsonFilmes['results']){
					let item = 	jsonFilmes['results'][i]
					let a = document.createElement('a');
					let img = document.createElement('img')
					if(item.poster_path !== null){
						a.href = "filmeInfo.php?idFilme=" + item.id
						img.className = "item round float-left";
						img.src = "https://image.tmdb.org/t/p/original" + item.poster_path
						//Criando a árvore do DOM
						a.appendChild(img);
						document.getElementById('listaPesquisa').appendChild(a);
					}
	

				
					
			}
				
			
			}

			//Tratamento do erro 401/404
			if(xmlHttp.readyState == 4 & xmlHttp.status == 401 || xmlHttp.status == 404){
				
		}
	}
	
	//enviado a requisição
	xmlHttp.send();

	

}


}








