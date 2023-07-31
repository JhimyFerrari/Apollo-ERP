<?php
require_once("config.php");
require_once("assets/templates/header.php");
$model = new Model;


if (isset($_GET['cod'])) {
    $cod = $_GET['cod'];
    $tabela = $_GET['tabela'];
    switch ($tabela) {
        case 'usuario':
            $usuario = new Usuario;
            $usuario->excluir($cod);
            break;
        case 'cliente':
        case 'fornecedor':
            $clienteFornecedor = new ClienteFornecedor;
            $clienteFornecedor->excluir($cod);
            break;
        case 'vendedor':
            $vendedor = new Vendedor;
            $vendedor->excluir($cod);
            break;
        case 'linha_de_venda':
            $linha = new Genericas;
            $linha->excluir($cod, $tabela);
            break;
        case 'setor':
            $setor = new Genericas;
            $setor->excluir($cod, $tabela);
            break;
        case 'marca':
            $marca = new Genericas;
            $marca->excluir($cod, $tabela);
            break;
        case 'categoria':
            $categoria = new Genericas;
            $categoria->excluir($cod, $tabela);
            break;
        case 'produto':
            $produto = new Produto;
            $produto->excluir($cod);
            break;

    
    }
}
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicial</a></li>
                <li class="breadcrumb-item">Relatorios</li>
                <li class="breadcrumb-item active">Cadastros</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Relatório de Cadastros</h5>
                        <form method="post">
                            <div class="row mb-3">
                                <label for="tabela" class="col-sm-2 col-form-label">Tabela:</label>
                                <div class="col-sm-10">
                                    <select tabindex="1" required name="tabela" id="tabela" class="form-select">
                                        <option value="usuario">Usuario</option>
                                        <option value="cliente">Cliente</option>
                                        <option value="fornecedor">Fornecedor</option>
                                        <option value="vendedor">Vendedor</option>
                                        <option value="linha_de_venda">Linha de Venda</option>
                                        <option value="setor">Setor</option>
                                        <option value="marca">Marca</option>
                                        <option value="categoria">Categoria</option>
                                        <option value="produto">Produto</option>
                                    </select>

                                </div>
                            </div>

                            <button tabindex="2" type="submit" name="listar" value="liste" class="btn btn-secondary  mb-3 ">Listar</button>

                        </form>
                        <?php


                        if (isset($_POST['listar'])) {
                            $tabela =  $model->listar($_POST['tabela']);

                        ?>
                            <div style="overflow-x: auto">
                                <table class="table datatable">

                                    <?= $tabela ?>

                                </table>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->



<?php
require_once("assets/templates/footer.php");

?>