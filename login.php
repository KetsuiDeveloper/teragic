<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>¡Bienvenido a Téragic!</title>
    <?php include("template/meta-imports.php"); ?>
    <?php include("template/js-imports.php"); ?>

  </head>
  <body class="background-medieval">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 nopadding">
          <div class="login-box">
            <div class="row">
              <div class="col-12 col-lg-6">
                <h1 class="mediFont">Téragic</h1>
              </div>
              <div class="col-12 col-lg-6">
                <div class="row">
                  <div class="col-12">
                    <form action="./data/process/login.php" method="POST">
                      <input type="text" name="username-field" placeholder="Usuario">
                      <input type="password" name="password-field" placeholder="Contraseña">
                      <input type="submit" name="submit-field" value="Entrar">
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <a class="btn-t" href="register.php" class="text-white mediFont">¿No tienes cuenta? <strong>Crea una</strong></a>
                    <a class="btn-t" href="#" class="text-white mediFont">¿Olvidaste la contraseña?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
