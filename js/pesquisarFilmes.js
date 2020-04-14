function getIdFilmes() {
	let idDoFilme = document.getElementById("valor").value
	let resultado = idDoFilme.split(" ");
	console.log(resultado);
	for(let i in resultado){
	let xmlHttp = new XMLHttpRequest();
	//buscar  API
	xmlHttp.open('GET', 'https://api.themoviedb.org/3/movie/' + resultado[i] + '?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BR');
	
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
				let a = document.createElement('a');
				a.href = "listaGet.php?idFilme=" + resultado[i];

				let img = document.createElement('img')
				img.className = "item round float-left";
				img.src = "https://image.tmdb.org/t/p/original" + jsonFilmes.poster_path
				//Criando a árvore do DOM
				a.appendChild(img);


				document.getElementById('listFilmes').appendChild(a);
			
			}

			//Tratamento do erro 401/404
			if(xmlHttp.readyState == 4 & xmlHttp.status == 401 || xmlHttp.status == 404){
				
		}
	}
	//enviado a requisição
	xmlHttp.send();

	}


}






