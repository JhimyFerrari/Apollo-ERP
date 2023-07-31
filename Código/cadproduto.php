<?php
require_once("config.php");
require_once("assets/templates/header.php");
$produto = new Produto();

?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Cadastro de Produto</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Inicial</a></li>
        <li class="breadcrumb-item">Cadastros</li>
        <li class="breadcrumb-item active">Produto</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-10">

        <div class="card ">
          <div class="card-body">
            <h5 class="card-title">Novo Produto</h5>

            <!-- Formulario -->
            <form class="row g-3" method="post">
              <hr>
              <h6 class="card-subtitle mb-2 text-muted">Informações</h6>
              <div class="col-md-6">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" tabindex="1" maxlength="45" required>
              </div>

              <div class="col-md-6">
                <label for="descrix" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="descric" name="descric" tabindex="2">
              </div>
              <hr>
              <h6 class="card-subtitle mb-2 text-muted">Categorização</h6>
              <div class="col-md-4">
              <select name="idmarca" class="form-select" tabindex="10" aria-label="Seleção Marca" required>
                    <option selected disabled>Selecione o setor</option>
                    <?php
                    foreach ($produto->listar_marca() as $key) {
                      echo "<option value={$key['cod']}>{$key['cod']}- {$key['nome']}</option>";
                    }
                    ?>
                  </select>
                  </div>
              <div class="col-md-4">
              <select name="idcategoria" class="form-select" tabindex="10" aria-label="Seleção Categoria" required>
                    <option selected disabled>Selecione o setor</option>
                    <?php
                    foreach ($produto->listar_categoria() as $key) {
                      echo "<option value={$key['cod']}>{$key['cod']}- {$key['nome']}</option>";
                    }
                    ?>
                  </select>
                  </div>
              <div class="col-md-4">
              <select name="idsetor" class="form-select" tabindex="10" aria-label="Seleção setor" required>
                    <option selected disabled>Selecione o setor</option>
                    <?php
                    foreach ($produto->listar_setor() as $key) {
                      echo "<option value={$key['cod']}>{$key['cod']}- {$key['nome']}</option>";
                    }
                    ?>
                  </select>
                  </div>

              <hr>
       
              <div class="col-md-6">
                <label for="vlcompra" class="form-label">Valor de compra</label>
                <input type="text" class="form-control real" id="vlcompra" name="vlcompra" tabindex="2">
              </div>
       
              <div class="col-md-6">
                <label for="qtestoque" class="form-label">Quantidade em estoque</label>
                <input type="number" class="form-control" id="qtestoque" name="qtestoque" tabindex="2">
              </div>
              <hr>
              <table class="table">
        <thead>
            <tr>
                <th scope="col">*</th>
                <th scope="col">Valor de Venda</th>
                <th scope="col">% de comissão </th>
                <th scope="col">Margem de Lucro</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td> <input type="text" name="vl1" class="form-control real" required> </td>
                <td><input type="text" name="cm1"  class="form-control porcento" required></td>
                <td><input type="text" name="mg1"  class="form-control real" required></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td> <input type="text" name="vl2"  class="form-control real" required> </td>
                <td><input type="text" name="cm2"  class="form-control porcento" required></td>
                <td><input type="text" name="mg2"  class="form-control real" required></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td> <input type="text" name="vl3"  class="form-control real" required> </td>
                <td><input type="text" name="cm3"  class="form-control porcento" required></td>
                <td><input type="text" name="mg3"  class="form-control real" required></td>
            </tr>

        </tbody>
    </table>


        

              <div class="text-center">
                <button type="submit" name="cadastrar" value="cadastre" class="btn btn-primary" tabindex="12">Cadastrar</button>
              </div>

            </form>
            <?php
            if (isset($_POST['cadastrar'])) {       
              $nome = $_POST['nome'];
              $descric = $_POST['descric'];
              $idmarca = (isset($_POST['idmarca']))?$_POST['idmarca'] : -1;
              $idcategoria = (isset($_POST['idcategoria']))?$_POST['idcategoria'] : -1;
              $idsetor = (isset($_POST['idsetor']))?$_POST['idsetor'] : -1;

              $vlcompra = $_POST['vlcompra'];
              $produto->inserir($nome,$descric,$idmarca,$idcategoria,$idsetor,$vlcompra);
            
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