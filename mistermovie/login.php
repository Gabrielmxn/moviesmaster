<?php
session_start();
if((isset ($_SESSION['login']) == true) and (isset ($_SESSION['senha']) == true))
{
  header('location:index.php');
 
  }
 $mensagem = "";
 $erro = "";
 if($_GET){
      if($_GET['mensagem'] == "errousuario"){
        $erro = "Usuário ou senha inválida.";
      }
      else if($_GET['mensagem'] == "trocarSenhaSucesso"){
        $mensagem = "Troca de senha realizada.";
      }
      else if($_GET['mensagem'] == "cadastroSucesso"){
        $mensagem = "Cadastro realizado com sucesso.";
      }  
  } 
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>MisterMoveis - Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/loginStyle.css" />
    <link href="https://fonts.googleapis.com/css?family=Baloo+2&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="http://localhost/novoSite/img/favicon.ico" sizes="32x32" />
    <title>MoviesMaster - Login</title>
  </head>
  <body>
    <form action="mistermovies_controller.php" method="post" class="login-form">
      <!-- Título -->
      <a href="index.php"> <img src="img/fundo7.svg" width="120" height="120" class="rounded mx-auto d-block"></a>
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
       <input type="hidden" name="controle" value="6" />
      <!-- Fim Senha -->

      <!-- ##### ##### ##### ##### ##### ##### -->
      <p class="mt-3 text-primary text-center "><?= $mensagem ?></p>
      <p class="mt-3 text-danger text-center "><?= $erro ?></p>
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
