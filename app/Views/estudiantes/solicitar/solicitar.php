  <!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://kit.fontawesome.com/9bccd79f52.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="<?php echo base_url("css/administradores/AllView.css")?>">

    <script src="<?= base_url('/css/jquery-3.6.0.js'); ?>"></script>

    <script src="<?= base_url('fullcalendar/moment-with-locales.js'); ?>"></script> <!-- Moment.js -->

    <script src="<?= base_url('fullcalendar/index.global.min.js'); ?>"></script> <!-- FullCalendar.js -->
    <script src="<?= base_url('fullcalendar/index.global.js'); ?>"></script> <!-- FullCalendar.js -->
    <script src="<?= base_url('fullcalendar/es.global.min.js'); ?>"></script> <!-- FullCalendarEspañol.js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script> -->

    <script src="<?= base_url('fullcalendar/toastr.min.js'); ?>"></script> <!-- Toastr.js -->

    <script src="<?= base_url('sweetAlert/dist/sweetalert2.all.min.js'); ?>"></script> <!-- SweetAlert.js -->

    <title>Solicitar Citas</title>
    
</head>

<body>

  <div class="contenedor">

    <div class="limite">  

      
      <div class="d-flex justify-content-center" id="contenedorTitle">       
          <img id="Img" src="<?php echo base_url("img/calendarioModificado.png")?>" alt="Icono calendario">
          <h1 id="title">Solicitar Cita</h1>
      </div>
      
      <!-- Formulario -->
      <form method="POST" action="<?php echo base_url('traer_disp_docente')?>" autocomplete="off" class="needs-validation" novalidate>

        <div class="container px-4" style="padding-top:20px;">
          <div class="row gx-5">

            <div class="input-group cola">
              <select class="form-select form-select-lg mb-3 valida" id="tipoUsuario" name="tipoUsuario" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required onchange="submitForm()">
                <option selected>Seleccione Nombre:</option>
                <?php foreach( $RNombres as $dato ) { ?>
                  <option value="<?php echo $dato['id_usuario']; ?>"><?php echo $dato["NomRol"] . ' ' . $dato["NomRol2"] . ' ' . $dato["NomRol3"] . ' ' . $dato["NomRol4"]; ?></option>
                <?php } ?>
              </select>
            </div>

          </div>
          <div id="alert-container">
            <?php if (isset($_GET['alert'])): ?>
              <script>
                var alertMessage = "<?php echo $_GET['alert']; ?>";
                var alertContainer = document.getElementById("alert-container");
                alertContainer.innerHTML = "<div class='alert'>" + alertMessage + "</div>";
              </script>
            <?php endif; ?>
          </div>
        </div>

      </form>
      <!-- Fin Formulario -->
      
      <div class="container">
        <div id="calendar" style="padding: 30px 0px;"></div>
      </div>

      <form method="POST" action="<?= base_url("insertar_Cita")?>" autocomplete="off" id="formulario">
        <input hidden type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="Ej: 2">

        <div class="modal fade" id="MyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="titulo">Agendar Cita:</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- <div hidden class="alert alert-danger" role="alert" id="mensajeError"></div> -->

                    <div class="modal-body">

                        <input hidden name="id_calendario" id="id_calendario">
                        <!-- <input hidden name="tp" id="tp" value="1"> -->

                        <div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="titlesV" name="titlesV" placeholder="Evento" disabled>
                                <label for="titles" class="form-label">Evento</label>
                            </div>

                            <div hidden class="form-floating mb-3">
                                <input type="text" class="form-control" id="titles" name="titles" placeholder="Evento" required>
                                <label for="title" class="form-label">Evento</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="aulasV" name="aulasV" placeholder="Evento" disabled>
                                <label for="aulas" class="form-label">aulas</label>
                            </div>

                            <div hidden class="form-floating mb-3">
                                <input type="text" class="form-control" id="aulas" name="aulas" placeholder="Evento" required>
                                <label for="aulas" class="form-label">aulas</label>
                            </div>

                            <div hidden class="form-floating mb-3">
                                <!-- <input type="text" class="form-control" id="evento" name="evento" placeholder="Evento" required> -->
                                <!-- <label for="evento" class="form-label">Evento</label> -->
                                <input type="text" id="id_evento" name="id_evento">
                            </div>

                            <div class="form-floating mb-3">
                              <div class="input-group input-group-lg">

                                <label class="input-group-text" id="inputGroup-sizing-lg" for="asunto">Asunto:</label>
                                <select class="form-select" id="asunto" name="asunto" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                                  <?php foreach( $asunto as $Asun ) { ?>
                                    <option value="<?php echo $Asun['id_asunto'];?>"> <?php echo $Asun["asunto"];?> </option>
                                  <?php } ?>
                                </select>

                              </div>
                            </div>
                            

                            <div class="form-floating mb-3">
                                <input type="datetime-local" class="form-control" id="startV" name="startV" placeholder="Seleccione la Hora de Inicio" disabled>
                                <label for="startV">Fecha de Inicio</label>
                            </div>

                            <div hidden class="form-floating mb-3">
                                <input type="datetime-local" class="form-control" id="start" name="start" placeholder="Seleccione la Hora de Inicio" required>
                                <label for="start">Fecha de Inicio</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="datetime-local" class="form-control" id="endV" name="endV" placeholder="Seleccione la Hora de Finalización" disabled>
                                <label for="endV">Fecha de Final</label>
                            </div>

                            <div hidden class="form-floating mb-3">
                                <input type="datetime-local" class="form-control" id="end" name="end" placeholder="Seleccione la Hora de Finalización" required>
                                <label for="end">Fecha de Final</label>
                            </div>

                            <div hidden class="form-floating mb-3">
                                <input type="text" class="form-control" id="estado" name="estado" value="A" placeholder="Seleccione la Hora de Finalización" required>
                                <label for="estado">Estado</label>
                            </div>
<!-- 
                            <div class="form-floating mb-3">
                                <label for="dueño">Dueño</label>
                                <php foreach ($usuarios as $usu): ?>
                                    <input type="text" class="form-control" id="dueño" name="dueño" placeholder="Seleccione la Hora de Finalización" value="<php echo $usu['id_usuario'];?>"> <php echo $usu["nombre_corto"];?>>
                                <php endforeach; ?>
                            </div> -->
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info" id="btnAccion" name="btnAccion"  >Registrar</button>
                    </div>


                </div>
            </div>
        </div>
    </form>

    </div>
  </div>

</body>

<script>

    function submitForm() {
        document.forms[0].submit();
      }

        let formulario = document.querySelector('#formulario');

        let inputIdEvento = document.querySelector('#id_evento');

        let inputId = document.querySelector('#id_calendario');
        let inputTitulo = document.querySelector("#titles");
        let inputTituloFalso = document.querySelector("#titlesV");
        let inputAulas = document.querySelector("#aulas");
        let inputAulasFalso = document.querySelector("#aulasV");
        let inputAsunto = document.querySelector("#asunto");
        let inputFechaInicio = document.querySelector("#start");
        let inputFechaInicioFalso = document.querySelector("#startV");
        let inputFechaFinal = document.querySelector("#end");
        let inputFechaFinalFalso = document.querySelector("#endV");
        let inputColor = document.querySelector("#color");

        let tituloModal = document.querySelector("#titulo");
        let btnAgregar = document.querySelector("#btnAccion");
          
        let modalEvento;


modalEvento = new bootstrap.Modal(document.getElementById('MyModal'), {
    keyboard: false
});

// $(document).on('blur', '.valida', function(event) {
//   let tomar_valor = parseInt(document.getElementById("tipoUsuario").value);
//   selectusu(tomar_valor);
// });

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'timeGridWeek',
    locale: 'es',
    headerToolbar: {
      left: 'prev,next',
      center: 'title',
      right: 'timeGridWeek,timeGridDay'
    },
    slotLabelInterval: '00:30:00',
    selectable: true,
    editable: false,
    events: [
      <?php 
      if ($disp_docente) {
        foreach ($disp_docente as $event) {
          if ($event['estado'] === 'A' || $event['estado'] === 'N') {
            $start = new DateTime($event['start']);
            $end = new DateTime($event['end']);
            $intervalo = new DateInterval('PT30M'); // Intervalo de 30 minutos
            $intervalos = new DatePeriod($start, $intervalo, $end);

            foreach ($intervalos as $interval) { ?>
              {
                id: "<?php echo $event['id']?>",
                title: "<?php echo ($event['estado'] === 'N') ? 'Disponible' : $event['title'];?>",
                aulas: "<?php echo $event['aulas'];?>",
                start: "<?php echo $interval->format('Y-m-d H:i:s');?>",
                end: "<?php echo $interval->add($intervalo)->format('Y-m-d H:i:s');?>",
                color: "<?php echo $event['color'];?>",
                estado: "<?php echo $event['estado'];?>",
              },
            <?php 
            }
          } 
        }
      }
      ?>
    ],
    eventClick: function(info) {
      // console.log(info.event.extendedProps)
      const estado = info.event.extendedProps.estado;
      if( estado === 'A'){//A: Agendado - No disponible, Predeterminado es N (No agendado) - Disponible;
          Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Esta cita ya ha sido reservada',
            showConfirmButton: false,
            timer: 4000,
          });
          return false; // Evita hacer clic en eventos con estado "E"

      }
      // }

      modalEvento.show();
        
      let evento = info.event;
      let id = evento.id;
      let titulo = info.event.title;
      let aulas = info.event.extendedProps.aulas;
      let fechaInicio = moment(evento.start).format('YYYY-MM-DDTHH:mm');
      let fechaFinal = moment(evento.start).add(30, 'minutes').format('YYYY-MM-DDTHH:mm');

      inputIdEvento.value = id;
      inputId.value = id;
      inputTitulo.value = titulo;
      inputTituloFalso.value = titulo;
      inputAulas.value = aulas;
      inputAulasFalso.value = aulas;
      originalFechaInicio = fechaInicio;
      originalFechaInicioFalso = fechaInicio;
      inputFechaInicio.value = fechaInicio;
      inputFechaInicioFalso.value = fechaInicio;
      inputFechaFinal.value = fechaFinal;
      inputFechaFinalFalso.value = fechaFinal;

      modalEvento.show();
    },
  });

  calendar.render();
  console.log(<?php echo json_encode($disp_docente); ?>);
});


</script>

</html>


