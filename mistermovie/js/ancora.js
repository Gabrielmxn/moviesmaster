function PesquisarFilmes(event, palavra){
	var keynum;
 	if(window.event) 
 	{ 
 		keynum = event.keyCode
 	} 
 	else if(event.which) 
 	{ 
 		keynum = event.which
 	}
 	if(keynum == 13 )
 	{  
    	window.location.href = "search.php?pesquisa=" +  palavra;
    }
}