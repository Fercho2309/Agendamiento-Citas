<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("css/administradores/allView.css")?>">
    <script src="js/prueba.js"></script>
    <title>Document</title>
</head>

<body>

    <div id="contenedor">
        <div id="limite" class="border border-3">

            <div class="d-flex justify-content-center" id="contenedorTitle">
                <img id="Img" src="<?php echo base_url("img/usuariosModificado.png")?>" alt="Icono Usuarios">
                <h1 id="title">Administrador de Usuarios</h1>
            </div>

            <div>

                <div id="btns">
                    <button id="agregar" type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#UsuarioModal_Agregar" onclick="seleccionaUsuarios(<?php echo 1 . ',' . 1?>)">
                        Agregar
                    </button>

                    <a href="<?php echo base_url("/eliminados_Usuarios")?>" id="eliminados"
                        class="btn btn-secondary">Eliminados</a>

                    <a href="<?= base_url("/AdminInicio")?>" id="regresar" class="btn btn-primary">Regresar</a>

                </div>
            </div>

            <div class="table-responsive" id="contenidoTable">

                <table id="example" class="table" style="width:100%">
                    <thead id="th">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Primer Nombre</th>
                            <th scope="col">Segundo Nombres</th>
                            <th scope="col">Primer Apellidos</th>
                            <th scope="col">Segundo Apellidos</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Tipo Documento</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Direccion</th>
                            <!-- <th scope="col">Cargo</th> -->
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody style="font-family:Arial;font-size:17px;">
                        <?php foreach ($usuarios as $dato) { ?>
                        <tr>
                            <td><?php echo $dato['id_usuario']; ?></td>
                            <td><?php echo $dato['nombre_corto']; ?></td>
                            <td><?php echo $dato['nRol']; ?></td>
                            <td><?php echo $dato['nombre_p']; ?></td>
                            <td><?php echo $dato['nombre_s']; ?></td>
                            <td><?php echo $dato['apellido_p']; ?></td>
                            <td><?php echo $dato['apellido_s']; ?></td>
                            <td><?php echo $dato['nomSexo']; ?></td>
                            <td><?php echo $dato['nomTipoDoc']; ?></td>
                            <td><?php echo $dato['numero_de_documento']; ?></td>
                            <td><?php echo $dato['direccion']; ?></td>
                            <!-- <td><php echo $dato['nomCargo']; ?></td> -->
                            <td><?php echo $dato['estado'] = 'A' ? '<span class="text-succes"> Activo </span>' : '<span class="text-danger"> Inactivo </span>'; ?>
                            </td>
                            <td id="detalles">
                                <!-- Button trigger modal -->
                                <a id="iconoEditar" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#UsuarioModal_Agregar"
                                    onclick="seleccionaUsuarios(<?php echo $dato['id_usuario'] . ',' . 2?>)">
                                    <img src="<?php echo base_url('img/edit.svg');?>" alt="Editar"
                                        title="Editar Registro">
                                </a>

                                <a id="iconoEliminar" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"
                                    data-href="<?php echo base_url('/eliminar_usuario') . '/' .$dato['id_usuario']. '/' .'E'; ?>">
                                    <img src="<?php echo base_url('img/trash-2.svg')?>" alt="Borrar">
                                </a>

                                <!-- <a id="iconoEliminar" type="button" class="btnIconoEliminar" data-href="?php echo base_url('/eliminar_usuario') . '/' .$dato['id_usuario']. '/' .'E'; ?>">
                                    <img src="<php echo base_url('img/trash-2.svg')?>" alt="Borrar">
                                </a> -->

                            </td>

                            <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>



    <!-- Modal AGREGAR y EDITAR-->
    <form method="POST" action="<?php echo base_url("insertar_Usuarios")?>" autocomplete="off" class="needs-validation"
        novalidate>

        <div class="modal fade" id="UsuarioModal_Agregar" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <div class="modal-header" id="contenedorTitleModal">
                        <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="btnModal"></button>
                    </div>

                    <div class="modal-body">

                        <input hidden name="id_usuario" id="id_usuario">
                        <input hidden name="tp" id="tp">

                        <div class="container">
                            <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">

                                <div class="col">
                                    <div class="p-3">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="nombreUsuario"
                                                id="nombreUsuario" placeholder="Nombre de Usuario" required>
                                            <label for="nombreUsuario">Nombre de Usuario</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Nombre de Usuario.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control inputVal" name="primerNombre"
                                                id="primerNombre" onkeyup="capitalizarPrimeraLetra()"
                                                placeholder="Primer Nombre" required>
                                            <label for="primerNombre">Primer Nombre</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Primer Nombre.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control inputVal" name="segundoNombre"
                                                id="segundoNombre" onkeyup="capitalizarPrimeraLetra()"
                                                placeholder="Segundo Nombre" required>
                                            <label for="segundoNombre">Segundo Nombre</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Segundo Nombre
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control inputVal" name="primerApellido"
                                                id="primerApellido" onkeyup="capitalizarPrimeraLetra()"
                                                placeholder="Primer Apellido" required>
                                            <label for="primerApellido">Primer Apellido</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Primer Apellido.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control inputVal" name="segundoApellido"
                                                id="segundoApellido" onkeyup="capitalizarPrimeraLetra()"
                                                placeholder="Segundo Apellido" required>
                                            <label for="segundoApellido">Segundo Apellido</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Segundo Apellido.
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="p-3">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="direccion" id="direccion"
                                                placeholder="Dirección" required>
                                            <label for="direccion">Dirección</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Dirección.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3">
                                        <div class="input-group input-group-lg">
                                            <label class="input-group-text" id="inputGroup-sizing-lg"
                                                for="sexo">Sexo:</label>
                                            <select class="form-select" id="sexo" name="sexo"
                                                aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-lg" required>
                                                <?php foreach( $detallesex as $enca ) { ?>
                                                <option value="<?php echo $enca['id_detalles'];?>">
                                                    <?php echo $enca["nombre"];?> </option>
                                                <?php } ?>
                                            </select>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Sexo.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="telefono" name="telefono"
                                                placeholder="Telefono"
                                                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                                                required>
                                            <label for="telefono">Telefono</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Telefono.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3">
                                        <div class="input-group input-group-lg">
                                            <label class="input-group-text" id="inputGroup-sizing-lg"
                                                for="tipoDocumento">Tipo Documento:</label>
                                            <select class="form-select" id="tipoDocumento" name="tipoDocumento"
                                                aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-lg" required>
                                                <?php foreach( $detalletp as $tpd ) { ?>
                                                <option value="<?php echo $tpd['id_detalles'];?>">
                                                    <?php echo $tpd["nombre"];?> </option>
                                                <?php } ?>
                                            </select>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Tipo de Documento.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="numeroDocumento"
                                                name="numeroDocumento" placeholder="Número Documento"
                                                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                                                required>
                                            <label for="numeroDocumento">Número Documento</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Número de Documento.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="name@example.com" required>
                                            <label for="email">Correo Electronico</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Correo Electronico.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3">
                                        <div class="input-group input-group-lg">
                                            <label class="input-group-text" id="inputGroup-sizing-lg"
                                                for="rol">Rol:</label>
                                            <select class="form-select" id="rol" name="rol"
                                                aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-lg" required>
                                                <?php foreach( $roles as $dato ) { ?>
                                                <option value="<?php echo $dato['id_rol'];?>">
                                                    <?php echo $dato["nombre"];?> </option>
                                                <?php } ?>
                                            </select>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Rol.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="p-3">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="contraseña"
                                                name="contraseña" placeholder="Contraseña" required>
                                            <label for="contraseña">Contraseña</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese una Contraseña.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success" id="btn_Guardar">Guardar</button>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <!-- Modal BOTON ELIMINAR-->
    <form action="">
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div id="contenedorTitleModal" class="modal-header">
                        <h5 id="titleModal" class="modal-title" id="exampleModalLabel">Eliminación de Registro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="deleteModal"></button>
                    </div>

                    <div id="" class="modal-body">
                        <p id=""> ¿Estas Seguro que desea Eliminar este Registro? </p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Cancelar</button>

                        <a class="btn btn-primary btn-ok">Aceptar</a>
                    </div>
                </div>

            </div>
        </div>
    </form>

</body>

<script>
$('#deleteModal').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});

(function() {
    'use strict'

    // Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap personalizados
    var forms = document.querySelectorAll('.needs-validation')

    // Bucle sobre ellos y evitar el envío
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()

function seleccionaUsuarios(id, tp) {
    if (tp === 2) {
        dataURL = "<?php echo base_url('buscarinfo_Usuarios'); ?>" + "/" + id;
        $.ajax({
            type: "post",
            url: dataURL,
            datatype: "json",
            success: function(rs) {
                // console.log(rs);      
                const data = JSON.parse(rs);
                console.log(data)
                $("#tp").val(2);
                $("#id_usuario").val(id);
                document.getElementById('titleModal').innerText = "Actualizar Registro";

                limpiar_campos();

                $("#primerNombre").val(data[0]['nombre_p']);
                $("#segundoNombre").val(data[0]['nombre_s']);
                $("#primerApellido").val(data[0]['apellido_p']);
                $("#segundoApellido").val(data[0]['apellido_s']);
                $("#nombreUsuario").val(data[0]['nombre_corto']);
                $("#rol").val(data[0]['id_rol']);
                $("#direccion").val(data[0]['direccion']);
                $("#sexo").val(data[0]['detalleSexo']);
                $("#telefono").val(data[0]['numero']);
                $("#tipoDocumento").val(data[0]['detalleTipoDoc']);
                $("#numeroDocumento").val(data[0]['numero_de_documento']);
                $("#email").val(data[0]['correo']);
                // $("#tipoUsuario").val(data[0]['detalleCargo']);
                $("#contraseña").val(data[0]['contrasena']);
                $("#btn_Guardar").text("Actualizar");
                $("#UsuarioModal_Agregar").modal("show");
            },
            error: function() {
                alert('Error en Datos de Usuarios. Informe', '');
            }
        });

    } else {
        $("#tp").val(1);
        document.getElementById('titleModal').innerText = "Nuevo Usuario";
        $("#rol").val('');
        $("#primerNombre").val('');
        $("#segundoNombre").val('');
        $("#primerApellido").val('');
        $("#segundoApellido").val('');
        $("#nombreUsuario").val('');
        $("#direccion").val('');
        $("#sexo").val('');
        $("#telefono").val('');
        $("#tipoDocumento").val('');
        $("#numeroDocumento").val('');
        $("#email").val('');
        // $("#tipoUsuario").val('');
        $("#contraseña").val('');
        $("#btn_Guardar").text('Guardar');
    }


};

let input = document.querySelectorAll('.inputVal');
//función que capitaliza la primera letra
function capitalizarPrimeraLetra() {
    //almacenamos el valor del input
    input.forEach((input) => {

        var palabra = input.value;

        //Si el valor es nulo o undefined salimos
        if (!input.value) return;
        // almacenamos la mayuscula
        var mayuscula = palabra.substring(0, 1).toUpperCase();
        //si la palabra tiene más de una letra almacenamos las minúsculas
        if (palabra.length > 0) {
            var minuscula = palabra.substring(1).toLowerCase();
        }
        //escribimos la palabra con la primera letra mayuscula
        input.value = mayuscula.concat(minuscula);

    })
}

    function limpiar_campos() {
        $("#rol").val('');
        $("#primerNombre").val('');
        $("#segundoNombre").val('');
        $("#primerApellido").val('');
        $("#segundoApellido").val('');
        $("#nombreUsuario").val('');
        $("#direccion").val('');
        $("#sexo").val('');
        $("#telefono").val('');
        $("#tipoDocumento").val('');
        $("#numeroDocumento").val('');
        $("#email").val('');
        $("#tipoUsuario").val('');
        $("#contraseña").val('');
    }
</script>

</html>