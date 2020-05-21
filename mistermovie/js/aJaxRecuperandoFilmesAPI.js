function getFilmesPrincipais() {
	let xmlHttp = [];
	for(var i = 0; i <= 2; i++){
		xmlHttp[i] = new XMLHttpRequest();
	}
	//buscar  API de filmes mais populares;
	//RECUPERAR O MAIS POPULARES
	xmlHttp[0].open('GET', 'https://api.themoviedb.org/3/trending/movie/week?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BR');
	//MAIS CLASSIFICADO
	xmlHttp[1].open('GET', 'https://api.themoviedb.org/3/movie/top_rated?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BR&page=1&region=BR');
	//BREVE NOS CINEMAS
	xmlHttp[2].open('GET', 'https://api.themoviedb.org/3/movie/upcoming?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BR&page=1&region=br');	
	
	for(let o in xmlHttp){
		xmlHttp[o].onreadystatechange = () => {
			//verificando o status e o state da API.
			if(xmlHttp[o].readyState == 4 & xmlHttp[o].status == 200){
				let XMLFilmes = xmlHttp[o].responseText; 
				let jsonFilmes = JSON.parse(XMLFilmes);
				var divLista;
				if(o == 0){
					divLista = document.getElementById('listaMelhoresFilmes');
				}else if(o == 1){
					divLista = document.getElementById('listaMaisClassificados'); 
				}
				else if(o == 2){
					divLista =  document.getElementById('listaNosCinemas');
				}
				let item = jsonFilmes['results'];	
				for(let i in item){
					let a = document.createElement('a');
					a.href = "mistermovies_controller.php?idFilme=" + item[i].id + "&controle=9"
                    a.id = "filme";
					let img = document.createElement('img');
					img.className = "item round float-left mx-1 my-1 my-sm-1 mx-sm-1 my-md-3 mx-md-2";
					img.src = 'https://image.tmdb.org/t/p/w500' + item[i].poster_path;
					a.appendChild(img);
					//Adicionando a árvore a cima para ser filha da div com id = lista
					divLista.appendChild(a);
				}
			}
			//Tratamento do erro 401/404
			if(xmlHttp[o].readyState == 4 & xmlHttp[o].status == 401 || xmlHttp[o].status == 404){
			
			}
		}
	}

	for(let h in xmlHttp){
		xmlHttp[h].send();
	}
}

//RECUPERAR TODOS OS FILMES DE PESQUISA
function getPesquisaFilmes() {
	let nomeDoFilme = document.getElementById("pesquisar").value

	let valorPagina = $('#paginaPesquisar').val()
	var maximoPagina = " ";
	//buscar  API
	/*if(h != undefined){
		$('#listaPesquisa').empty();

	}*/document.title = nomeDoFilme + " - MisterMovie"
		let xmlHttp = new XMLHttpRequest();
		xmlHttp.open('GET', 'https://api.themoviedb.org/3/search/movie?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BRS&query=' + nomeDoFilme + '&page=' + valorPagina +'&include_adult=false');
		//Pecorrendo o array xmlHttp
		xmlHttp.onreadystatechange = () => {
			//verificando o status e o state da API.
			if(xmlHttp.readyState == 4 & xmlHttp.status == 200){			
				//Criando um objeto com o response do json
				let XMLFilmes = xmlHttp.responseText; 
				let jsonFilmes = JSON.parse(XMLFilmes);
				var maximoPagina = jsonFilmes.total_pages
				for(let i in jsonFilmes['results']){
					let item = 	jsonFilmes['results'][i]
					let a = document.createElement('a');
					let img = document.createElement('img')
					if(item.poster_path !== null){
						a.href = "mistermovies_controller.php?idFilme=" + item.id + "&controle=9"
                        a.id = "filme";
						img.className = "item round float-left mx-1 my-1 my-sm-1 mx-sm-1 my-md-3 mx-md-2";
						img.src = "https://image.tmdb.org/t/p/original" + item.poster_path
						//Criando a árvore do DOM
						a.appendChild(img);
						$('#listaPesquisa').append(a);
					}		
				}
				if(valorPagina < maximoPagina ){
					console.log('entrou no if')
					let paginaInt = parseInt(valorPagina);
					console.log(paginaInt)
					let pagina = paginaInt + 1;
					$('#paginaPesquisar').val('')
					$('#paginaPesquisar').val(pagina)
				}else {
					console.log(jsonFilmes.results.length)
					if(jsonFilmes.results.length === 0){
						$('#mensagemVazia').html('Nenhum filme encontrado.')
						$('#botaoMostrarMais').removeClass('d-block')
						$('#botaoMostrarMais').addClass('d-none')
					}
					$('#botaoMostrarMais').attr('disabled', true);
				}		
			}
			//Tratamento do erro 401/404
			if(xmlHttp.readyState == 4 & xmlHttp.status == 401 || xmlHttp.status == 404){
			//mensagem de erro	
			}
		}
		
		//enviado a requisição
		xmlHttp.send();
	}

//RECUPERAR FILMES PELO KEY
function obterFilmesPalavraChave(palavraChave) {
		let valorPagina = $('#paginaPesquisar').val()
		var maximoPagina = " ";
		console.log('key')
		let xmlHttp = new XMLHttpRequest();
		xmlHttp.open('GET', 'https://api.themoviedb.org/3/keyword/' + palavraChave + '/movies?api_key=bd9f051458a4c87fe4c873ef463542e3&page=' + valorPagina +'language=pt-BR&include_adult=false');
		//Pecorrendo o array xmlHttp
		xmlHttp.onreadystatechange = () => {
			//verificando o status e o state da API.
			if(xmlHttp.readyState == 4 & xmlHttp.status == 200){			
				//Criando um objeto com o response do json
				let XMLFilmes = xmlHttp.responseText; 
				let jsonFilmes = JSON.parse(XMLFilmes);
				//tamanho = jsonFilmes.total_pages
				//Criando uma coluna para outras informações

				var maximoPagina = jsonFilmes.total_pages
				console.log(maximoPagina)
				for(let i in jsonFilmes['results']){
					let item = 	jsonFilmes['results'][i]
					if(jsonFilmes['results'][i].length == 0){
						$('#botaoMostrarMais').addClass('d-none')
					}
					let a = document.createElement('a');
					let img = document.createElement('img')
					if(item.poster_path !== null){
						a.href = "mistermovies_controller.php?idFilme=" + item.id + "&controle=9"
                        a.id = "filme";
						img.className = "item round float-left mx-1 my-1 my-sm-1 mx-sm-1 my-md-3 mx-md-2";
						img.src = "https://image.tmdb.org/t/p/original" + item.poster_path
						//Criando a árvore do DOM
						a.appendChild(img);
						document.getElementById('listaPesquisa').appendChild(a);
					}	
				}
				if(valorPagina < maximoPagina){
					console.log('entrou no if')
					let paginaInt = parseInt(valorPagina);
					console.log(paginaInt)
					let pagina = paginaInt + 1;
					$('#paginaPesquisar').val('')
					$('#paginaPesquisar').val(pagina)
				}else {
					$('#botaoMostrarMais').attr('disabled', true);
				}		
			}
			//Tratamento do erro 401/404
			else if(xmlHttp.readyState == 4 & xmlHttp.status == 401 || xmlHttp.status == 404){		
		}
	}
	
		
		
		//enviado a requisição
		xmlHttp.send();
	}


function getIdFilmes() {
	let idDoFilme = document.getElementById("valor").value
	let transformandoIdDoFilmeArray = idDoFilme.split(" ");
	let variavelPagQuant = $('#pagQuant').val();
	variavelPagQuant = parseInt(variavelPagQuant);
	let maximoFilmes = 20 + variavelPagQuant;
	let minimoFilmes = 0 + variavelPagQuant;
	console.log(transformandoIdDoFilmeArray)
	console.log("Tamanho do array: " + transformandoIdDoFilmeArray.length)
	//for(let i in transformandoIdDoFilmeArray){
	for(let i = minimoFilmes; i < maximoFilmes; i++){	
	if(i <= transformandoIdDoFilmeArray.length){	
		let xmlHttp = new XMLHttpRequest();
		//buscar  API
		xmlHttp.open('GET', 'https://api.themoviedb.org/3/movie/' + transformandoIdDoFilmeArray[i] + '?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BR');
		//Pecorrendo o array xmlHttp
			xmlHttp.onreadystatechange = () => {
				//verificando o status e o state da API.
				if(xmlHttp.readyState == 4 & xmlHttp.status == 200){			
					//Criando um objeto com o response do json
					let XMLFilmes = xmlHttp.responseText; 
					let jsonFilmes = JSON.parse(XMLFilmes);
					//Criando uma coluna para outras informações
					let a = document.createElement('a');
					a.href = "mistermovies_controller.php?idFilme=" + transformandoIdDoFilmeArray[i] + "&controle=9"
	                a.id = "filme";
					let img = document.createElement('img')
					img.className = "item round float-left mx-1 my-1 my-sm-1 mx-sm-1 my-md-3 mx-md-2";
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
	}else{
		$('#botaoMostrarMaisLista').attr('disabled', true);
	}
	}
	let quantTotal = variavelPagQuant + 20;
	$('#pagQuant').val('');
	$('#pagQuant').val(quantTotal);
}
