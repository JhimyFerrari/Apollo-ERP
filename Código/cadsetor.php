<?php
require_once("config.php");
require_once("assets/templates/header.php");


?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Cadastro de Setor</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Inicial</a></li>
      <li class="breadcrumb-item">Cadastros</li>
      <li class="breadcrumb-item active">Setor</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
    <div class="col-lg-10">

      <div class="card ">
        <div class="card-body">
          <h5 class="card-title">Novo Setor</h5>

          <!-- Formulario -->
          <form method="post" >
            <div class="row mb-3">
              <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="nome" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="desc" class="col-sm-2 col-form-label">Descrição:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="desc" name="desc">
                
              </div>
            </div>
          <input type="hidden" name="tabela" value="setor">
            <div class="text-center">
              <button type="submit" class="btn btn-primary" name="cadastrar" value="cadastre" >Cadastrar</button>
            </div>
          </form>
          <?php
          if (isset($_POST['cadastrar'])) {
              $categoria = new Genericas();
              $nome = $_POST['nome'];
              $desc = $_POST['desc'];
              $tabela=$_POST['tabela'];

              $categoria->inserir($nome,$desc,$tabela);
            }

            ?>

        </div>
      </div>

    
</section>

</main>




<?php 


require_once("assets/templates/footer.php");
?>