<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url("css/administradores/allViews.css")?>">
        <script src="js/prueba.js"></script>
        <title>Permisos</title>
    </head>
    <body>
        
    <div id="contenedor">
        <div id="limite" class="border border-3">

            <div class="d-flex justify-content-center" id="contenedorTitle">       
                <img id="Img" src="<?php echo base_url("img/permiso.png")?>" alt="Icono Usuarios">
                <h1 id="title">Administrador de Permisos</h1>
            </div>

            <div>
            
                <div id="btns">
                    <button id="agregar" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#PermisosModal_Agregar" onclick="seleccionaPermisos(<?php echo 1 . ',' . 1?>)">
                        Agregar
                    </button>
                
                    <a href="<?php echo base_url("/eliminados_Permisos")?>" id="eliminados" class="btn btn-secondary">Eliminados</a>
                
                    <a href="<?php echo base_url("/AdminInicio")?>" id="regresar" class="btn btn-primary">Regresar</a>
                
                </div>
            </div>

            <div class="table-responsive" id="contenidoTable">

                <table id="example" class="table" style="width:100%">
                    <thead id="th">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Acciones</th>
                            <th scope="col">Usuario Crea</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones1</th>
                        </tr>
                    </thead>
                    <tbody style="font-family:Arial;font-size:17px;">
                        <?php foreach ($permiso as $dato) { ?>
                            <tr>
                                <td><?php echo $dato['id_permisos']; ?></td>
                                <td><?php echo $dato['NomRoles']; ?></td>
                                <td><?php echo $dato['NomAcciones']; ?></td>
                                <td><?php echo $dato['NomUsuario']; ?></td>
                                <td><?php echo $dato['estado'] = 'A' ? '<span class="text-succes"> Activo </span>' : '<span class="text-danger"> Inactivo </span>'; ?></td>
                                <td id="detalles">
                                    <!-- Button trigger modal -->
                                    <a id="iconoEditar" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#PermisosModal_Agregar" title="Editar Cita" onclick="seleccionaPermisos(<?php echo $dato['id_rol'] . ',' . 2?>)">
                                        <img src="<?php echo base_url('img/edit.svg');?>" alt="Editar">
                                    </a>

                                    <a id="iconoEliminar" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal" data-href="<?php echo base_url('/eliminar_Permisos') . '/' .$dato['id_permisos']. '/' .'E'; ?>">
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
    <form method="POST" action="<?php echo base_url("insertar_permisos")?>" autocomplete="off" class="needs-validation" novalidate>

        <div class="modal fade" id="PermisosModal_Agregar" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header" id="contenedorTitleModal">
                <h5 class="modal-title" id="titleModal">Nuevos Permisos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnModal"></button>
              </div>

            <div class="modal-body">

                <input hidden name="id_permiso" id="id_permiso">
                <input hidden name="tp" id="tp">

                <div class="input-group input-group-lg" style="margin:0; padding:10px 0px 20px 0px;">

                    <label class="input-group-text" id="inputGroup-sizing-lg" for="roles">Roles:</label>
                    <select class="form-select" id="roles" name="roles" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                        <option selected>Seleccione Rol...</option>
                        <?php foreach( $roles as $rol ) { ?>
                            <option value="<?php echo $rol['id_rol'];?>"> <?php echo $rol["nombre"];?> </option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback" id="invalido">
                        Por favor, Seleccione un Rol.
                    </div>
                </div>

                <div class="input-group input-group-lg" style="margin:0; padding:10px 0px 10px 0px;">
                    <label class="input-group-text" id="inputGroup-sizing-lg" for="acciones">Acciones:</label>
                    <select class="form-select" id="acciones" name="acciones" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                        <option selected>Seleccione Acciones...</option>
                        <?php foreach( $acciones as $accion ) { ?>
                            <option value="<?php echo $accion['id_acciones'];?>"> <?php echo $accion["nombre"];?> </option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback" id="invalido">
                        Por favor, Seleccione una Acción.
                    </div>
                </div>

                <div class="input-group input-group-lg" style="margin:0; padding:20px 0px 0px 0px;">
                    <label class="input-group-text" id="inputGroup-sizing-lg" for="usuarioCrea">Usuario Crea:</label>
                    <select class="form-select" id="usuarioCrea" name="usuarioCrea" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                        <option selected>Seleccione Usuario Crea...</option>
                        <?php foreach( $usuarios as $usu ) { ?>
                            <option value="<?php echo $usu['id_usuario'];?>"> <?php echo $usu["nombre_corto"];?> </option>
                        <?php } ?>
                    </select>
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

        function seleccionaPermisos(id, tp){
            if (tp==2){
                
                dataURL = "<?php echo base_url('buscarinfo_Permisos'); ?>" + "/" + id;

                $.ajax({
                    type:"get",
                    url: dataURL,
                    datatype:"json",
                    success: function(rs) {  
                        console.log(rs);      
                        let data = JSON.parse(rs);
                        console.log(data);         
                        console.log(data[0]['id_rol']); 
                              
                        document.getElementById('titleModal').innerText = "Actualizar Registro"  
                        $("#tp").val(2);
                        $("#id_permiso").val(id);
                        $("#roles").val(data[0]['id_rol']);
                        $("#acciones").val(data[0]['id_acciones']);
                        $("#usuarioCrea").val(data[0]['usuario_crea']);
                        $("#btn_Guardar").text("Actualizar");
                        $("#paisModal_Agregar").modal("show");
                    },
                    error: function() {
                        alert('Error en Datos de Usuarios. Informe', '');                
                    }
            });

            } else {
                document.getElementById('titleModal').innerText = "Nuevo Usuario"   
                $("#tp").val(1);
                $("#roles").val('');
                $("#acciones").val('');
                $("#usuarioCrea").val('');
                $("#btn_Guardar").text('Guardar');
            }

        };
    </script>
    
</html>