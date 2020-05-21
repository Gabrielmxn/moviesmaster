  <!--Navbar -->
  <nav class="mb-0 navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
      <img class="ml-lg-3 ml-sm-0" src="img/fundo7.svg" width="100" height="100">
    </a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
      aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
      <ul class="navbar-nav mr-auto">
         <li class="nav-item">
          <a class="nav-link" href="index.php">Home
          </a>
        </li>   
        <li class="nav-item">
          <div class="md-form">
            <input class="form-control mr-sm-2 ml-lg-5" id="search" type="text" placeholder="Digite o nome do filme" aria-label="Search"   onkeyup="PesquisarFilmes(event,document.getElementById('search').value)" >
          </div>
          </li>
         
      </ul>
      <ul class="navbar-nav ml-auto nav-flex-icons">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" href="#">
            <i class="fas fa-user text-white"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-default"
            aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item" href="login.php">Login</a> <!-- após o login -->
            <a class="dropdown-item" href="cadastro.php">Cadastrar</a> <!-- após o login -->
          </div>
        </li>
      </ul>
    </div>
  </nav>