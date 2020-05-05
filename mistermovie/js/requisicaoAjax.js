function enviar(){
	let tituloFilme = document.getElementById("titulo").innerHTML;
	let idFilme = document.getElementById("idFilme").value;
	let controle = 1;
	let verificador = document.getElementById('listaVerificar').value
	if(verificador == 'true'){
		controle = 2;
	}else if(verificador == 'false'){
		controle = 1;
	}
	var ajax = new XMLHttpRequest();
	// Seta tipo de requisição: Post e a URL da API
	ajax.open("POST", "http://localhost/mistermovie/mistermovies_controller.php", true);
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// Seta paramêtros da requisição e envia a requisição
	ajax.send('titulo=' + tituloFilme + '&idFilme= ' + idFilme + '&controle= ' + controle);
	// Cria um evento para receber o retorno.
	ajax.onreadystatechange = function() {
	  // Caso o state seja 4 e o http.status for 200, é porque a requisiçõe deu certo.
		if(ajax.readyState == 4 && ajax.status == 200) {
			var data = ajax.responseText;
	    	// Retorno do Ajax
			//console.log(data);
			
		}
	}
}