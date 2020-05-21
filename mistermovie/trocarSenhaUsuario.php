<?php 
include "php/sessao.php";
$erro = "";
if($_GET){
  if($_GET['erro'] == "nerro"){
    $erro = "Você deve digitar a mesma senha duas vezes para confirmá-la.";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/loginStyle.css" />
    <link href="https://fonts.googleapis.com/css?family=Baloo+2&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="http://localhost/novoSite/img/favicon.ico" sizes="32x32">
    <title>MoviesMaster Login</title>
  </head>
  <body>
    <form action="mistermovies_controller.php" method="post" class="login-form">
      <!-- Título -->
     <a href="index.php"> <img src="img/fundo7.svg" width="120" height="120" class="rounded mx-auto d-block"></a>
      <!-- Fim Título -->

      <!-- ##### ##### ##### ##### ##### ##### -->

      <!-- Username -->
      <div class="txtb">
        <input type="password" name="senha" required="required"/>
        <span data-placeholder="Digite sua senha"></span>
      </div>
      <div class="txtb">
        <input type="password" name="senhaConfirmada1" required="required"/>
        <span data-placeholder="Digite sua nova senha"></span>
      </div>
      <div class="txtb">
        <input type="password" name="senhaConfirmada2" required="required"/>
        <span data-placeholder="Digite novamente sua nova senha"></span>
      </div>
      <input type="hidden" name="controle" value="5" />
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
