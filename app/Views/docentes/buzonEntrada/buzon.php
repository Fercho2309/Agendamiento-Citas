<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("css/administradores/allView.css")?>">
    <title>Document</title>
</head>
<body>
    <div id="contenedor">

        <div id="limite" class="border border-3">
                
            <div class="d-flex justify-content-center" id="contenedorTitle">
                <img id="Img" src="<?php echo base_url("img/email.png")?>" alt="Icono Registro Citas">
                <h1 class="title">Buzon Entrada</h1>
            </div>

            <div class="table-responsive" id="contenidoTable">
                            <!-- Estudiante -->

                            <div class="contenedorBuzon" style=" padding:10px;">
                                <div style="padding:10px;">
                                    <?php foreach ($misCitas as $cita): ?>  
                                        <p>Has solicitado una cita con el profesor <strong><?php echo $cita['Dueño']; ?></strong>, con hora de inicio a las <?php echo $cita['hora_de_inicio']; ?> y hora de finalización a las <?php echo $cita['hora_de_finalizacion']; ?> en el aula <?php echo $cita['aula']; ?>, con el siguiente asunto: <?php echo $cita['asuntos']; ?></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>


                        <?php if ($User_session->id_rol == '5'): ?>
                                
                        <!-- Docente -->
                        <div class="contenedorBuzon" style="height: 100vh; padding:10px;">
                            <div style="padding:10px;">
                                <?php foreach ($citasDocente as $cita): ?> 
                                    <p>Se ha registrado una cita en tu agendamiento con el estudiante <strong><?php echo $cita['usuarios'];?> </strong> a las <?php echo $cita['hora_de_inicio']; ?> con hora de finalización a las <?php echo $cita['hora_de_finalizacion']; ?> en el aula <?php echo $cita['aula']; ?>, con el siguiente asunto: <?php echo $cita['asuntos']; ?></p>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                            
                            
            </div>
                        
                        <!-- <div class="contenedor-button">
                            <a href="<= base_url("/DocenteInicio")?>" type="button" class="btn btn-primary" id="regresarCita">Regresar</a>
            </div> -->

        </div>
    </div>

</body>
</html>