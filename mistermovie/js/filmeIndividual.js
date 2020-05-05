function enviarFilmes(){
	if($('#listaVerificar').val()  == 'true'){
		$('#listaVerificar').val('false')
		$('#botaoLista').html("<i class='fas fa-list text-white'></i>")
	}else if($('#listaVerificar').val() == 'false') {
		$('#listaVerificar').val('true')
		$('#botaoLista').html("<i class='fas fa-list text-danger'></i>")
	}
}

function getDoFilmes() {
	let idDoFilme = $('#valor').val();
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
	let xmlHttp = [];
	xmlHttp = new XMLHttpRequest();
	//buscar  API
	xmlHttp.open('GET', 'https://api.themoviedb.org/3/movie/' + idDoFilme + '?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BR');
		//Pecorrendo o array xmlHttp
		xmlHttp.onreadystatechange = () => {
			//verificando o status e o state da API.
			if(xmlHttp.readyState == 4 & xmlHttp.status == 200){
				let elemento = document.getElementById("lista");
				//Criando um objeto com o response do json
				let XMLFilmes = xmlHttp.responseText; 
				let jsonFilmes = JSON.parse(XMLFilmes)
				//pecorrendo o objeto e recuperando os seus valores.
				let item = jsonFilmes
				//criando uma linha (boostrap - grid)
				let divRow = document.createElement('div');
				let background = item.backdrop_path;
				divRow.className = 'row mt-0 p-0';
				//criando uma coluna (bootstrap - grid) para colocar a imagem
				let divCol2 = document.createElement('div');
				divCol2.className = 'col-12 col-sm-12  col-lg-3 p-0 m-0 align-self-center img' 
				divCol2.id = "coluna";

				//Criando uma coluna para outras informações
				let divCol = document.createElement('div');
				divCol.className = 'col-12 col-sm-12 col-lg-9 align-self-center'

				//Titulo do filme
				let p1 = document.createElement('p')
				p1.innerHTML = "<strong id=titulo>" + item.title + "</strong> " 
				p1.className = "h2 text-center"
				
				//resumo do filme
				let p2 = document.createElement('p')
				p2.className = "clear";
				if(item.overview){
					p2.innerHTML = '<strong>Sinopse</strong> <br> <span id=sinopse>' + item.overview + '</span>'
				}
				else {
					p2.innerHTML = '<strong>Sinopse</strong>  <br> <span id=sinopse> Não temos uma sinopse em Português do Brasil. Você pode ajudar a ampliar o nosso banco de dados adicionando uma.</span>'
				}

				//gênero do filme
				let generos = ""
				for(let g in jsonFilmes.genres){
					//console.log("Estou dentro do Genero");
					if(generos){
						generos += ", "
					}
					generos += jsonFilmes.genres[g].name	
				}
				let p3 = document.createElement('p')
				p3.innerHTML = "<strong>Gênero</strong><br><span> " + generos + "</span>"
				//data de lançamento
				let p5 = document.createElement('p')
				let datadelancamento = item.release_date;
				//quebrando string
				let ano = datadelancamento.substr(0, 4);
				let mes = datadelancamento.substr(5, 2);
				let dia = datadelancamento.substr(8, 2);
				if(mes){
					mes = meses[mes-1]
				}
				p5.innerHTML = '<strong>Data de lançamento</strong><br> <span id=data>' +  dia + ' de ' + mes + '  ' + ano + '</span>'
				let hr = document.createElement('hr')
				//recuperando o poster/imagem do filme
				let img = document.createElement('img')
				//console.log("Tamanho da tela: " + tamanhoDaTela)
				//valores da largura da tela maior que 768
				
				img.src = "https://image.tmdb.org/t/p/w500" + item.poster_path
				img.className = "img-fluid rounded mx-auto d-block"
				var width = screen.width;
				if(width <= 766){
					elemento.className = "container-fluid"
					elemento.style.background = "";
					elemento.style.backgroundPosition = '';
					elemento.style.backgroundSize = "";

				}
				else if(width >= 766 && width <= 1050) {
					elemento.className = "container-fluid"
					elemento.style.background = "url(https://image.tmdb.org/t/p/original/" + item.backdrop_path + ") no-repeat";
					elemento.style.backgroundPosition = 'center center';
					elemento.style.backgroundSize = "cover";
					//elemento.style.backgroundSize = "100% 100%";
				}
				else if(width > 1050) {
					elemento.className = "container-fluid"
					elemento.style.background = "url(https://image.tmdb.org/t/p/original/" + item.backdrop_path + ") no-repeat";
					elemento.style.backgroundPosition = 'center right';
					elemento.style.backgroundSize = "80% 100%";
					//elemento.style.backgroundSize = "100% 100%";
				}
				
				//adicionando um hidden para enviar o ID do FILME
				let idFilme = document.createElement('input');
				idFilme.id = "idFilme";
				idFilme.value = item.id;
				idFilme.type = "hidden";

				//adicionando um hidden para enviar o ID do genero
				let  idGeneroTe = document.createElement('input');
				idGeneroTe.value = recuperarIdGenero;
				idGeneroTe.type = "hidden";

				//adicionando um hidden para enviar o nome do backdrop
				let backdrop = document.createElement('input');
				backdrop.id = "backdrop";
				backdrop.value = item.backdrop_path;
				backdrop.type = "hidden";

				//adicionando um hidden para enviar o nome do poster
				let poster = document.createElement('input');
				poster.id = "poster";
				poster.value = item.poster_path;
				poster.type = "hidden";

				let ul = document.createElement('ul');
				ul.className = 'nav';

				let liFavoritos = document.createElement('li');
				liFavoritos.className = "nav-item";
				liFavoritos.title = 'Adicionar aos favoritos';

				let liLista = document.createElement('li');
				liLista.className = "nav-item";
				liLista.title = 'Adicionar à sua lista';

				/*let liInteresse = document.createElement('li');
				liInteresse.className = "nav-item";
				liInteresse.title = 'Adicionar à sua lista de interesse';*/

				let liAvaliacao = document.createElement('li');
				liAvaliacao.className = "nav-item";
				liAvaliacao.title = 'Avaliação!';

	            let botao1 = document.createElement('button');
				botao1.id = "botao";
	            botao1.disabled = "true";
				botao1.className = "btnw btn my-3 ml-3 float-left"
				botao1.innerHTML = "<i class='fas fa-heart text-white'></i>";
				
				//adicionando o botão para enviar os filmes para lista 
				let botao = document.createElement('button');
				botao.id = "botaoLista";
				botao.className = "btnw btn my-3 ml-3 float-left"
				if(document.getElementById('idUsuario').value == "deslogado"){
					botao.innerHTML = "<i class='fas fa-list text-white'></i>"
				 	botao.disabled = "true";
				 	console.log("Aqui no if");
				}else {
					console.log("Aqui no else");
					if(document.getElementById('listaVerificar').value == 'true'){
						botao.innerHTML = "<i class='fas fa-list text-danger'></i>"
					}else if(document.getElementById('listaVerificar').value == 'false'){
						botao.innerHTML = "<i class='fas fa-list text-white'></i>"
					}
				}
				botao.onclick = function() {enviar(); enviarFilmes();}

				let botao2 = document.createElement('button');
				botao2.id = "botao";
	            botao2.disabled = "true";
				botao2.className = "btnw btn my-3 ml-3 float-left"
				botao2.innerHTML = "<i class='fas fa-star text-white'></i>";
	            

				

				

				//Criando a árvore do DOM
				divRow.appendChild(divCol2);
				divRow.appendChild(divCol);
				divCol2.appendChild(img)
				divCol.appendChild(p1)
				divCol.appendChild(ul)
				ul.appendChild(liFavoritos);
				liFavoritos.appendChild(botao1);
				ul.appendChild(liLista);
				liLista.appendChild(botao);
				ul.appendChild(liAvaliacao);
				liAvaliacao.appendChild(botao2);
	         	//divCol.appendChild(botao1)
				//divCol.appendChild(botao)
				//divCol.appendChild(botao2)
				divCol.appendChild(p2)
				divCol.appendChild(p3)
				divCol.appendChild(p5)
				divCol.appendChild(idFilme)
				divCol.appendChild(idGeneroTe)
				divCol.appendChild(backdrop)
				divCol.appendChild(poster)
				//Adicionando a árvore a cima para ser filha da div com id = lista
				document.getElementById('lista').appendChild(divRow);
			}

			//Tratamento do erro 401/404
			if(xmlHttp.readyState == 4 & xmlHttp.status == 401 || xmlHttp.status == 404){
				//removendo a imagem caso tenha.
				if(document.getElementById("lista")){
					let elemento = document.getElementById("lista");
					while (elemento.firstChild) {
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
	//enviado a requisição
	xmlHttp.send();
}