<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url("css/administradores/allViews.css")?>">
        <script src="js/prueba.js"></script>
        <title>Document</title>
    </head>
    <body>
        
        <div id="contenedor">
            <div id="limite" class="border border-3">
                    
                <div class="d-flex justify-content-center" id="contenedorTitle">       
                    <img id="Img" src="<?php echo base_url("img/telefono.png")?>" alt="Icono Usuarios">
                    <h1 id="title">Administrador de Telefonos</h1>
                </div>

                <div>

                    <div id="btns">
                        <button id="agregar" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#telefonoModal_Agregar" onclick="seleccionaTelefono(<?php echo 1 . ',' . 1?>)">
                            Agregar
                        </button>
                    
                        <a href="<?php echo base_url("/eliminados_Telefonos")?>" id="eliminados" class="btn btn-secondary">Eliminados</a>
                    
                        <a href="<?= base_url("/AdminInicio")?>" id="regresar" class="btn btn-primary">Regresar</a>
                    
                    </div>
                </div>

                <div class="table-responsive" id="contenidoTable">

                    <table id="example" class="table" style="width:100%">
                        <thead id="th">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">tipo de telefono</th>
                                <th scope="col">numero</th>
                                <th scope="col">Prioridad</th>
                                <th scope="col">Usuario Dueño</th>
                                <th scope="col">Usuario Crea</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody style="font-family:Arial;font-size:17px;">
                            <?php 
                            foreach ($telefono as $dato) { ?>
                                <tr>
                                    <td><?php echo $dato['id_telefono']; ?></td>
                                    <td><?php echo $dato['numTelefono']; ?></td>
                                    <td><?php echo $dato['numero']; ?></td>
                                    <td><?php echo $dato['prioridad']?></td>
                                    <td><?php echo $dato['NomUsuario']; ?></td>
                                    <td><?php echo $dato['UsuarioCrea']?></td>
                                    <td><?php echo $dato['estado'] = 'A' ? '<span class="text-succes"> Activo </span>' : '<span class="text-danger"> Inactivo </span>'; ?></td> 
                                    <td id="detalles">

                                        <!-- Button trigger modal -->
                                        <a id="iconoEditar" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#telefonoModal_Agregar" title="Editar Cita" onclick="seleccionaTelefono(<?php echo $dato['id_telefono'] . ',' . 2?>)">
                                            <img src="<?php echo base_url('img/edit.svg');?>" alt="Editar">
                                        </a>

                                        <a id="iconoEliminar" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal" data-href="<?php echo base_url('/eliminar_Telefonos') . '/' .$dato['id_telefono']. '/' .'E'; ?>">
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
    <form method="POST" action="<?php echo base_url("insertar_telefonos")?>" autocomplete="off" class="needs-validation" novalidate>

        <div class="modal fade" id="telefonoModal_Agregar" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header" id="contenedorTitleModal">
                        <h5 class="modal-title" id="titleModal" >Nuevo Telefono</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnModal"></button>
                    </div>

                    <div class="modal-body">

                        <input hidden id="tp" name="tp">
                        <input hidden id="id_telefono" name="id_telefono">

                        <div class="container">
                            <div class="row g-2">

                                <div class="col-6">
                                    <div class="p-3">
                                        <div class="input-group input-group-lg">
                                            <label class="input-group-text" id="inputGroup-sizing-lg" for="tpTelefono">Tipo de telefono:</label>
                                            <select class="form-select" id="tpTelefono" name="tpTelefono" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                                                <?php foreach( $tipoTel as $Tel ) { ?>
                                                    <option value="<?php echo $Tel['id_detalles'];?>"> <?php echo $Tel["nombre"];?> </option>
                                                <?php } ?>
                                            </select>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Tipo de Telefono.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="p-3">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Numero de telefono" required>
                                            <label for="telefono">numero de telefono</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Número de Telefono.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="p-3">
                                        <div class="input-group input-group-lg">
                                            <label class="input-group-text" id="inputGroup-sizing-lg" for="prioridad">Prioridad:</label>
                                            <select class="form-select" id="prioridad" name="prioridad" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                                                <?php foreach( $prioridad as $prio ) { ?>
                                                    <option value="<?php echo $prio['id_detalles'];?>"> <?php echo $prio["nombre"];?> </option>
                                                <?php } ?>
                                            </select>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese la Prioridad del Telefono.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="p-3">
                                        <div class="input-group input-group-lg">
                                            <label class="input-group-text" id="inputGroup-sizing-lg" for="Dusuario">Usuario Dueño:</label>
                                            <select class="form-select" id="Dusuario" name="Dusuario" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                                                <?php foreach( $usuarios as $usu ) { ?>
                                                    <option value="<?php echo $usu['id_usuario'];?>"> <?php echo $usu["nombre_corto"];?> </option>
                                                <?php } ?>
                                            </select>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese el Usuario Dueño.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="p-3">
                                        <div class="input-group input-group-lg" >
                                            <label class="input-group-text" id="inputGroup-sizing-lg" for="nomUsuario">Usuario Crea:</label>
                                            <select class="form-select" id="nomUsuario" name="nomUsuario" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                                                <?php foreach( $creausuarios as $usu ) { ?>
                                                    <option value="<?php echo $usu['id_usuario'];?>"><?php echo $usu["nombre_corto"];?> </option>
                                                <?php } ?>
                                            </select>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese el Usuario Crea.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- <br> -->
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

    </body>

    <script>
         $('#deleteModal').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
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

        function seleccionaTelefono(id, tp){
            if (tp==2){
                
                dataURL = "<?php echo base_url('buscarinfo_telefono'); ?>" + "/" + id;
                $.ajax({
                    type:"get",
                    url: dataURL,
                    datatype:"json",
                    success: function(rs) {  
                        console.log(rs);      
                        let data = JSON.parse(rs);
                        // console.log(data)          
                        document.getElementById('titleModal').innerText = "Actualizar Registro"  
                        $("#tp").val(2);
                        $("#id_telefono").val(id);
                        $("#tpTelefono").val(data[0]['tipo_telefono']);
                        $("#telefono").val(data[0]['numero']);
                        $("#prioridad").val(data[0]['prioridad']);
                        $("#Dusuario").val(data[0]['id_usuario']);
                        $("#nomUsuario").val(data[0]['usuario_crea']);
                        $("#btn_Guardar").text("Actualizar");
                        $("#telefonoModal_Agregar").modal("show");
                    },

                    error: function() {
                        alert('Error en Datos de Usuarios. Informe', '');                
                    }
            });

            } else {
                document.getElementById('titleModal').innerText = "Nuevo telefono"   
                $("#tp").val(1);
                $("#tpTelefono").val('');
                $("#telefono").val('');
                $("#prioridad").val('');
                $("#Dusuario").val('');
                $("#nomUsuario").val('');
                $("#btn_Guardar").text('Guardar');
            }

        };

    </script>
</html>