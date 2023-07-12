<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("css/estudiantes/registrocita.css")?>">
    <link rel="stylesheet" href="<php echo base_url('bootstrap/bootstrap.min.css'); ?>">
    <script src="<php echo base_url('bootstrap/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url(); ?>css/jquery-3.6.0.js"></script>
    <script src="https://kit.fontawesome.com/9bccd79f52.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="contenedor-all">

    <div class="from-1">

        <div class="contenedorTitle">
          <img id="registroCitaImg" src="<?php echo base_url("img/registroCitas.png")?>" alt="Icono Registro Citas">
          <h1 class="titulo-registro">Registros Citas <br> Canceladas</h1>
        </div>

        <div>
            <div id="contBarra">
                <form id="barrabusqueda" class="d-flex" role="search" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" name="enviar">Search</button>
                </form>
            </div>
            
            <div id="btns">
                
                <a href="<?php echo base_url("/registro")?>" id="agregar" class="btn btn-primary">Regresar</a>
                
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
                        
                    </tbody>
                </table>

            </div>

      <!-- </div> -->
    </div>
  </div>

</body>
</html>