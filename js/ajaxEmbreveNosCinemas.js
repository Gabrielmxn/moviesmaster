

function getFilmesCinemas() {

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
	xmlHttp.open('GET', 'https://api.themoviedb.org/3/movie/upcoming?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BR&page=1&region=br');

		xmlHttp.onreadystatechange = () => {
			//verificando o status e o state da API.
			if(xmlHttp.readyState == 4 & xmlHttp.status == 200){
				let XMLFilmes = xmlHttp.responseText; 
				let jsonFilmes = JSON.parse(XMLFilmes)
				console.log("aqui")
				console.log(jsonFilmes)
				if(jsonFilmes !== ""){
				for(let i = 0; i <= 8; i++){	
					let item = jsonFilmes['results'][i]
					var a = document.createElement('a');
					var img = document.createElement('img');
					if(typeof item !== 'undefined'){
						a.href = "filmeInfo.php?idFilme=" + item.id;
						img.className = "item round float-left";
						img.src = 'https://image.tmdb.org/t/p/w500' + item.poster_path;
					}
					
				
					console.log(i)
					a.appendChild(img);
					
					

					//Adicionando a árvore a cima para ser filha da div com id = lista
					document.getElementById('listaNosCinemas').appendChild(a);
				}
			}
				else {
					document.getElementById("mensagem").innerHTML = "Não existe filmes próximos nos cinemas";
				}
			

			//Tratamento do erro 401/404
			if(xmlHttp.readyState == 4 & xmlHttp.status == 401 || xmlHttp.status == 404){
			
			}
		}
	
	//enviado a requisição

	

}

xmlHttp.send();

}


