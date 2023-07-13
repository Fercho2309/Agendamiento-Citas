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
                <img id="Img" src="<?php echo base_url("img/email.png")?>" alt="Icono Registro Citas">
                <h1 id="title">Buzon Entrada</h1>
            </div>
     
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

                        <caption>Lista de Citas Solicitadas por Acudientes o Estudiantes y Profesores</caption>
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

</body>
</html>