<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?php echo base_url('/bootstrap/bootstrap.min.css'); ?>">
    <script src="<?php echo base_url('/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/login/Registrousuarios.css'); ?>">
    <script src="<?php echo base_url('/css/jquery-3.6.0.js'); ?>"> </script>
    
</head>


<body>
    
    <div id="contenedor"> 
        
        <div id="limite" class="border border-3">
            
            <form method="POST" action="<?= base_url('registrar');?>" class="needs-validation" novalidate id="formulario">

                <div class="d-flex justify-content-center" id="contenedorTitle">       
                    <img id="registroImg"src="<?php echo base_url("img/registro.png")?>" alt="Icono Registro"> 
                    <h5 id="title">Crear Cuenta</h5>
                </div>

                <div class="div2">
                    
                    <div class="container">
                        <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">

                            <div class="col">
                                <div class="p-2">
                                    <div>
                                        <!-- <label for="nombreUsuario" id="informacion">Nombre de Usuario</label> -->
                                        <input type="text" name="nombreUsuario" id="nombreUsuario"  placeholder="Nombre de Usuario.." required>
                                        <!-- <input type="text" class="form-control" name="nombreUsuario" id="nombreUsuario" placeholder="Nombre de Usuario" required> -->
        
                                        <div class="invalid-feedback" id="invalido">
                                            Por favor, Ingrese su Nombre de Usuario.
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="p-2">

                                    <div>
                                        <!-- <input type="text" class="form-control" name ="primerNombre" id="primerNombre" placeholder="Primer Nombre" required> -->
                                        <!-- <label for="primerNombre" id="informacion">Primer Nombre</label> -->
                                        
                                        <!-- <label for="fname" id="informacion">Primer Nombre</label> -->
                                        <input type="text" name ="primerNombre" id="inputLetras" class="inputVal" onkeyup="capitalizarPrimeraLetra()" placeholder="Primer Nombre.." required>                                        
                                        

                                        <div class="invalid-feedback" id="invalido">
                                            Por favor, Ingrese su Primer Nombre.
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">

                                    <div>
                                        <!-- <label for="segundoNombre" id="informacion">Segundo Nombre</label> -->
                                        <input type="text"  name="segundoNombre" id="inputLetras" class="inputVal" onkeyup="capitalizarPrimeraLetra()" placeholder="Segundo Nombre.." required>  

                                        <!-- <input type="text" class="form-control" name="segundoNombre" id="segundoNombre" placeholder="Segundo Nombre" required> -->

                                        <div class="invalid-feedback" id="invalido">
                                            Por favor, Ingrese su Segundo Nombre.
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="col">
                                <div class="p-2">

                                    <div>
                                        <!-- <label for="primerApellido" id="informacion">Primer Apellido</label> -->
                                        <input type="text" name="primerApellido" id="inputLetras" class="inputVal" onkeyup="capitalizarPrimeraLetra()"  placeholder="Primer Apellido" required>

                                        <div class="invalid-feedback" id="invalido">
                                            Por favor, Ingrese su Primer Apellido.
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div>
                                        <!-- <label for="segundoApellido" id="informacion">Segundo Apellido</label> -->
                                        <input type="text" name="segundoApellido" id="inputLetras " class="inputVal" onkeyup="capitalizarPrimeraLetra()" placeholder="Segundo Apellido" required>

                                        <div class="invalid-feedback" id="invalido">
                                            Por favor, Ingrese su Segundo Apellido.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div>
                                        <!-- <label for="direccion" id="informacion">Dirrección</label> -->
                                        <input type="text" name="direccion" id="direccion" placeholder="Dirección" required>

                                        <div class="invalid-feedback" id="invalido">
                                            Por favor, Ingrese su Direccion.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div>
                                        <!-- <label for="sexo" id="informacion">Sexo</label> -->
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="sexo" id="sexo" required>
                                            <!-- <option selected disabled>Sexo...</option> -->
                                            <option value="" selected disabled>Sexo</option>
                                            <?php foreach( $detallesex as $enca ) { ?>
                                                <option value="<?php echo $enca['id_detalles'];?>"> <?php echo $enca["nombre"];?> </option>
                                            <?php } ?>
    
                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Sexo.
                                            </div>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div>
                                        <!-- <label for="telefono" id="informacion">Telefono</label> -->
                                        <input type="text" name="telefono" id="telefono" placeholder="Telefono" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>

                                        <div class="invalid-feedback" id="invalido">
                                            Por favor, Ingrese su Número de Telefono.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <input type="text"id="inputLetras" title="Solo se permiten letras" required> -->


                            <div class="col">
                                <div class="p-2">
                                    <!-- <label for="tipoDocumento" id="informacion">Tipo de Documento</label> -->
                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="tipoDocumento" id="tipoDocumento" required>
                                        <option value="" selected disabled>Tipo de Documento</option>
                                        <?php foreach( $tpdocument as $tpd ) { ?>
                                            <option value="<?php echo $tpd['id_detalles'];?>"> <?php echo $tpd["nombre"];?> </option>
                                        <?php } ?>

                                        <div class="invalid-feedback" id="invalido">
                                            Por favor, Ingrese su Tipo de Documento.
                                        </div>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div>
                                        <!-- <label for="numeroDocumento" id="informacion">Número Documento</label> -->
                                        <input type="text" id="numeroDocumento" name="numeroDocumento" placeholder="Número Documento" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>

                                        <div class="invalid-feedback" id="invalido">
                                            Por favor, Ingrese su Número de Documento.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div>
                                   
                                        <!-- <label for="email" id="informacion">Correo Electronico</label> -->
                                        <input type="email" id="email" name="email" placeholder="name@example.com" required>

                                       

                                        <div class="invalid-feedback" id="invalido">
                                            Por favor, Ingrese su Correo Electronico.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div>
                                        <!-- <label for="contraseña" id="informacion">Contraseña</label> -->
                                        <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" required>

                                        <div class="invalid-feedback" id="invalido">
                                            Por favor, Ingrese su Contraseña.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div>
                                        <!-- <label for="verificarContraseña" id="informacion">Verificar Contraseña</label> -->
                                        <input type="password" id="verificarContraseña" name="verificarContraseña" placeholder="Verificar Contraseña" required>

                                        <div class="invalid-feedback" id="invalido">
                                            Por favor, Ingrese Nuevamente su Contraseña.
                                        </div>

                                        <p id="message"></p>

                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">    
                                    <div id="contenedorBoton">
                                        <button class="btn btn-success" type="submit" id="btnRegistrar">Registrar</button>
                                    </div>
                                </div>
                            </div>

                            <!-- <p id="message"></p> -->

                        </div>
                    </div>
                        <!-- <input type="submit" value="Submit"> -->
                </div>
            </form>    
        </div>
    </div>

</body>

<script>
    const password1 = document.querySelector("#contraseña");
    const password2 = document.querySelector("#verificarContraseña");
    const message = document.querySelector("#message");
    const btnSubmit = document.querySelector("#btnRegistrar");

    password2.addEventListener("input", function() {
        const password1Value = password1.value;
        const password2Value = password2.value;

        if (password1Value === password2Value) {
            message.textContent = "Las contraseñas coinciden.";
            message.style.color = "green";
        } else {
            message.textContent = "Las contraseñas no coinciden.";
            message.style.color = "red";
        }
    });

    btnSubmit.addEventListener("click", function() {
        const password1Value = password1.value;
        const password2Value = password2.value;

        if (password1Value !== password2Value) {
            alert("Las contraseñas no coinciden. Por favor, verifícalas.");
        }
    });


    const inputLetras = document.querySelector("#inputLetras");

    inputLetras.addEventListener("input", function(event) {
    const inputValue = event.target.value;
    const letrasRegex = /^[a-zA-Z\s]*$/; // Expresión regular para letras y espacios

    if (!letrasRegex.test(inputValue)) {
        event.target.value = inputValue.replace(/[^a-zA-Z\s]/g, "");
    }
    });
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



let input = document.querySelectorAll('.inputVal');
//función que capitaliza la primera letra
function capitalizarPrimeraLetra() {
  //almacenamos el valor del input
  input.forEach(( input ) => {
    
    var palabra = input.value;
    
    //Si el valor es nulo o undefined salimos
    if(!input.value) return;
    // almacenamos la mayuscula
    var mayuscula = palabra.substring(0,1).toUpperCase();
    //si la palabra tiene más de una letra almacenamos las minúsculas
    if (palabra.length > 0) {
        var minuscula = palabra.substring(1).toLowerCase();
    }
    //escribimos la palabra con la primera letra mayuscula
    input.value = mayuscula.concat(minuscula);

  })
  
}


</script>


