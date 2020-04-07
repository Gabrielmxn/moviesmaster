//capturando o valor da largura  da tela
function tamanhoTela(){
	var ss = window.screen.availWidth;
	return ss;		
}

var noFilme = '';
function qualquerFuncaoFilme(tpesquisa){
	//Colocando o nó dentro de uma variável
	noFilme = document.getElementById("noPesquisa");
	if(document.getElementById("pesquisar").value){
		getFilmes(document.getElementById("pesquisar").value);
	}
	else if(document.getElementById("pesquisar").value == ''){
		
		//chamando a função de melhores filmes
		getMelhoresFilmes();
		//apagando o que tem dentro da variável
		noFilme.innerHTML = ""
		//Colocando um novo titulo após apagar a pesquisa
		document.getElementById("tituloPagina").innerHTML = "Melhores filmes da semana"
	}
}


function getFilmes(pesquisar) {
	//um array para recuperar o id
	var recuperarIdGenero = [];

	//um array dos meses
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
	//--FIM DO ARRAY--//
	
	//Apagando o titulo da pagina 
	document.getElementById("tituloPagina").innerHTML = ""
	
	/*//verificando se pesquisa tem algum valor
	if(document.getElementById("pesquisar").value == ''){
		//chamando a função de melhores filmes
		
		//apagando o que tem dentro da variável
		noFilme.innerHTML = ""
		//Colocando um novo titulo após apagar a pesquisa
		document.getElementById("tituloPagina").innerHTML = "Melhores filmes da semana"
	}*/
	let xmlHttp = [];
	xmlHttp[0] = new XMLHttpRequest();
	xmlHttp[1] = new XMLHttpRequest();
	//buscar  API - FILMES
	xmlHttp[0].open('GET', 'https://api.themoviedb.org/3/search/movie?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BRS&query=' + pesquisar + '&page=1&include_adult=false');
	//buscar API - Generos
	xmlHttp[1].open('GET', 'https://api.themoviedb.org/3/genre/movie/list?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BR');
	//Pecorrendo o array xmlHttp
	for(let o in xmlHttp){	
		xmlHttp[o].onreadystatechange = () => {
			//verificando o status e o state da API.
			if(xmlHttp[0].readyState == 4 & xmlHttp[0].status == 200 & xmlHttp[1].readyState == 4 & xmlHttp[1].status == 200){
				//console.log("ready " + xmlHttp.readyState);
				if(document.getElementById("lista")){
					//console.log("estamos dentro do IF")
					var elemento = document.getElementById("lista");
					while (elemento.firstChild) {
						//console.log("estamos dentro do while");
					  	elemento.removeChild(elemento.firstChild);
					}
				}

				//Criando um objeto com o response do json
				let XMLFilmes = xmlHttp[0].responseText; 
				let XMLGeneros = xmlHttp[1].responseText;
				let jsonGeneros = JSON.parse(XMLGeneros)
				let jsonFilmes = JSON.parse(XMLFilmes)
				console.log(jsonFilmes)
				//console.log(jsonGeneros)

				if(jsonFilmes['results'] == ""){
					//não encontramos nenhum filme - Não conseguimos encontrar nada relacionado a pesquisa.
					noFilme.innerHTML = "Não conseguimos encontrar nada relacionado a '" +  pesquisar + "'." 
				}else {
					noFilme.innerHTML = ""
				}
				//pecorrendo o objeto e recuperando os seus valores.
				for(let i in jsonFilmes['results']){
					let item = jsonFilmes['results'][i]
				
					//criando uma linha (boostrap - grid)
					let divRow = document.createElement('div');
					divRow.className = 'row mt-5 p-0'
					divRow.id = "pagina" + i;

					//criando uma coluna (bootstrap - grid) para colocar a imagem
					let divCol2 = document.createElement('div');
					divCol2.className = 'col-sm-12 col-md-12 col-lg-5  p-5 align-self-start' 
					divCol2.id = "coluna";

					//Criando uma coluna para outras informações
					let divCol = document.createElement('div');
					divCol.className = 'col-sm-12 col-md-12 col-lg-7 align-self-center'

					//Titulo do filme
					let p1 = document.createElement('p')
					p1.innerHTML = "<strong id=titulo" + i + ">" + item.title + "</strong> " 
					p1.className = "h2 text-center mb-3"
					
					//resumo do filme
					let p2 = document.createElement('p')
					p2.className = "mb-3"
					if(item.overview){
						p2.innerHTML = '<strong>Sinopse</strong> <br> <span id=sinopse' + i + '>' + item.overview + '</span>'
					}
					else {
						p2.innerHTML = '<strong>Sinopse</strong> <br> <span id=sinopse' + i + '> Não temos uma sinopse em Português do Brasil. Você pode ajudar a ampliar o nosso banco de dados adicionando uma.'
					}
					//gênero do filme - id
					let generos = ""
					for(let g in item.genre_ids){
					//	console.log("Estou dentro do Genero");

						if(generos){
							generos += ", "
						}
						idFilmeGenero = item.genre_ids[g]

						//colocando os ID de genero dentro de um array
						recuperarIdGenero[g] = idFilmeGenero
						//-----------------------------------------//

						for(let p in jsonGeneros.genres){
							let idGenero = jsonGeneros.genres[p].id;
						
							if(idGenero == idFilmeGenero){
							//	console.log("Entrou aqui");
								generos += jsonGeneros.genres[p].name
							}
						}				
					}
					let p3 = document.createElement('p')
					
					p3.innerHTML = "<strong>Gênero</strong><br><span> " + generos + "</span>"
				
					p3.className = "mb-3"
					//data de lançamento
					let p5 = document.createElement('p')
					p5.className = "mb-3"
					let datadelancamento = item.release_date;
					//quebrando string
					if(datadelancamento){
						let ano = datadelancamento.substr(0, 4);
						let mes = datadelancamento.substr(5, 2);
						let dia = datadelancamento.substr(8, 2);
						if(mes){
							mes = meses[mes-1]
						}
						p5.innerHTML = '<strong>Data de lançamento</strong><br> <span id=data' + i + '>' +  dia + ' de ' + mes + '  ' + ano + '</span>'
					}
					
					let hr = document.createElement('hr')

					//recuperando o poster/imagem do filme
					let img = document.createElement('img')
					//Recuperando o tamanho da tela. Aqui estamos chamando uma função que recupera o valor da tela do usuário.
					var tamanhoDaTela = tamanhoTela()
					//console.log("Tamanho da tela: " + tamanhoDaTela)
					//Se o tamanho da tela for menor ou igual a 700, vamos colocar para aparecer a imagem do backdrop_path
					if(tamanhoDaTela > 768)
						{
						if(item.poster_path){
							divCol2.style.width = "";
							divCol2.style.height = ""
							divCol2.style.background = ""; 
							divCol2.style.backgroundSize = "" 	
							img.src = "https://image.tmdb.org/t/p/w500" + item.poster_path
							img.className = "img-fluid rounded mx-auto d-block"
							elemento.className = "container"
						}
						else{
							img.src = "img/semfoto.png"
							img.className = "img-fluid mx-auto d-block"
							elemento.className = "container"
						}
					}
					else if(tamanhoDaTela <= 500){
						if(item.poster_path){
							divCol2.style.width = "100%";
							divCol2.style.height = ""
							divCol2.style.background = ""; 
							divCol2.style.backgroundSize = "" 	
							img.src = "https://image.tmdb.org/t/p/w500" + item.poster_path
							img.className = "img-fluid mx-auto d-block"
							elemento.className = "container"
						}
						else{
							img.src = "img/semfoto.png"
							img.className = "img-fluid mx-auto d-block"
							elemento.className = "container"
						}
					}
					else if(tamanhoDaTela > 500 && tamanhoDaTela <= 768){
						if(item.poster_path){

							divCol2.style.width = "100%";
							divCol2.style.height = "400px"
							divCol2.style.background = "url(https://image.tmdb.org/t/p/w500" + item.backdrop_path + ") no-repeat center center"; 
							divCol2.style.backgroundSize = "cover" 
							elemento.className = "container-fluid"
							img.className = "imagem"

							//document.getElementById("coluna").style.width = ss + "px";
						}
						else{
							divCol2.style.width = "100%";
							divCol2.style.height = "500px"
							divCol2.style.background = "url(img/sem-foto.gif) no-repeat center center"; 
							divCol2.style.backgroundSize = "cover" 
							elemento.className = "container-fluid"
						}
					}
					//adicionando um hidden para enviar o ID do FILME
					let idFilme = document.createElement('input');
					idFilme.id = "idFilme" + i;
					idFilme.value = item.id
					idFilme.type = "hidden";

					//adicionando um hidden para enviar o ID do genero
					let idGenero = document.createElement('input');
					idGenero.id = "genero" + i;
					idGenero.value = recuperarIdGenero;
					idGenero.type = "hidden";

					//adicionando um hidden para enviar o nome do backdrop
					let backdrop = document.createElement('input');
					backdrop.id = "backdrop" + i;
					backdrop.value = item.backdrop_path;
					backdrop.type = "hidden";

					//adicionando um hidden para enviar o nome do poster
					let poster = document.createElement('input');
					poster.id = "poster" + i;
					poster.value = item.poster_path;
					poster.type = "hidden";
					
					//adicionando o botão para enviar os filmes para lista 
					let botao = document.createElement('button');
					botao.id = "botao";
					botao.className = "btn btn-success"
					botao.innerHTML = "Enviar";
					botao.onclick = function() {enviar(i)}

					

					//Criando a árvore do DOM
					divRow.appendChild(divCol2);
					divRow.appendChild(divCol);
					divCol2.appendChild(img)
					divCol.appendChild(p1)
					divCol.appendChild(p2)
					divCol.appendChild(p3)
					divCol.appendChild(p5)
					divCol.appendChild(idFilme)
					divCol.appendChild(idGenero)
					divCol.appendChild(backdrop)
					divCol.appendChild(poster)
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

