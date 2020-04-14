	function PesquisarFilmes(event, palavra) {
		var keynum;
 		if(window.event) { //IE
 			keynum = event.keyCode
 		} else if(event.which) { // Netscape/Firefox/Opera AQUI ESTAVA O PEQUENINO ERRO ao invés de "e." é "event."
 			keynum = event.which
 		}
 		if(keynum == 13 ) {  
   
        window.location.href = "search.php?pesquisa=" +  palavra;
        console.log(window.location.href)
        if (window.location.href) {
          document.getElementById("search").value = palavra;
        }
      
      
    }
  }