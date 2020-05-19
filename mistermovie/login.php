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
  </head>
  <body>
    <input id="mensagem" type="hidden" value="<?= $mensagem ?>">
    <input id="erro" type="hidden" value="<?= $erro ?>">
    <form action="mistermovies_controller.php" method="post" class="login-form">
      <!-- Título -->
      <a href="index.php"> <img src="img/fundo7.svg" width="120" height="120" class="rounded mx-auto d-block"></a>
      <!-- Fim Título -->

      <!-- ##### ##### ##### ##### ##### ##### -->

      <!-- Username -->
      <div class="txtb">
        <input type="text" name="usuario"/>
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
      <!-- Botão Logar -->
      <input type="submit" class="logbtn" value="Login"/>
      <!-- Fim Botão Logar -->

      <!-- ##### ##### ##### ##### ##### ##### -->

      <!-- Texto para cadastro -->
      <div class="bottom-text">Não tem nenhuma conta? <a href="cadastro.php" class="text-primary">Criar conta</a></div>
      <!-- Fim Texto para cadastro -->
    </form>

    <!-- Modal Cadastro -->
    <div id="dialogCadastro" class="d-none dialogModal">
      <div class="itemDialog bg-white rounded">
        <h6 class="modal-title text-dark float-left p-3">Cadastro realizado com sucesso.</h6>
        <button id="fechar" type="button" class="close p-3">
          <span style="color: black;">&times;</span>
        </button>
      </div>
    </div>

    <!-- Modal Troca de senha -->
    <div id="dialogTroca" class="d-none dialogModal">
      <div class="itemDialog bg-white rounded">
        <h6 class="modal-title text-dark float-left p-3">Troca de senha realizada.</h6>
        <button id="fechar" type="button" class="close p-3">
          <span style="color: black;">&times;</span>
        </button>
      </div>
    </div>

    <!-- Modal Erro Login-->
    <div id="dialogErro" class="d-none dialogModal">
      <div class="itemDialog bg-white rounded">
        <h6 class="modal-title text-dark float-left p-3">Usuário e/ou senha inválidos.</h6>
        <button id="fechar" type="button" class="close p-3">
          <span style="color: black;">&times;</span>
        </button>
      </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(".txtb input").on("focus", function() {
        $(this).addClass("focus");
      });

      $(".txtb input").on("blur", function() {
        if ($(this).val() == "") $(this).removeClass("focus");
      });

      var mensagem = $("#mensagem").val();
      var erro = $("#erro").val();

      if (mensagem == "Cadastro realizado com sucesso.") {
        $(dialogCadastro).addClass('d-flex'); 
        const modal = document.getElementById("dialogCadastro");
        modal.addEventListener('click', (e) =>{
          if (e.target.id == "dialogCadastro" || e.target.id == "fechar") {
            $(dialogCadastro).removeClass('d-flex');
            $(dialogCadastro).addClass('d-none'); 
            window.location.href = "login.php";
          }
        });
      } 

      if (mensagem == "Troca de senha realizada.") {
        $(dialogTroca).addClass('d-flex'); 
        const modal = document.getElementById("dialogTroca");
        modal.addEventListener('click', (e) =>{
          if (e.target.id == "dialogTroca" || e.target.id == "fechar") {
            $(dialogTroca).removeClass('d-flex');
            $(dialogTroca).addClass('d-none'); 
            window.location.href = "login.php";
          }
        });  
      } 

      if (erro == "Usuário ou senha inválida.") {
        $(dialogErro).addClass('d-flex');   
        const modal = document.getElementById("dialogErro");
        modal.addEventListener('click', (e) =>{
          if (e.target.id == "dialogErro" || e.target.id == "fechar") {
            $(dialogErro).removeClass('d-flex');
            $(dialogErro).addClass('d-none'); 
            window.location.href = "login.php";
          }
        });
      }

    </script>   
  </body>
</html>
