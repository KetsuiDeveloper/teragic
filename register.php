<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registro | Téragic</title>
    <?php include("template/meta-imports.php"); ?>
    <?php include("template/js-imports.php"); ?>
  </head>
  <body class="background-medieval">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3 nopadding">

            <div class="login-box">
                <div class="row">
                    <div class="col-12">
                        <form class="form-block" action="#" method="POST">
                            <input id="username-r" type="text" name="username" placeholder="Usuario" required>
                            <input id="email-r" type="text" name="email" placeholder="Email" required>
                            <select id="gender-r" name="gender" required>
                                <option value="">Seleccione uno</option>
                                <option value="hombre">Hombre</option>
                                <option value="mujer">Mujer</option>
                                <option value="otro">Otro</option>
                            </select>
                            <input id="password-r" type="password" name="password" placeholder="Contraseña">
                            <input id="reppassword-r" type="password" name="reppassword" placeholder="Repetir Contraseña">
                            <input id="submit-r" type="submit" name="submit-reg" value="Crear cuenta">
                            <span class="message_box d-none"></span>
                            <div class="text-center">
                                <a class="text-dark" href="#">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <script src="./assets/js/register.js"></script>
  </body>
</html>
