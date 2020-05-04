function enviar () {
  tituloFilme = document.getElementById ('titulo').innerHTML;
  idFilme = document.getElementById ('idFilme').value;

  var ajax = new XMLHttpRequest ();

  // Seta tipo de requisição: Post e a URL da API
  ajax.open (
    'POST',
    'http://localhost/moviesmaster/php/enviarRequisicaoBd.php',
    true
  );
  ajax.setRequestHeader ('Content-type', 'application/x-www-form-urlencoded');

  // Seta paramêtros da requisição e envia a requisição
  ajax.send ('titulo=' + tituloFilme + '&idFilme= ' + idFilme);

  // Cria um evento para receber o retorno.
  ajax.onreadystatechange = function () {
    // Caso o state seja 4 e o http.status for 200, é porque a requisiçõe deu certo.
    if (ajax.readyState == 4 && ajax.status == 200) {
      var data = ajax.responseText;
      // Retorno do Ajax
      console.log (data);
      alert ('Enviado com sucesso!');
    }
  };
}
