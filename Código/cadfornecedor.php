<?php
require_once("config.php");
require_once("assets/templates/header.php");
$fornecedor = new ClienteFornecedor();

?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Form Layouts</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Inicial</a></li>
        <li class="breadcrumb-item">Cadastro</li>
        <li class="breadcrumb-item active">Fornecedor</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-10">

        <div class="card ">
          <div class="card-body">
            <h5 class="card-title">Novo Fornecedor</h5>

            <!-- Formulario -->
            <form class="row g-3" method="post">
              <hr>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipopessoa" id="pf" value="pf" tabindex="1" checked>
                <label class="form-check-label" for="pf">
                  Pessoa Fisica
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="tipopessoa" id="pj" tabindex="1" value="pj">
                <label class="form-check-label" for="pj">
                  Pessoa Juridica
                </label>
              </div>  
            <hr>
              <h6 class="card-subtitle mb-2 text-muted">Informações de Contato</h6>
              <div class="col-md-6" id="div-rs" style="display: none;">
                <label for="rs" class="form-label">Razão Social:</label>
                <input type="text" class="form-control" id="rs" name="rs" tabindex="2" maxlength="45" >
              </div>
              <div class="col-md-6" id="div-nf" style="display: none;">
                <label for="nf" class="form-label">Nome Fantasia:</label>
                <input type="text" class="form-control" id="nf" name="nf" tabindex="3" maxlength="45" >
              </div>
              <div class="col-md-6" id="div-nm" >
                <label for="nm" class="form-label">Nome Completo:</label>
                <input type="text" class="form-control" id="nm" name="nm" tabindex="2" maxlength="45" required>
              </div>
              <div class="col-md-6" id="div-nc" >
                <label for="nc" class="form-label" >Nome Comercial: </label>
                <input type="text" class="form-control" id="nc" name="nc" tabindex="3" maxlength="45" required>
              </div>

              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" tabindex="4">
              </div>
              <div class="col-md-6">
                <label for="nrfone" class="form-label">Telefone:</label>
                <input type="tel" class="form-control telefone" id="nrfone" name="nrfone" tabindex="5" placeholder="(00) 00000-0000">
              </div>
              <hr>
              <h6 class="card-subtitle mb-2 text-muted">Informações Juridicas</h6>
              
              <div class="row">
              <div class="col-md-5" id="div-cpf">
                  <label for="cpf" class="form-label">CPF</label>
                  <input type="text" class="form-control cpf" id="cpf" name="cpf" tabindex="6" maxlength="11" minlength="11" required> 
                </div>
                <div class="col-md-5" id="div-cnpj" style="display: none;">
                  <label for="cnpj" class="form-label">CNPJ</label>
                  <input type="text" class="form-control cnpj" id="cnpj" name="cnpj" tabindex="6" maxlength="14" minlength="14" >
                </div>

                <div class="col-md-5">
                  <label for="ie" class="form-label">Inscrição Estadual:</label>
                  <input type="text" class="form-control ie" id="ie" name="ie" maxlength="9" minlength="9" tabindex="7">
                </div>
              </div>
              <hr>
              <h6 class="card-subtitle mb-2 text-muted">Informações de localização</h6>
              <div class="row">
                <div class="col-md-4">
                  <label for="cep" class="form-label">CEP:</label>
                  <input type="text" class="form-control cep" id="cep" name="cep" tabindex="8" maxlength="8" minlength="8">
                </div>
                <div class="col-md-4">
                  <label for="cidade" class="form-label">Cidade:</label>
                  <input type="text" class="form-control" id="cidade" name="cidade" tabindex="9">
                </div>
                <div class="col-md-4  ">

                </div>
              </div>
              <div class="col-md-4">
                <label for="bairro" class="form-label">Bairro:</label>
                <input type="text" class="form-control" id="bairro" name="bairro" tabindex="11">
              </div>
              <div class="col-md-4">
                <label for="rua" class="form-label">Rua:</label>
                <input type="text" class="form-control" id="rua" name="rua" tabindex="12" placeholder="Rua ...">
              </div>
              <div class="col-md-4">
                <label for="nrlocal" class="form-label">Numero:</label>
                <input type="text" class="form-control nrlocal" id="nrlocal" name="nrlocal" maxlength="4" minlength="4" tabindex="13" placeholder="0000">
              </div>


              <input type="hidden" name="ifornecedor" value="1">
        

              <div class="text-center">
                <button type="submit" name="cadastrar" value="cadastre" class="btn btn-primary" tabindex="14">Cadastrar</button>
              </div>

            </form>
            <?php
               if (isset($_POST['cadastrar'])) {
                //Identifica se o tipo de pessoa é fisica
              $ipessoafisica = ($_POST['tipopessoa'] == "pf") ? 1 : 0;

              $rs_nm = ($ipessoafisica == 1) ? $_POST['nm'] : $_POST['rs'];
              $nf_nc = ($ipessoafisica == 1) ? $_POST['nc'] : $_POST['nf'];
              $email = (strlen($_POST['email']) > 1) ? $_POST['email'] : "Sem Email";
              $nrfone = $_POST['nrfone'];
          
              $cpf_cnpj = ($ipessoafisica == 1) ? $_POST['cpf'] : $_POST['cnpj'];
              $ie = $_POST['ie'];
              $cep = $_POST['cep'];
              $cidade = $_POST['cidade'];
              $idlinhavenda = null;
              $bairro = $_POST['bairro'];
              $rua = $_POST['rua'];
              $nrlocal = $_POST['nrlocal'];
              $ifornecedor = $_POST['ifornecedor'];
              $fornecedor->inserir($rs_nm, $nf_nc, $email, $nrfone, $ipessoafisica, $cpf_cnpj, $ie, $cep, $cidade, $idlinhavenda, $bairro, $rua, $nrlocal, $ifornecedor);
            }


            ?>

          </div>
        </div>


      </div>
  </section>


</main>
<script src="assets/js/alterna-pf-pj.js"></script>
<?php


require_once("assets/templates/footer.php");

?>