<?php 
  $erro = "";
  if($_GET){
    if($_GET['erro'] == "senhadusuario"){
      $erro = "Sua senha não está igual";    
    }
    else if ($_GET['erro'] == "exitusuario"){
      $erro = "Nome de usuário já existe";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="http://localhost/mistermovie/img/favicon.ico" sizes="32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <link rel="stylesheet" href="css/loginStyle.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Baloo+2&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="../css/style_principal.css" crossorigin="anonymous">-->

    
    <title>MoviesMaster Login</title>
  </head>
  <body>
    <input id="erro" type="hidden" value="<?= $erro ?>">
    <form action="mistermovies_controller.php" method="post" class="login-form">
      <!-- Título -->
     <a href="index.php"> <img src="img/fundo7.svg" width="120" height="120" class="rounded mx-auto d-block"></a>
      <!-- Fim Título -->

      <!-- ##### ##### ##### ##### ##### ##### -->

      <!-- Username -->
      <div class="txtb"> 
        <input type="text" name="usuario" required="required" />
        <span data-placeholder="Digite seu usuário"></span>
      </div>
      <div class="txtb">
        <input type="password" name="senha" required="required"/>
        <span data-placeholder="Digite sua senha"></span>
      </div>
      <div class="txtb">
        <input type="password" name="senhaConfirmada1" required="required"/>
        <span data-placeholder="Digite novamente sua senha"></span>
      </div>
      <input type="hidden" name="senhaConfirmada2" value="null"/>
      <input type="hidden" name="controle" value="4"/>

      <input type="submit" class="logbtn" value="Cadastrar"/>
    </form>

    <div id="dialogUsuario" class="d-none dialogModal">
      <div class="itemDialog bg-white rounded">
        <h6 class="modal-title text-dark float-left p-3">Nome de usuário já existe.</h6>
        <button id="fechar" type="button" class="close p-3">
          <span style="color: black;">&times;</span>
        </button>
      </div>
    </div>

    <div id="dialogSenha" class="d-none dialogModal">
      <div class="itemDialog bg-white rounded">
        <h6 class="modal-title text-dark float-left p-3">Sua senha não está igual.</h6>
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

      var erro = $("#erro").val(); 

      if (erro == "Sua senha não está igual") {
        $(dialogSenha).addClass('d-flex');   
        const modal = document.getElementById("dialogSenha");
        modal.addEventListener('click', (e) =>{
          if (e.target.id == "dialogSenha" || e.target.id == "fechar") {
            $(dialogSenha).removeClass('d-flex');
            $(dialogSenha).addClass('d-none'); 
            window.location.href = "cadastro.php";
          }
        });
      } 

      if (erro == "Nome de usuário já existe") {
        $(dialogUsuario).addClass('d-flex');  
        const modal = document.getElementById("dialogUsuario");
        modal.addEventListener('click', (e) =>{
          if (e.target.id == "dialogUsuario" || e.target.id == "fechar") {
            $(dialogUsuario).removeClass('d-flex');
            $(dialogUsuario).addClass('d-none'); 
            window.location.href = "cadastro.php";
          }
        }); 
      } 

    </script>
  </body>
</html>
