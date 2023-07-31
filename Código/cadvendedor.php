<?php
require_once("config.php");
require_once("assets/templates/header.php");
$vendedor = new Vendedor();

?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Cadastro de Vendedor</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Inicial</a></li>
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item active">Vendedor</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-10">

        <div class="card ">
          <div class="card-body">
            <h5 class="card-title">Novo Vendedor</h5>

            <!-- Formulario -->
            <form class="row g-3" method="post">
              <hr>
              <h6 class="card-subtitle mb-2 text-muted">Informações de Contato</h6>
              <div class="col-md-6">
                <label for="nome" class="form-label">Nome Completo:</label>
                <input type="text" class="form-control" id="nome" name="nome" tabindex="1" maxlength="45" required>
              </div>

              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" tabindex="2">
              </div>
              <div class="col-md-6">
                <label for="nrfone" class="form-label">Telefone:</label>
                <input type="tel" class="form-control telefone" id="nrfone" name="nrfone" tabindex="3" placeholder="(00) 00000-0000">


              </div>
              <hr>
              <h6 class="card-subtitle mb-2 text-muted">Informações Juridicas</h6>
              
              <div class="row">
                <div class="col-md-5" >
                  <label for="cpf" class="form-label">CPF</label>
                  <input type="text" class="form-control cpf" id="cpf" name="cpf" tabindex="4" maxlength="11" minlength="11" required> <!-- Fazer required -->
                </div>
                <div class="col-md-5" >
                  <label for="rg" class="form-label">RG</label>
                  <input type="text" class="form-control rg" id="rg" name="rg" tabindex="5" maxlength="7" minlength="7" required >
                </div>
              </div>
              <div class="row">
                <div class="col-md-4" >
                  <label for="datanascimento" class="form-label">Data Nascimento</label>
                  <input type="date" class="form-control" id="datanascimento" name="datanascimento" tabindex="6" required > 
                </div>
            
                <div class="col-md-4" >
                  <label for="datacontratacao" class="form-label">Data Contraração</label>
                  <input type="date" class="form-control" id="datacontratacao" name="datacontratacao" tabindex="7" required > 
                </div>
                </div>

              <hr>
              <h6 class="card-subtitle mb-2 text-muted">Informações de localização</h6>
              <div class="row">
                <div class="col-md-4">
                  <label for="cep" class="form-label">CEP:</label>
                  <input type="text" class="form-control cep" id="cep" name="cep" tabindex="7" maxlength="9" minlength="9" required>
                </div>
                <div class="col-md-4">
                  <label for="cidade" class="form-label">Cidade:</label>
                  <input type="text" class="form-control" id="cidade" name="cidade" tabindex="8" required>
                </div>
                <div class="col-md-4  ">

                </div>
              </div>
              <div class="col-md-4">
                <label for="bairro" class="form-label">Bairro:</label>
                <input type="text" class="form-control" id="bairro" name="bairro" tabindex="9" required>
              </div>
              <div class="col-md-4">
                <label for="rua" class="form-label">Rua:</label>
                <input type="text" class="form-control" id="rua" name="rua" tabindex="10" required>
              </div>
              <div class="col-md-4">
                <label for="nrlocal" class="form-label ">Numero:</label>
                <input type="text" class="form-control nrlocal" id="nrlocal" name="nrlocal" maxlength="4" minlength="4" tabindex="11" required>
              </div>


        

              <div class="text-center">
                <button type="submit" name="cadastrar" value="cadastre" class="btn btn-primary" tabindex="12">Cadastrar</button>
              </div>

            </form>
            <?php
            if (isset($_POST['cadastrar'])) {       
              $nome = $_POST['nome'];
              $email = (strlen($_POST['email'])>1) ? $_POST['email'] : "Sem Email";
              $nrfone = $_POST['nrfone'];
              $cpf = $_POST['cpf'];
              $rg = $_POST['rg'];
              $dtnascimento = $_POST['datanascimento'];
              $dtcontratacao= $_POST['datacontratacao'];
              $cep = $_POST['cep'];
              $cidade = $_POST['cidade'];
              $bairro = $_POST['bairro'];
              $rua = $_POST['rua'];
              $nrlocal = $_POST['nrlocal'];
              $vendedor->inserir($nome,$email,$nrfone,$cpf,$rg,$dtnascimento,$dtcontratacao,$cep,$cidade,$bairro, $rua, $nrlocal);
            
            }

            ?>

          </div>
        </div>


      </div>
  </section>


</main>
<script src="assets/js/change-cpf-cnpj.js"></script>
<?php


require_once("assets/templates/footer.php");

?>