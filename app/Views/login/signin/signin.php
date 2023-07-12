<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url("css/login/Signin.css")?>">
    <link rel="stylesheet" href="<?= base_url("bootstrap/bootstrap.min.css")?>">
    <script src="<?= base_url("bootstrap/bootstrap.bundle.min.js")?>"></script>
    <script src="https://kit.fontawesome.com/9bccd79f52.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>

<body>

  <div class="form-signin">

      <div class="cont-form">

        <form method="POST" action="<?= base_url('auth')?>" class="needs-validation" novalidate>

          <div id="contenedorTitle">
            <img id="loginImg" src="<?= base_url("img/loginModificado.png")?>" alt="Icono Login">
          </div>

            <div class="form-floating mb-3" id="form-group">
              <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de Usuario" aria-describedby="inputGroupPrepend" required>
              <label for="usuario" id="label"><i class="fa-solid fa-user"></i> Nombre de Usuario</label>

              <div class="invalid-feedback" id="invalido">
                Por favor, Coloque su nombre de usuario.
              </div>
            </div>


          <div class="form-floating" id="form-group">
            <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Contraseña" aria-describedby="inputGroupPrepend" required>
            <label for="contraseña" id="label"><i class="fa-solid fa-lock"></i> Contraseña</label>

            <div class="invalid-feedback" id="invalido">
                Por favor, Coloque su Contraseña.
            </div>
          </div>

          <div id="btnSesion" class="col-12">
            <button class="btn btn-success" type="submit" id="iniciarSesion" name="iniciarSesion">Iniciar sesión</button>
          </div>

          <div id="alert-container">
            <?php if (isset($_GET['alert'])): ?>
              <script>
                  var alertMessage = "<?php echo $_GET['alert']; ?>";
                  var alertContainer = document.getElementById("alert-container");
                  alertContainer.innerHTML = "<div class='alert'>" + alertMessage + "</div>";
              </script>
            <?php endif; ?>
          </div>

        </form>
        
        <div id="acciones">
          <h6>¿Aun no tienes cuenta? <a href="<?= base_url("/registrarusuario")?>">Entrar aqui</a></h6>
          <!-- <h6><a href="<= base_url("/recuperar")?>">¿Olvidé mi Contraseña?</a></h6> -->
        </div>

      </div>
  </div>
</body>

<script>

// Ejemplo de JavaScript inicial para deshabilitar el envío de formularios si hay campos no válidos
  (function () {
    'use strict'

      // Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap personalizados
      var forms = document.querySelectorAll('.needs-validation')

      // Bucle sobre ellos y evitar el envío
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()

    // function Alert(){

    //   const { value: email } = await Swal.fire({
    //     title: 'Input email address',
    //     input: 'email',
    //     inputLabel: 'Your email address',
    //     inputPlaceholder: 'Enter your email address'
    //   })
  
    //   if (email) {
    //     Swal.fire(`Entered email: ${email}`)
    //   }
    // }


    


</script>
