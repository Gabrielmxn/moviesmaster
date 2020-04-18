<?php 
	include "../php/sessao.php";
 // include "../php/erros.php";
  $erro = "";

    if($_GET){
      if($_GET['erro'] == "nerro"){
        $erro = "Você deve digitar a mesma senha duas vezes para confirmá-la.";
        echo 'entrou aqui';
      }
      else if ($_GET['erro'] == "serro"){
        $erro = "Sua senha está incorreta.";
        
      }
}

?>



<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="http://localhost/mistermoveis/img/favicon.ico" sizes="32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../css/loginStyle.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Baloo+2&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="../css/style_principal.css" crossorigin="anonymous">-->

    
    <title>MoviesMaster Login</title>
  </head>
  <body>
    <form action="../php/trocaSenha.php" method="post" class="login-form">
      <!-- Título -->
     <a href="index.php"> <img src="../img/fundo7.svg" width="120" height="120" class="rounded mx-auto d-block"></a>
      <!-- Fim Título -->

      <!-- ##### ##### ##### ##### ##### ##### -->

      <!-- Username -->
      <div class="txtb">
        <input type="password" name="senhaUsuario" />
        <span data-placeholder="Digite sua senha"></span>
      </div>
      <div class="txtb">
        <input type="password" name="novasenha1" />
        <span data-placeholder="Digite sua nova senha"></span>
      </div>
      <div class="txtb">
        <input type="password" name="novasenha2" />
        <span data-placeholder="Digite novamente sua nova senha"></span>
      </div>

      <input type="submit" class="logbtn" value="Trocar" />
      <p class="mt-3 text-danger text-center "><?= $erro ?></p>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(".txtb input").on("focus", function() {
        $(this).addClass("focus");
      });

      $(".txtb input").on("blur", function() {
        if ($(this).val() == "") $(this).removeClass("focus");
      });
    </script>
    
  </body>
</html>
