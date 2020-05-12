$(document).ready( () => {
	$(window).resize( e => {
		var tamanhoDaTela = $(window).width();
		var urlImagem = $('#inputImagem').val()
			if(tamanhoDaTela <= 991){
				$('#lista').css('background', '');
			}else if(tamanhoDaTela >= 992 && tamanhoDaTela <= 1050){
				
				$('#lista').css('background', 'url(' + urlImagem + ') no-repeat').css('backgroundPosition', 'center center').css('backgroundSize', 'cover');
			}else if(tamanhoDaTela > 1050){
				$('#lista').css('background', 'url(' + urlImagem + ') no-repeat').css('backgroundPosition', 'center center').css('backgroundSize', 'cover');
			}	
	})
})




function enviarFilmes(){
	if($('#listaVerificar').val()  == 'true'){
		$('#listaVerificar').val('false')
		$('#botaoLista').html("<i class='fas fa-list text-white'></i>")
	}else if($('#listaVerificar').val() == 'false') {
		$('#listaVerificar').val('true')
		$('#botaoLista').html("<i class='fas fa-list text-danger'></i>")
	}
}

function enviarFilmesFavoritos(){
	if($('#listaVerificarFavoritos').val()  == 'true'){
		$('#listaVerificarFavoritos').val('false')
		$('#botaoFavoritos').html("<i class='fas fa-heart text-white'></i>")
	}else if($('#listaVerificarFavoritos').val() == 'false') {
		$('#listaVerificarFavoritos').val('true')
		$('#botaoFavoritos').html("<i class='fas fa-heart text-danger'></i>")
	}
}
function enviarFilmesInteresses(){
	if($('#listaVerificarInteresses').val()  == 'true'){
		$('#listaVerificarInteresses').val('false')
		$('#botaoInteresses').html("<i class='fas fa-bookmark text-white'></i>")
	}else if($('#listaVerificarInteresses').val() == 'false') {
		$('#listaVerificarInteresses').val('true')
		$('#botaoInteresses').html("<i class='fas fa-bookmark text-danger'></i>")
	}
}

function getDoFilmes() {
	let idDoFilme = $('#valor').val();
	//array de meses
	
	let xmlHttp = new XMLHttpRequest();
	//buscar  API
	xmlHttp.open('GET', 'https://api.themoviedb.org/3/movie/' + idDoFilme + '?api_key=bd9f051458a4c87fe4c873ef463542e3&language=pt-BR');
		//Pecorrendo o array xmlHttp
		xmlHttp.onreadystatechange = () => {
			//verificando o status e o state da API.
			if(xmlHttp.readyState == 4 & xmlHttp.status == 200){
				let elemento = document.getElementById("lista");
				//Criando um objeto com o response do json
				let XMLFilmes = xmlHttp.responseText; 
				let item = JSON.parse(XMLFilmes)
				//criando uma linha (boostrap - grid)
				let divRow = document.createElement('div');
				divRow.className = 'row';
				//criando uma coluna (bootstrap - grid) para colocar a imagem
				let divCol2 = document.createElement('div');
				divCol2.className = 'col-sm-12  col-lg-3 p-0 m-0 align-self-center img ' 
				divCol2.id = "coluna";

				//Criando uma coluna para outras informações
				let divCol = document.createElement('div');
				divCol.className = ' col-sm-12 col-lg-9 align-self-center'
			
				//resumo do filme
				let p2 = document.createElement('p')
				if(item.overview){
					p2.innerHTML = '<h5>Sinopse</h5><p id=sinopse>' + item.overview + '</p>'
				}
				else {
					p2.innerHTML = '<h5>Sinopse</h5><p id=sinopse> Não temos uma sinopse em disponível.</p>'
				}
				let p3 = document.createElement('p');
				p3.innerHTML = item.tagline;
				p3.className = "font-italic";

				let p6 = document.createElement('p');
				let horaDoFilme = item.runtime;
				let horaDoFilmes = horaDoFilme/60
				horaDoFilmes = horaDoFilmes.toString() 
				let hora = horaDoFilmes.split(".");
				let valorConta = hora[0] * 60
				var stringHora = ""

				if(horaDoFilme != 0 && horaDoFilme != null){
					var stringHora =  '<i class="far fa-clock"></i> ' + hora[0] + "h " + (horaDoFilme - valorConta) + 'min'
				}
				
				//gênero do filme
				let generos = ""
				for(let g in item.genres){
					if(generos){
						generos += ", "
					}
					generos += item.genres[g].name	
				}
				let generoVariavel = ""
				if(generos != ""){
				 generoVariavel = '<i class="fas fa-film"></i> ' +  generos + '</i>'
				}
				//data de lançamento
				let p5 = document.createElement('p')
				let datadelancamento = item.release_date;
				//quebrando string
				let ano = datadelancamento.substr(0, 4);
				let mes = datadelancamento.substr(5, 2);
				let dia = datadelancamento.substr(8, 2);
				let anoLacamento = ""
				if(ano != ""){
					anoLacamento = '(' + ano + ')'
				}
				
				let lacamento = ""; 
				if(datadelancamento != ""){
					lacamento = '<i class="fas fa-calendar-day fa-1x"></i> ' + dia + '/' + mes + '/' + ano
				}
				p5.className = "text-center";
				p5.innerHTML = '<span id="lacamento">' + lacamento +  ' </span><span id="genero">' + generoVariavel + ' </span><span id="hora">' + stringHora + '</span>'
				
				document.title = item.title + " - MisterMovie"
				//Titulo do filme
				let p1 = document.createElement('p')
				p1.innerHTML = "<strong id=titulo>" + item.title + ' ' + anoLacamento + "</strong> " 
				p1.className = "h2 text-center"
				//recuperando o poster/imagem do filme
				let img = document.createElement('img')
				
				
				img.src = "https://image.tmdb.org/t/p/w500" + item.poster_path
				img.className = "img-fluid rounded mx-auto d-block"
				var width = screen.width;
				if(width <= 1050){
					elemento.style.background = "";
					elemento.style.backgroundPosition = '';
					elemento.style.backgroundSize = "";
				}
				else if(width > 1050) {
					elemento.style.background = "url(https://image.tmdb.org/t/p/original/" + item.backdrop_path + ") no-repeat";
					elemento.style.backgroundPosition = 'center right';
					elemento.style.backgroundSize = "100%";
				}
				
				let inputImagem = document.createElement('input')
				inputImagem.id = "inputImagem";
				inputImagem.value = "https://image.tmdb.org/t/p/original/" + item.backdrop_path;
				inputImagem.type = "hidden";
				
				let idFilme = document.createElement('input');
				idFilme.id = "idFilme";
				idFilme.value = item.id;
				idFilme.type = "hidden";

				let ul = document.createElement('ul');
				ul.className = 'nav';

				let liFavoritos = document.createElement('li');
				liFavoritos.className = "nav-item";
				liFavoritos.title = 'Adicionar aos favoritos';

				let liInteresse = document.createElement('li');
				liInteresse.className = "nav-item";
				liInteresse.title = 'Adicionar aos interesse';

				let liLista = document.createElement('li');
				liLista.className = "nav-item";
				liLista.title = 'Adicionar à sua lista';

				
				let liAvaliacao = document.createElement('li');
				liAvaliacao.className = "nav-item";
				liAvaliacao.title = 'Avaliação!';

	            let botaoFavoritos = document.createElement('button');
				botaoFavoritos.id = "botaoFavoritos";
				botaoFavoritos.className = "btnw btn my-3 ml-3 float-left"
				
				if(document.getElementById('idUsuario').value == "deslogado"){
					botaoFavoritos.innerHTML = "<i class='fas fa-heart text-white'></i>"
				 	botaoFavoritos.disabled = "true";
				 	
				}else {
					if(document.getElementById('listaVerificarFavoritos').value == 'true'){
						botaoFavoritos.innerHTML = "<i class='fas fa-heart text-danger'></i>"
					}else if(document.getElementById('listaVerificarFavoritos').value == 'false'){
						botaoFavoritos.innerHTML = "<i class='fas fa-heart text-white'></i>"
					}
				}

				botaoFavoritos.onclick = function() {enviar('listaFilmesFavoritos'); enviarFilmesFavoritos();}
				
				let botaoListaFilmes = document.createElement('button');
				botaoListaFilmes.id = "botaoLista";
				botaoListaFilmes.className = "btnw btn my-3 ml-3 float-left"
				if(document.getElementById('idUsuario').value == "deslogado"){
					botaoListaFilmes.innerHTML = "<i class='fas fa-list text-white'></i>"
				 	botaoListaFilmes.disabled = "true";
				 	
				}else {
				
					if(document.getElementById('listaVerificar').value == 'true'){
						botaoListaFilmes.innerHTML = "<i class='fas fa-list text-danger'></i>"
					}else if(document.getElementById('listaVerificar').value == 'false'){
						botaoListaFilmes.innerHTML = "<i class='fas fa-list text-white'></i>"
					}
				}
				botaoListaFilmes.onclick = function() {enviar('listaFilmes'); enviarFilmes();}
	            
				let botaoInteresses = document.createElement('button');
				botaoInteresses.id = "botaoInteresses";
				botaoInteresses.className = "btnw btn my-3 ml-3 float-left"
				if(document.getElementById('idUsuario').value == "deslogado"){
					botaoInteresses.innerHTML = "<i class='fas fa-bookmark text-white'></i>"
				 	botaoInteresses.disabled = "true";
				}else {
					
					if(document.getElementById('listaVerificarInteresses').value == 'true'){
						botaoInteresses.innerHTML = "<i class='fas fa-bookmark text-danger'></i>"
					}else if(document.getElementById('listaVerificarInteresses').value == 'false'){
						botaoInteresses.innerHTML = "<i class='fas fa-bookmark text-white'></i>"
					}
				}
				botaoInteresses.onclick = function() {enviar('listaFilmesInteresses'); enviarFilmesInteresses();}

				let botaoAvaliacao = document.createElement('button');
				botaoAvaliacao.id = "botao";
	            botaoAvaliacao.disabled = "true";
				botaoAvaliacao.className = "btnw btn my-3 ml-3 float-left"
				botaoAvaliacao.innerHTML = "<i class='fas fa-star text-white'></i>";

				

				//Criando a árvore do DOM
				divRow.appendChild(divCol2);
				divRow.appendChild(divCol);
				divCol2.appendChild(img)
				divCol.appendChild(p1)
				divCol.appendChild(p5)
				divCol.appendChild(ul)
				ul.appendChild(liFavoritos);
				liFavoritos.appendChild(botaoFavoritos);
				ul.appendChild(liLista);
				liLista.appendChild(botaoListaFilmes);
				ul.appendChild(liInteresse);
				liInteresse.appendChild(botaoInteresses)
				ul.appendChild(liAvaliacao);
				liAvaliacao.appendChild(botaoAvaliacao);
				divCol.appendChild(p3)
				divCol.appendChild(p2)
				divCol.appendChild(inputImagem)
				divCol.appendChild(idFilme)
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