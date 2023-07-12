<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("css/estudiantes/registrocita.css")?>">
    <!-- <link rel="stylesheet" href="<php echo base_url('bootstrap/bootstrap.min.css'); ?>">
    <script src="<php echo base_url('bootstrap/bootstrap.bundle.min.js'); ?>"></script> -->
    <script src="<?php echo base_url(); ?>css/jquery-3.6.0.js"></script>
    <script src="https://kit.fontawesome.com/9bccd79f52.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="contenedor-all">

    <div class="from-1">

        <div class="contenedorTitle">
          <img id="registroCitaImg" src="<?php echo base_url("img/registroCitas.png")?>" alt="Icono Registro Citas">
          <h1 class="titulo-registro">Registros Citas</h1>
        </div>

        <div>
            <div id="contBarra">
                <form id="barrabusqueda" class="d-flex" role="search" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" name="enviar">Search</button>
                </form>
            </div>
            
            <div id="btns">
                
                <a href="<?php echo base_url("/solicitar")?>" id="agregar" class="btn btn-success">Agregar</a>

                <a href="<?php echo base_url("/canceladoscitas")?>" id="cancelados" class="btn btn-secondary">Cancelados</a>
                
                <a href="" id="finalizados" class="btn btn-primary">Finalizados</a>

                <a href="<?= base_url("/AdminInicio")?>" type="button" class="btn btn-primary" id="regresarCita">Regresar</a>
                
            </div>
        </div>

        <div class="table-responsive" style="overflow: scroll-vertical !important; overflow-y: scroll !important; height: 600px;">

                <table class="table">
                    <thead id="th">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Aula</th>
                            <th scope="col">Hora de inicio</th>
                            <th scope="col">Hora de finalizacion</th>
                            <th scope="col">Juicio</th>
                            <th scope="col">Disponibilidad</th>
                            <th scope="col">Asunto</th>
                            <th scope="col">estado</th>
                            <th scope="col" colspan="2">Acciones</th>
                        </tr>
                    </thead>

                    <tbody style="font-size:15px;" >
                        <?php foreach ($citas as $dato) { ?>
                        <tr>
                            <td><?php echo $dato['id_cita']; ?></td>
                            <td><?php echo $dato['aula']; ?></td>
                            <td><?php echo $dato['hora_de_inicio']; ?></td>
                            <td><?php echo $dato['hora_de_finalizacion']; ?></td>
                            <td><?php echo $dato['juicio']; ?></td>
                            <td><?php echo $dato['dispon']; ?></td>
                            <td><?php echo $dato['Asunto']; ?></td>
                            <td><?php echo $dato['estado']; ?></td>
                            <td id="detalles">
                                <!-- Button trigger modal -->
                                <a id="iconoEditar" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#DepartamentoModal" >
                                <img src="<?php echo base_url('img/edit.svg');?>" alt="Editar" title="Editar Registro">
                                </a>

                                <button id="iconoEliminar" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <img src="<?php echo base_url('img/trash-2.svg')?>" alt="Borrar">
                                </button>
                            </td>
                               
                        <?php } ?>
                    </tbody>
                </table>

            </div>

      <!-- </div> -->
    </div>
  </div>

</body>
</html>