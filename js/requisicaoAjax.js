function enviar(id){
		console.log("id: " + id);
		tituloFilme = document.getElementById("titulo" + id).innerHTML;
		sinopseFilme =  document.getElementById("sinopse" + id).innerHTML;
		generoFilme =  document.getElementById("genero" + id).value;
		dataFilme =  document.getElementById("data" + id).innerHTML;
		idFilme = document.getElementById("idFilme" + id).value;
		backdrop = document.getElementById("backdrop" + id).value;
		poster = document.getElementById("poster" + id).value;
		var ajax = new XMLHttpRequest();

		// Seta tipo de requisição: Post e a URL da API
		ajax.open("POST", "http://mistermoveiss.rf.gd/enviarRequisicaoBd.php", true);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		// Seta paramêtros da requisição e envia a requisição
		ajax.send('titulo=' + tituloFilme + '&sinopse=' + sinopseFilme + '&genero=' + generoFilme + '&data=' + dataFilme + '&idFilme= ' + idFilme + '&backdrop=' + backdrop + '&poster=' + poster);

		// Cria um evento para receber o retorno.
		ajax.onreadystatechange = function() {
		  // Caso o state seja 4 e o http.status for 200, é porque a requisiçõe deu certo.
			if (ajax.readyState == 4 && ajax.status == 200) {
				var data = ajax.responseText;
		    // Retorno do Ajax
				console.log(data);
				alert("Enviado com sucesso!");
			}
		}
}