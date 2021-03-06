<?php

session_start();
if((isset ($_SESSION['login']) == true) and (isset ($_SESSION['senha']) == true))
{
  header('location:index.php');
 
  }

 

?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>MisterMoveis - Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="http://localhost/mistermoveis/img/favicon.ico" sizes="32x32">
    <link rel="stylesheet" href="../css/loginStyle.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Baloo+2&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="../css/style_principal.css" crossorigin="anonymous">-->

    
    <title>MisterMovies Login</title>
  </head>
  <body>
    <form action="../php/autenticacao.php" method="post" class="login-form">
      <!-- Título -->
     <a href="index.php"> <img src="../img/fundo7.svg" width="120" height="120" class="rounded mx-auto d-block"></a>
      <!-- Fim Título -->

      <!-- ##### ##### ##### ##### ##### ##### -->

      <!-- Username -->
      <div class="txtb">
        <input type="text" name="usuario" />
        <span data-placeholder="Login"></span>
      </div>
      <!-- Fim Username -->

      <!-- ##### ##### ##### ##### ##### ##### -->

      <!-- Senha -->
      <div class="txtb">
        <input type="password" name="senha"/>
        <span data-placeholder="Senha"></span>
      </div>
      <!-- Fim Senha -->

      <!-- ##### ##### ##### ##### ##### ##### -->

      <!-- Botão Logar -->
      <input type="submit" class="logbtn" value="Login" />
      <!-- Fim Botão Logar -->

      <!-- ##### ##### ##### ##### ##### ##### -->

      <!-- Texto para cadastro -->
      <div class="bottom-text">Não tem nenhuma conta? <a href="cadastro.php" class="text-primary">Criar conta</a></div>
      <!-- Fim Texto para cadastro -->
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
