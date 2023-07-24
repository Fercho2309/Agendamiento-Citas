<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url("css/administradores/AllView.css")?>">
        <script src="js/prueba.js"></script>
        <title>Eliminados Citas</title>
    </head>
    <body>
        
    <div class="contenedor">
        <div class="limite">
            
            <div class="d-flex justify-content-center" id="contenedorTitle">       
                <img id="Img" src="<?php echo base_url("img/roles.png")?>" alt="Icono Usuarios">
                <h1 id="title">Citas Eliminados</h1>
            </div>
            
            <div>
            
                <div id="btns">
                
                    <a href="<?php echo base_url("/buzonEntrada")?>" id="regresar" class="btn btn-primary">Regresar</a>
                
                </div>
            </div>

            <div class="table-responsive" id="contenidoTable">

                <table id="example" class="table" style="width:100%">
                    <thead id="th">
                        <tr>
                             <th scope="col">#</th>
                                <th scope="col">Profesor</th>
                                <th scope="col">Fecha y Hora de Inicio</th>
                                <th scope="col">Fecha y Hora de Finalización</th>
                                <th scope="col">Lugar de Reunion</th>
                                <th scope="col">Asunto</th>
                                <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody style="font-family:Arial;font-size:17px;">
                        <?php foreach ($misCitas as $cita) { ?>
                                <tr>
                                    <th scope="row"><?php echo $cita['id_cita']; ?></th>
                                    <td><?php echo $cita['Dueño']; ?></td>
                                    <td><?php echo $cita['hora_de_inicio']; ?></td>
                                    <td><?php echo $cita['hora_de_finalizacion']; ?></td>
                                    <td><?php echo $cita['aula']; ?></td>
                                    <td><?php echo $cita['asuntos']; ?></td>
                                    <td><?php echo $dato['estado'] = 'E' ? '<span class="text-danger"> Cancelado </span>' : '<span class="text-primary"> Activo </span>'; ?></td>
                                </tr>
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


