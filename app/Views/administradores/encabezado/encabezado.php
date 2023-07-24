<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url("css/administradores/AllView.css")?>">
        <script src="js/prueba.js"></script>
        <title>Encabezado</title>
    </head>
    <body>
        
    <div class="contenedor">
        <div class="limite">
            
            <div class="d-flex justify-content-center" id="contenedorTitle">       
                <img id="Img" src="<?php echo base_url("img/encabezamiento.png")?>" alt="Icono Usuarios">
                <h1 id="title">Administrador Parametros</h1>
            </div>

            <div>

                <div id="btns">
                    <button id="agregar" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#EncabezadoModal_Agregar" onclick="seleccionaEncabezado(<?php echo 1 . ',' . 1?>)">
                        Agregar
                    </button>
                
                    <a href="<?php echo base_url("/eliminados_Encabezado")?>" id="eliminados" class="btn btn-secondary">Eliminados</a>
                
                    <a href="<?php echo base_url("/AdminInicio")?>" id="regresar" class="btn btn-primary">Regresar</a>
                
                </div>
            </div>

            <div class="table-responsive" id="contenidoTable">

                <table id="example" class="table" style="width:100%">
                    <thead id="th">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Usuario Crea</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody style="font-family:Arial;font-size:17px;">
                        <?php foreach ($encabezado as $dato) { ?>
                            <tr>
                                <td><?php echo $dato['id_encabezado']; ?></td>
                                <td><?php echo $dato['nombre']; ?></td>
                                <td><?php echo $dato['NomUsuario']; ?></td>
                                <td><?php echo $dato['estado'] = 'A' ? '<span class="text-succes"> Activo </span>' : '<span class="text-danger"> Inactivo </span>'; ?></td>
                                <td id="detalles">
                                    <!-- Button trigger modal -->
                                    <a id="iconoEditar" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EncabezadoModal_Agregar" title="Editar Cita"  onclick="seleccionaEncabezado(<?php echo $dato['id_encabezado'] . ',' . 2?>)">
                                        <img src="<?php echo base_url('img/edit.svg');?>" alt="Editar">
                                    </a>

                                    <button id="iconoEliminar" type="button" class="btn btn-ModalLeer" data-bs-toggle="modal" data-bs-target="#modalDetalles" onclick="seleccionaEncabezado(<?php echo $dato['id_encabezado'] . ',' . 2?>)"><i class="fa-solid fa-eye"></i></button>

                                    <a id="iconoEliminar" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal" data-href="<?php echo base_url('/eliminar_Encabezado') . '/' .$dato['id_encabezado']. '/' .'E'; ?>">
                                    <img src="<?php echo base_url('img/trash-2.svg')?>" alt="Borrar">
                                    </a>
                                </td>
                               
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <!-- Modal AGREGAR y EDITAR-->
    <form method="POST" action="<?php echo base_url("insertar_encabezado")?>" autocomplete="off" class="needs-validation" novalidate>

        <div class="modal fade" id="EncabezadoModal_Agregar" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header" id="contenedorTitleModal">
                <h5 class="modal-title" id="titleModal">Nuevo Encabezado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnModal"></button>
              </div>

            <div class="modal-body">

                        <div class="form-floating">
                            <input hidden name="id_encabezado" id="id_encabezado">
                            <input hidden name="tp" id="tp">
                            <input type="text" class="form-control inputVal" name="nomEncabezado" id="nomEncabezado"  onkeyup="capitalizarPrimeraLetra()" placeholder="Nombre del Encabezado" required>
                            <label for="nomEncabezado">Nombre del Encabezado</label>

                            <div class="invalid-feedback" id="invalido">
                                Por favor, Ingrese el Nombre del Encabezado.
                            </div>
                        </div>


                        <div hidden class="form-floating mb-3">

                            <input type="text" value="<?php echo $DatosPerfil['nombre_corto']; ?>" class="form-control vp" name="usuarioCrea" id="nomCorto" placeholder="Nombre Usuario">
                            <label for="floatingInput">Nombre de Usuario:</label>

                            <div class="invalid-feedback" id="invalido">
                                Por favor, Seleccione el Usuario Crea.
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnModal"></button>
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
    
    <!--------------------------------------------------------------- Modal de Detalles -------------------------------------------------------------------------------->
    <div class="modal fade" id="modalDetalles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content">

            <div id="contenedorTitleModal" class="modal-header">
              <h5 id="titleModal" class="modal-title" id="exampleModalLabel">Administrar Detalles</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnModal"></button>
            </div>

            <div id="" class="modal-body">
                <div>
                
                    <div id="btns">
                        <button id="agregar" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#DetallesModal_Agregar" onclick="seleccionaDetalles(<?php echo 1 . ',' . 1?>)">
                            Agregar
                        </button>
                    
                        <a data-bs-toggle="modal" data-bs-target="#EliminadosModalDetalles" id="eliminados" class="btn btn-secondary">Eliminados</a>
                    
                        <!-- <a href="<php echo base_url("/AdminInicio")?>" id="regresar" class="btn btn-primary">Regresar</a> -->
                    
                    </div>
                </div>

                <div class="table-responsive" id="contenidoTable">
                    <table id="example" class="table" style="width:100%">
                        <thead id="th">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Encabezado</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Resumen</th>
                                <th scope="col">Usuario Crea</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody style="font-family:Arial;font-size:17px;">
                            <?php foreach ($detalles as $dato) { ?>
                                <tr>
                                    <td><?php echo $dato['id_detalles']; ?></td>
                                    <td><?php echo $dato['NomEncabezado']; ?></td>
                                    <td><?php echo $dato['nombre']; ?></td>
                                    <td><?php echo $dato['resumen']; ?></td>
                                    <td><?php echo $dato['NomUsuario']; ?></td>
                                    <td><?php echo $dato['estado'] == 'A' ? '<span class="text-success"> Activo </span>' : '<span class="text-danger"> Inactivo </span>'; ?></td>
                                    <td id="detalles">
                                        <!-- Button trigger modal -->
                                        <a id="iconoEditar" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#DetallesModal_Agregar" title="Editar Cita" onclick="seleccionaDetalles(<?php echo $dato['id_detalles'] . ',' . 2?>)">
                                            <img src="<?php echo base_url('img/edit.svg');?>" alt="Editar">
                                        </a>

                                        <a id="iconoEliminar" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModalDetalles" data-href="<?php echo base_url('/eliminar_Detalle') . '/' .$dato['id_detalles']. '/' .'E'; ?>">
                                            <img src="<?php echo base_url('img/trash-2.svg')?>" alt="Borrar">
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Cerrar</button>

              <!-- <a class="btn btn-primary btn-ok">Aceptar</a> -->
            </div>
          </div>

      </div>
    </div>

        <!-- Modal AGREGAR y EDITAR DETALLES-->
        <form method="POST" action="<?php echo base_url("insertar_detalles")?>" autocomplete="off" class="needs-validation" novalidate>

            <div class="modal fade" id="DetallesModal_Agregar" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                <div class="modal-header" id="contenedorTitleModal">
                    <h5 class="modal-title" id="titleModalDetalles">Nuevo Detalle</h5>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalDetalles" aria-label="Close" id="btnModal"></button>
                </div>

                <div class="modal-body">

                            <div class="input-group input-group-lg" style="padding: 10px 0px 35px 0px;">
                                <label class="input-group-text" id="inputGroup-sizing-lg" for="encabezado">Encabezado:</label>
                                <select class="form-select" id="encabezado" name="encabezado" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                                    <option selected>Seleccione Encabezado...</option>
                                    <?php foreach( $encabezado as $enca ) { ?>
                                        <option value="<?php echo $enca['id_encabezado'];?>"> <?php echo $enca["nombre"];?> </option>
                                    <?php } ?>
                                </select>

                                <div class="invalid-feedback" id="invalido">
                                    Por favor, Seleccione un Encabezado.
                                </div>
                            </div>

                            <div class="form-floating">
                                <input hidden name="id_detalles" id="id_detalles">
                                <input hidden name="tp_detalles" id="tp_detalles">
                                <input type="text" class="form-control inputVal" name="nomDetalle" id="nomDetalle"  onkeyup="capitalizarPrimeraLetra()" placeholder="Nombre del Detalle" required>
                                <label for="nomDetalle">Nombre del Detalle</label>

                                <div class="invalid-feedback" id="invalido">
                                    Por favor, Ingrese el Nombre del Detalle.
                                </div>
                            </div>

                            <div style="margin:0; padding:30px 0px 0px 0px;">
                                <div class="form-floating">
                                    <input type="text" class="form-control inputVal" name="resumen" id="resumen" placeholder="Resumen" required>
                                    <label for="resumen">Resumen</label>

                                    <div class="invalid-feedback" id="invalido">
                                        Por favor, Ingrese el Resumen del Detalle.
                                    </div>
                                </div>
                            </div>

                            <div hidden class="form-floating mb-3">

                                <input type="text" value="<?php echo $DatosPerfil['nombre_corto']; ?>" class="form-control vp" name="usuarioCrea" id="nomCorto" placeholder="Nombre Usuario">
                                <label for="floatingInput">Nombre de Usuario:</label>

                                <div class="invalid-feedback" id="invalido">
                                    Por favor, Seleccione el Usuario Crea.
                                </div>

                            </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalDetalles">Cerrar</button>
                    <button type="submit" class="btn btn-success" id="btn_GuardarDetalles">Guardar</button>
                </div>

                </div>
            </div>
            </div>
        </form>


    <!-- Modal BOTON ELIMINAR DETALLES-->
    <form action="">
        <div class="modal fade" id="deleteModalDetalles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">

                <div id="contenedorTitleModal" class="modal-header">
                <h5 id="titleModalDetalles" class="modal-title" id="exampleModalLabel">Eliminación de Detalle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalDetalles" aria-label="Close" id="btnModal"></button>
                </div>

                <div id="" class="modal-body">
                <p id=""> ¿Estas Seguro que desea Eliminar este Registro? </p>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalDetalles">Cancelar</button>

                <a class="btn btn-primary btn-okEliminar">Aceptar</a>
                </div>
            </div>

        </div>
        </div>
    </form>

    <!-- Modal ELIMINAR DETALLES LEER-->
   
        <div class="modal fade" id="EliminadosModalDetalles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div id="contenedorTitleModal" class="modal-header">
                <h5 id="titleModalDetalles" class="modal-title" id="exampleModalLabel">Eliminación de Detalle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalDetalles" aria-label="Close" id="btnModal"></button>
                </div>

                <div id="" class="modal-body">
                    <div class="table-responsive" id="contenidoTable">

                    <table id="example" class="table" style="width:100%">
                        <thead id="th">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Encabezado</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Resumen</th>
                                <th scope="col">Usuario Crea</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody style="font-family:Arial;font-size:17px;">
                            <?php foreach ($detallesEliminados as $dato) { ?>
                                <tr>
                                    <td><?php echo $dato['id_detalles']; ?></td>
                                    <td><?php echo $dato['NomEncabezado']; ?></td>
                                    <td><?php echo $dato['nombre']; ?></td>
                                    <td><?php echo $dato['resumen']; ?></td>
                                    <td><?php echo $dato['NomUsuario']; ?></td>
                                    <td><?php echo $dato['estado'] = 'E' ? '<span class="text-danger"> Inactivo </span>' : '<span class="text-primary"> Activo </span>'; ?></td>
                                    <td id="detalles">
                                        <input href="#" data-href="<?php echo base_url('/eliminar_Detalle') . '/' .$dato['id_detalles']. '/' .'A'; ?>" data-bs-toggle="modal" data-bs-target="#ModalConfirmar" type="image" src="<?php echo base_url('img/refresh-ccw.svg'); ?>" width="16" height="16" title="Activar Registro"></input>
                                    </td>
                                
                            <?php } ?>
                        </tbody>
                    </table>

                    </div>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalDetalles">Regresar</button>

                </div>
            </div>

        </div>
        </div>
 

    <!-- Modal Confirma Eliminar -->
    <div class="modal fade" id="ModalConfirmar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

              <div id="contenedorTitleModal" class="modal-header">
                <h5 id="titleModal" class="modal-title" id="exampleModalLabel">Eliminacón de Registro</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnModal" data-bs-toggle="modal" data-bs-target="#EliminadosModalDetalles"></button>
              </div>

              <div class="modal-body">
                <p>¿Seguro Desea Activar éste Registro?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#EliminadosModalDetalles">Cerrar</button>
                <a class="btn btn-primary btn-okDetalles">Aceptar</a>
              </div>
            </div>

        </div>
    </div>


</body>

    <script>
        // Eliminar Parametros
       $('#deleteModal').on('show.bs.modal', function(e) {
           $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        }); 

        // Eliminar Detalles

        $('#deleteModalDetalles').on('show.bs.modal', function(e) {
            $(this).find('.btn-okEliminar').attr('href', $(e.relatedTarget).data('href'));
        });

        // Restaurar Eliminados Detalles
       $('#ModalConfirmar').on('show.bs.modal', function(e) {
           $(this).find('.btn-okDetalles').attr('href', $(e.relatedTarget).data('href'));
        }); 


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

        // Agregar y Editar PARAMETROS
        function seleccionaEncabezado(id, tp){
            if (tp==2){
                
                dataURL = "<?php echo base_url('buscarinfo_encabezado'); ?>" + "/" + id;
                $.ajax({
                    type:"get",
                    url: dataURL,
                    datatype:"json",
                    success: function(rs) {  
                        console.log(rs); 
                        let data = JSON.parse(rs);               
                        document.getElementById('titleModal').innerText = "Actualizar Registro"  
                        $("#tp").val(2);
                        $("#id_encabezado").val(id);
                        $("#nomEncabezado").val(data[0]['nombre']);
                        $("#usuarioCrea").val(data[0]['usuario_crea']);
                        $("#btn_Guardar").text("Actualizar");
                        $("#paisModal_Agregar").modal("show");
                    },
                    error: function() {
                        alert('Error en Datos de Usuarios. Informe', '');                
                    }
            });

            } else {
                document.getElementById('titleModal').innerText = "Nuevo Encabezado"   
                $("#tp").val(1);
                $("#nomEncabezado").val('');
                $("#usuarioCrea").val('');
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

        });
        } // <--- Se agregó la llave de cierre de la función capitalizarPrimeraLetra


        // -------------------------------------------------------------------- FUNCIONES DE LOS DETALLES ----------------------------------------------------------------------------------

        // Guardar y Editar Detalles
        function seleccionaDetalles(id, tp) {
            if (tp == 2) {

                dataURL = "<?php echo base_url('buscarinfo_detalle'); ?>" + "/" + id;
                $.ajax({
                type: "get",
                url: dataURL,
                datatype: "json",
                success: function (rs) {
                    console.log(rs);
                    let data = JSON.parse(rs);
                    document.getElementById('titleModalDetalles').innerText = "Actualizar Registro Detalle";
                    $("#tp_detalles").val(2);
                    $("#id_detalles").val(id);
                    $("#encabezado").val(data[0]['id_encabezado']);
                    $("#nomDetalle").val(data[0]['nombre']);
                    $("#resumen").val(data[0]['resumen']);
                    $("#usuarioCrea").val(data[0]['usuario_crea']);
                    $("#btn_GuardarDetalles").text("Actualizar");
                    $("#paisModal_Agregar").modal("show");
                },
                error: function () {
                    alert('Error en Datos de Usuarios. Informe', '');
                }
                });

            } else {
                document.getElementById('titleModalDetalles').innerText = "Nuevo Detalle"
                $("#tp_detalles").val(1);
                $("#encabezado").val('');
                $("#nomDetalle").val('');
                $("#resumen").val('');
                $("#usuarioCrea").val('');
                $("#btn_GuardarDetalles").text('Guardar');
            }
        }

    </script>
    
</html>