<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url("css/administradores/AllView.css")?>">
        <script src="js/prueba.js"></script>
        <title>Eliminados Encabezado</title>
    </head>
    <body>
        
    <div class="contenedor">
        <div class="limite">

            <div class="d-flex justify-content-center" id="contenedorTitle">       
                <img id="Img" src="<?php echo base_url("img/encabezamiento.png")?>" alt="Icono Usuarios">
                <h1 id="title">Administrador Encabezados Eliminados</h1>
            </div>

            <div>

                <div id="btns">
                
                    <a href="<?php echo base_url("/encabezado")?>" id="regresar" class="btn btn-primary">Regresar</a>
                
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
                                <td><?php echo $dato['estado'] = 'E' ? '<span class="text-danger"> Inactivo </span>' : '<span class="text-primary"> Activo </span>'; ?></td>
                                <td id="detalles">
                                    <input href="#" data-href="<?php echo base_url('/eliminar_Encabezado') . '/' .$dato['id_encabezado']. '/' .'A'; ?>" data-bs-toggle="modal" data-bs-target="#ModalConfirmar" type="image" src="<?php echo base_url('img/refresh-ccw.svg'); ?>" width="16" height="16" title="Activar Registro"></input>
                                </td>
                               
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

       <!-- Modal Confirma Eliminar -->
       <div class="modal fade" id="ModalConfirmar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

              <div id="contenedorTitleModal" class="modal-header">
                <h5 id="titleModal" class="modal-title" id="exampleModalLabel">Eliminacón de Registro</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnModal"></button>
              </div>

              <div class="modal-body">
                <p>¿Seguro Desea Activar éste Registro?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a class="btn btn-primary btn-ok">Aceptar</a>
              </div>
            </div>

        </div>
    </div>

</body>

    <script>
        $('#ModalConfirmar').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>

</html>