<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("css/administradores/AllView.css")?>">
    <script src="js/prueba.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="contenedor">

        <div class="limite">
                
            <div class="d-flex justify-content-center" id="contenedorTitle">
                <img id="Img" src="<?php echo base_url("img/email.png")?>" alt="Icono Registro Citas">
                <h1 id="title">Buzon de Citas</h1>
            </div>


                    <?php if ($User_session->id_rol == '4' || $User_session->id_rol == '1'): ?>
                        <div id="btns">
                            <a href="<?php echo base_url("/eliminados_Buzon")?>" id="eliminados"
                                class="btn btn-secondary">Eliminados</a>
                        </div>
                    <?php endif; ?>

            <div class="table-responsive" id="contenidoTable">
                <table class="table caption-top" id="example" style="width:100%">
                    <?php if ($User_session->id_rol == '4'): ?>
                        <caption>Lista de Citas Solicitadas</caption>
                        <thead id="th">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Profesor</th>
                                <th scope="col">Fecha y Hora de Inicio</th>
                                <th scope="col">Fecha y Hora de Finalización</th>
                                <th scope="col">Lugar de Reunion</th>
                                <th scope="col">Asunto</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Eliminar Cita</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($misCitas as $cita) { ?>
                                <tr>
                                    <th scope="row"><?php echo $cita['id_cita']; ?></th>
                                    <td><?php echo $cita['Dueño']; ?></td>
                                    <td><?php echo $cita['hora_de_inicio']; ?></td>
                                    <td><?php echo $cita['hora_de_finalizacion']; ?></td>
                                    <td><?php echo $cita['aula']; ?></td>
                                    <td><?php echo $cita['asuntos']; ?></td>
                                    <td><?php echo $dato['estado'] = 'A' ? '<span class="text-succes"> Activo </span>' : '<span class="text-danger"> Inactivo </span>'; ?>
                                    <td id="detalles">

                                    <a id="iconoEliminar" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal" data-href="<?php echo base_url('/eliminar_cita') . '/' .$cita['id_cita']. '/' .'E'; ?>">
                                    <img src="<?php echo base_url('img/trash-2.svg')?>" alt="Borrar" title="Eliminar Cita">
                                    </a>

                                    </td>
                                </tr>
                            <?php } ?>
                    <?php endif; ?>

                    <?php if ($User_session->id_rol == '5'): ?>
                        <caption>Lista de Citas Registradas</caption>
                        <thead id="th">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Estudiante o Acudiente</th>
                                <th scope="col">Fecha y Hora de Inicio</th>
                                <th scope="col">Fecha y Hora de Finalización</th>
                                <th scope="col">Lugar de Reunion</th>
                                <th scope="col">Asunto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($citasDocente as $citas) { ?>
                                <tr>
                                    <th scope="row"><?php echo $citas['id_cita']; ?></th>
                                    <td><?php echo $citas['usuarios'];?></td>
                                    <td><?php echo $citas['hora_de_inicio']; ?></td>
                                    <td><?php echo $citas['hora_de_finalizacion']; ?></td>
                                    <td><?php echo $citas['aula']; ?></td>
                                    <td><?php echo $citas['asuntos']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php endif; ?>

                    <?php if ($User_session->id_rol == '1'): ?>

                        <caption>Lista de Citas Solicitadas Estudiante o Acudiente y Profesor</caption>
                        <thead id="th">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Estudiante o Acudiente</th>
                                <th scope="col">Profesor</th>
                                <th scope="col">Fecha y Hora de Inicio</th>
                                <th scope="col">Fecha y Hora de Finalización</th>
                                <th scope="col">Lugar de Reunion</th>
                                <th scope="col">Asunto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($RSAdmin as $citas) { ?>
                                <tr>
                                    <th scope="row"><?php echo $citas['id_cita']; ?></th>
                                    <td><?php echo $citas['usuarios'];?></td>
                                    <td><?php echo $citas['Dueño']; ?></td>
                                    <td><?php echo $citas['hora_de_inicio']; ?></td>
                                    <td><?php echo $citas['hora_de_finalizacion']; ?></td>
                                    <td><?php echo $citas['aula']; ?></td>
                                    <td><?php echo $citas['asuntos']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php endif; ?>
                </table>   
            </div>
        </div>
    </div>

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
</script>
</html>