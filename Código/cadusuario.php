<?php
require_once("config.php");
require_once("assets/templates/header.php");

?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Cadastro de Usuario</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Inicial</a></li>
      <li class="breadcrumb-item">Cadastros</li>
      <li class="breadcrumb-item active">Usuario</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-10">

      <div class="card ">
        <div class="card-body">
          <h5 class="card-title">Novo Usuario</h5>

          <!-- Formulario -->
          <form method="post"  >
            <div class="row mb-3">
              <label for="nome" class="col-sm-2 col-form-label">Nome Completo:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="nome" required>
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="email" class="col-sm-2 col-form-label">Email:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="senha" class="col-sm-2 col-form-label">Senha:</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="senha" name="senha" minlength="6" required >
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-10 offset-sm-2">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="admin" value="" name="admin">
                  <label class="form-check-label" for="admin">
                    Acesso de administrador
                  </label>
                </div>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" name="cadastrar" value="cadastre" class="btn btn-primary">Cadastrar</button>
            </div>
          </form>
          <?php
if (isset($_POST['cadastrar'])) {
  $usuario = new Usuario;
  $nome=$_POST['nome'];
  $email=$_POST['email'];
  $senha=$_POST['senha'];
  $admin = (isset($_POST['admin'])) ? 1 : 0 ;
  $usuario->inserir($nome,$email,$senha,$admin);
}

?>

        </div>
      </div>

    
</section>

</main>


<?php 


require_once("assets/templates/footer.php");

?>