<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="<?= base_url('css/docentes/Agendamientos.css')?>">
    <link rel="stylesheet" href="<?= base_url('fullcalendar/toastr.min.css')?>"> <!-- Toastr.css -->

    <script src="<?= base_url('/css/jquery-3.6.0.js'); ?>"></script>

    <script src="<?= base_url('fullcalendar/moment-with-locales.js'); ?>"></script> <!-- Moment.js -->

    <script src="<?= base_url('fullcalendar/index.global.min.js'); ?>"></script> <!-- FullCalendar.js -->
    <script src="<?= base_url('fullcalendar/index.global.js'); ?>"></script> <!-- FullCalendar.js -->
    <script src="<?= base_url('fullcalendar/es.global.min.js'); ?>"></script> <!-- FullCalendarEspañol.js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script> -->

    <script src="<?= base_url('fullcalendar/toastr.min.js'); ?>"></script> <!-- Toastr.js -->

    <script src="<?= base_url('sweetAlert/dist/sweetalert2.all.min.js'); ?>"></script> <!-- SweetAlert.js -->

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let calendarEl = document.getElementById('calendar');
            let inputFechaInicio = document.getElementById('start');
            let inputFechaFinal = document.getElementById('end');

            let calendar = new FullCalendar.Calendar(calendarEl, {
                // Otras opciones de configuración del calendario...

                selectable: true, // Permite la selección de fechas
                select: function (info) {
                    // La función se ejecuta cuando se selecciona una fecha

                    // Actualizar los inputs con las fechas seleccionadas
                    inputFechaInicio.value = info.start.toISOString().slice(0, 16);
                    inputFechaFinal.value = info.end.toISOString().slice(0, 16);

                    // Abrir el modal o realizar otras acciones necesarias
                    let modalEvento;

                    modalEvento = new bootstrap.Modal(document.getElementById('MyModal'), {
                        keyboard: false
                    });

                     modalEvento.show();
                }
            });

            calendar.render();
        });

        // Resto de tu código JavaScript...
    </script>
</head>

<body>
    
    <!-- <div class="d-flex justify-content-center" id="contenedorTitle">       
          <img id="Img" src="<php echo base_url("img/calendarioModificado.png")?>" alt="Icono calendario">
          <h1 id="title">Disponibilidad Cita</h1>
      </div> -->
    <div class="container">
        <div id="calendar" style="padding: 30px 0px;"></div>
    </div>

      

    <form method="POST" action="<?= base_url("insertar_Calendario")?>" autocomplete="off" id="formulario">
        <input hidden type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="Ej: 2">

        <div class="modal fade" id="MyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="titulo">Eventos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div hidden class="alert alert-danger" role="alert" id="mensajeError"></div>

                    <div class="modal-body">

                        <input hidden name="id_calendario" id="id_calendario">
                        <!-- <input hidden name="tp" id="tp" value="1"> -->

                        <div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="titlesV" name="titlesV" placeholder="Evento" disabled required>
                                <label for="titlesV" class="form-label">Evento</label>
                            </div>

                            <div hidden class="form-floating mb-3">
                                <input type="text" class="form-control" id="titles" name="titles" placeholder="Evento" required>
                                <label for="title" class="form-label">Evento</label>
                            </div>

                            <div  class="form-floating mb-3">
                                <input type="text" class="form-control" id="aulas" name="aulas" placeholder="Evento" required>
                                <label for="aulas" class="form-label">Aulas</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="datetime-local" class="form-control" id="start" name="start" placeholder="Seleccione la Hora de Inicio" required>
                                <label for="start">Fecha de Inicio</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="datetime-local" class="form-control" id="end" name="end" placeholder="Seleccione la Hora de Finalización" required>
                                <label for="end">Fecha de Final</label>
                            </div>


                            <div class="form-floating mb-3">
                                <input type="color" class="form-control" id="color" name="color" placeholder="Color" required>
                                <label for="color">Color</label>
                            </div>

                            <!-- <div hidden class="form-floating mb-3">
                                <input type="text" value="<= $DatosPerfil['nombre_corto']; ?>" class="form-control" id="usuarioCrea" name="usuarioCrea" readonly required>
                                <label for="usuarioCrea">Usuario Crea:</label>
                            </div> -->

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="btnEliminar" onClick="eliminar_evento()">Eliminar</button>
                        <button type="submit" class="btn btn-info" id="btnAccion" name="btnAccion">Registrar</button>
                    </div>


                </div>
            </div>
        </div>
    </form>

</body>

</html>



<script>
    
let formulario = document.querySelector('#formulario');

let inputId = document.querySelector('#id_calendario');
let inputTitulo = document.querySelector("#titles");
let inputTituloFalso = document.querySelector("#titlesV");
let inputAulas = document.querySelector("#aulas");
let inputFechaInicio = document.querySelector("#start");
let inputFechaFinal = document.querySelector("#end");
let inputColor = document.querySelector("#color");

let tituloModal = document.querySelector("#titulo");
let btnAgregar = document.querySelector("#btnAccion");
let btnEliminar = document.querySelector("#btnEliminar");
// let divAlerta = document.querySelector("#mensajeError");

let modalEvento;


modalEvento = new bootstrap.Modal(document.getElementById('MyModal'), {
    keyboard: false
});

// console.log(modalEvento);

document.addEventListener('DOMContentLoaded', function() {
    let calendarEl = document.getElementById('calendar');
    let BASE_URL = '<?= base_url()?>';
    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        // initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
            left: 'prev,next',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        editable: true,
        selectable: true,
        slotLabelInterval: '00:30:00', // Etiquetas de intervalo de tiempo de 30 minutos
        slotEventOverlap: false, // Evitar que los eventos se superpongan
        select: function(info) {
            var fechaInicio1 = moment(info.start).subtract(5, 'hours').toISOString().slice(0, 16);
            var fechaFinal1;

            if (info.view.type === 'dayGridMonth') {
                fechaFinal1 = moment(info.end).subtract(1, 'days').subtract(5, 'hours').toISOString().slice(0, 16);
            } else {
                fechaFinal1 = moment(info.end).subtract(5, 'hours').subtract(30, 'minutes').toISOString().slice(0, 16);
            }

            inputId.value = ''; // Limpia el campo de ID al crear un nuevo evento
            inputTitulo.value = 'Disponible';
            inputTituloFalso.value = 'Disponible';
            inputAulas.value = '';
            inputFechaInicio.value = fechaInicio1;
            inputFechaFinal.value = fechaFinal1;
            inputColor.value = '';

            $("#btnAccion").text('Registrar'); // Cambia el texto del botón de acción a "Registrar"
            btnEliminar.style.display = "none"; // Oculta el botón de eliminar

            modalEvento.show();
        },
        eventClick: function(info) {
            console.log(info);

            let evento = info.event;
            let id = evento.id;
            let titulo = evento.title;
            let aulas = evento.extendedProps.aulas;
            let fechaInicio = moment(evento.start).subtract(5, 'hours').toISOString().slice(0, 16);
            let fechaFinal = moment(evento.end).subtract(5, 'hours').toISOString().slice(0, 16);
            let color = evento.backgroundColor;

            // console.log('Valor de color:', color);

            inputId.value = id;
            inputTitulo.value = decodeURIComponent(titulo); // Decodificar el título antes de asignarlo al campo
            inputTituloFalso.value = decodeURIComponent(titulo); // Decodificar el título antes de asignarlo al campo
            inputAulas.value = decodeURIComponent(aulas); // Decodificar el título antes de asignarlo al campo
            originalFechaInicio = fechaInicio;
            inputFechaInicio.value = originalFechaInicio;
            inputFechaFinal.value = fechaFinal;
            inputColor.value = color;

            // console.log('aulas valor:', aulas);

            $("#btnAccion").text('Actualizar');
            btnEliminar.style.display = "block";
            modalEvento.show();
        },
        eventContent: function(info) {
            // Obtener el título y el aula del evento
            let title = info.event.title;
            let aula = info.event.extendedProps.aulas;

            // Crear el contenido HTML para el evento con el título y el aula
            let content = document.createElement('div');
            content.innerHTML = `<strong>${title}</strong><br>Aula: ${aula}`;

            // Devolver el contenido HTML creado
            return { domNodes: [content] };
        },
        events: [
            <?php foreach ($eventos as $evento):
                $start = new DateTime($evento['start']);
                $end = new DateTime($evento['end']);
                $intervalo = new DateInterval('PT30M'); // Intervalo de 30 minutos
                $intervalos = new DatePeriod($start, $intervalo, $end);

                foreach ($intervalos as $interval): ?>
                    {
                        id: '<?= $evento['id']?>',
                        title: '<?= $evento['title'] ?>',
                        aulas: '<?= $evento['aulas'] ?>',
                        start: '<?= $interval->format('Y-m-d H:i:s') ?>',
                        end: '<?= $interval->add($intervalo)->format('Y-m-d H:i:s') ?>',
                        color: '<?= $evento['color'] ?>',
                        
                    },
                <?php endforeach;
            endforeach; ?>
        ],
    });
    
    // calendar.addEvent($evento);

    calendar.render();
});

document.addEventListener('DOMContentLoaded', function() {

function eliminar_evento() {
    Swal.fire({
        title: 'Alerta',
        text: '¿Estás seguro que deseas eliminar este evento?',
        icon: 'info',
        confirmButtonText: 'Confirmar'
    }).then(result => {
        if (result.isConfirmed === true) {
            $.ajax({
                url: '<?= base_url('eliminar_evento')?>/' + inputId.value,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'El evento fue eliminado exitosamente',
                        showConfirmButton: false,
                        timer: 2000,
                    });

                    // Ocultar el modal
                    modalEvento.hide();

                    // Cerrar el SweetAlert2 y recargar la página después de un retraso
                    setTimeout(function() {
                        Swal.close();
                        location.reload();
                    }, 500);
                },
                error: function() {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'No es posible eliminarlo debido a que ya tiene una cita agendada.',
                        showConfirmButton: false,
                        timer: 4000,
                    });
                    console.log('Error al eliminar el evento.');
                }
            });
        }
    });
}

btnEliminar.addEventListener('click', eliminar_evento);
});


</script>