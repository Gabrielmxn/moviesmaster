
function getMelhoresFilmes() {
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


	let xmlHttp = [];
	xmlHttp[0] = new XMLHttpRequest();
	xmlHttp[1] = new XMLHttpRequest();
	//buscar  API
	xmlHttp[0].open('GET', 'https://api.themoviedb.org/3/trending/movie/week?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BR');
	xmlHttp[1].open('GET', 'https://api.themoviedb.org/3/genre/movie/list?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BR');
	//Pecorrendo o array xmlHttp
	for(let o in xmlHttp){	
		xmlHttp[o].onreadystatechange = () => {
			//verificando o status e o state da API.
			if(xmlHttp[0].readyState == 4 & xmlHttp[0].status == 200 & xmlHttp[1].readyState == 4 & xmlHttp[1].status == 200){
				console.log("ready " + xmlHttp.readyState);
				if(document.getElementById("lista")){
					console.log("estamos dentro do IF")
					let elemento = document.getElementById("lista");
					while (elemento.firstChild) {
						console.log("estamos dentro do while");
					  	elemento.removeChild(elemento.firstChild);
					}
				}

				//Criando um objeto com o response do json
				let XMLFilmes = xmlHttp[0].responseText; 
				let XMLGeneros = xmlHttp[1].responseText;
				let jsonGeneros = JSON.parse(XMLGeneros)
				let jsonFilmes = JSON.parse(XMLFilmes)
				console.log(jsonFilmes)
				console.log(jsonGeneros)
				let m = ""
				//pecorrendo o objeto e recuperando os seus valores.
				for(let i in jsonFilmes['results']){
					let item = jsonFilmes['results'][i]
					//criando uma linha (boostrap - grid)
					let divRow = document.createElement('div');
					let background = item.backdrop_path;
					divRow.className = 'row mt-5 p-0';
					//divRow.style = "background:  url(https://image.tmdb.org/t/p/w500" + background + "); background-repeat: no-repeat; background-size: cover"
					divRow.id = "pagina " + i;

					//criando uma coluna (bootstrap - grid)
					let divCol2 = document.createElement('div');
					divCol2.className = 'col col-5 p-5 align-self-start' 

					let divCol = document.createElement('div');
					divCol.className = 'col col-7  align-self-center'
					//colocar imagem de fundo - background em cada linha.
					//let divColOver = document.createElement('div');
					//divColOver.className = 'overlay'
					//divColOver.src = 'https://image.tmdb.org/t/p/w500/hreiLoPysWG79TsyQgMzFKaOTF5.jpg' 
					//Titulo do filme
					let p1 = document.createElement('p')
					p1.innerHTML = "<strong id=titulo" + i + ">" + item.title + "</strong> " 
					p1.className = "h2 text-center"
					
					//resumo do filme
					let p2 = document.createElement('p')
					
					if(item.overview){
						p2.innerHTML = '<strong>Sinopse</strong> <br> <span id=sinopse' + i + '>' + item.overview + '</span>'
					}
					else {
						p2.innerHTML = "<strong>Resumo</strong> Não temos uma sinopse em Português do Brasil. Você pode ajudar a ampliar o nosso banco de dados adicionando uma." 
					}
					//gênero do filme - id
					let generos = ""
					for(let g in item.genre_ids){
						console.log("Estou dentro do Genero");
						if(generos){
							generos += ", "
						}
						idFilmeGenero = item.genre_ids[g]
						for(let p in jsonGeneros.genres){
							let idGenero = jsonGeneros.genres[p].id;
						
							if(idGenero == idFilmeGenero){
								console.log("Entrou aqui");
								generos += jsonGeneros.genres[p].name
							}
						}				
					}
					let p3 = document.createElement('p')
					
					p3.innerHTML = "<strong>Gênero</strong><span  id=genero" + i + "> " + generos + "</span>"
				
		
					//data de lançamento
					let p5 = document.createElement('p')
					let datadelancamento = item.release_date;
					//quebrando string
					let ano = datadelancamento.substr(0, 4);
					let mes = datadelancamento.substr(5, 2);
					let dia = datadelancamento.substr(8, 2);
					console.log("ano " + ano);
					console.log("mes " + mes);
					if(mes){
						mes = meses[mes-1]
					}
					console.log("dia " + dia);
					p5.innerHTML = '<strong>Data de lançamento</strong><br> <span id=data' + i + '>' +  dia + ' de ' + mes + '  ' + ano + '</span>'
					let hr = document.createElement('hr')
					//recuperando o poster/imagem do filme
					let img = document.createElement('img')
					if(item.poster_path){
						img.src = "https://image.tmdb.org/t/p/w500" + item.poster_path
						img.className = "img-fluid"
					}else{
						img.src = ""
						img.className = "img-fluid"
					}

					let idFilme = document.createElement('input');
					idFilme.id = "idFilme" + i;
					idFilme.value = item.id
					idFilme.type = "hidden";
					//adicionando o botão para enviar os filmes para lista 
					let botao = document.createElement('button');
					botao.id = "botao";
					botao.className = "btn btn-success"
					botao.innerHTML = "Enviar";
					botao.onclick = function() {enviar(i)}

					

					//Criando a árvore do DOM
					//divRow.appendChild(divColOver);
					divRow.appendChild(divCol2);
					divRow.appendChild(divCol);
					divCol2.appendChild(img)
					divCol.appendChild(p1)
					divCol.appendChild(p2)
					divCol.appendChild(p3)
					divCol.appendChild(p5)
					divCol.appendChild(idFilme)
					divCol.appendChild(botao)
					

					//Adicionando a árvore a cima para ser filha da div com id = lista
				
					document.getElementById('lista').appendChild(divRow);
					
					
				}
			
			}
			//Tratamento do erro 401/404
			if(xmlHttp.readyState == 4 & xmlHttp.status == 401 || xmlHttp.status == 404){
				//removendo a imagem caso tenha.
				if(document.getElementById("lista")){
					let elemento = document.getElementById("lista");
					while (elemento.firstChild) {
						console.log("estamos dentro do while");
					  	elemento.removeChild(elemento.firstChild);
					}	
				}
				//adicionando a imagem de erro
				let img2 = document.createElement('img')
				img2.src = "404erro.png"
				img2.className =  "rounded mx-auto d-block"
				document.getElementById('lista').appendChild(img2);
			}
		}
	}
	//enviado a requisição
	xmlHttp[0].send();
	xmlHttp[1].send();

}


