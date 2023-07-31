<?php
require_once("assets/templates/header-login.php");
require_once("config.php");
$usuario = new Usuario();

?>
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Apollo ERP</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login de Usuario</h5>
                  <p class="text-center small">Informe o nome e senha para login</p>
                </div>

                <form method="post" class="row g-3 needs-validation" novalidate>

                  <div class="col-12">
                    <label for="email" class="form-label">Email:</label>
                    <div class="input-group has-validation">
                      <input type="text" name="email" class="form-control" id="email" required>
                      <div class="invalid-feedback">Informe seu nome de usuario.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senha" required>
                    <div class="invalid-feedback">Informe sua senha de usuario</div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" name="logar" value="logar" type="submit">Login</button>
                  </div>

                </form>

                <?php
                if (isset($_POST['logar'])) {
                  $email = $_POST['email'];
                  $senha = $_POST['senha'];

                  $usuario->logar($email,$senha);
                 
                }
                

                


                ?>

              </div>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main>
<?php
require_once("assets/templates/footer.php");

?>