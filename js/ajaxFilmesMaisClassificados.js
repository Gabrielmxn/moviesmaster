

function getFilmesMaisClassificados() {

	var recuperarIdGenero = [];
	//array de meses
	var meses = [
	  "janeiro",
	  "fevereiro",
	  "março",
	  "abril",
	  "maio",
	  "junho",
	  "julho",
	  "agosto",
	  "setembro",
	  "outubro",
	  "novembro",
	  "dezembro"
	];



	let xmlHttp = new XMLHttpRequest();

	//buscar  API de filmes mais populares;
	xmlHttp.open('GET', 'https://api.themoviedb.org/3/movie/top_rated?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BR&page=1&region=BR');

		xmlHttp.onreadystatechange = () => {
			//verificando o status e o state da API.
			if(xmlHttp.readyState == 4 & xmlHttp.status == 200){
				let XMLFilmes = xmlHttp.responseText; 
				let jsonFilmes = JSON.parse(XMLFilmes)
				console.log("aqui")
				console.log(jsonFilmes)
				for(let i = 0; i <= 8; i++){	
					let item = jsonFilmes['results'][i]

					let a = document.createElement('a');
					a.href = "listaGet.php?idFilme=" + item.id;

					let img = document.createElement('img');
					img.className = "item round float-left";
					img.src = 'https://image.tmdb.org/t/p/original' + item.poster_path;
					console.log(item.poster_path);

					a.appendChild(img);
					
					

					//Adicionando a árvore a cima para ser filha da div com id = lista
					document.getElementById('listaMaisClassificados').appendChild(a);
			
			}

			//Tratamento do erro 401/404
			if(xmlHttp.readyState == 4 & xmlHttp.status == 401 || xmlHttp.status == 404){
			
			}
		}
	
	//enviado a requisição

	

}

xmlHttp.send();

}


