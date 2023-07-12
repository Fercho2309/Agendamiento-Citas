$(document).ready(function () {
    $('#example').DataTable(); 

    $(document).ready(function() {
        $('#miTabla').DataTable({
          "dom": 'l<"toolbar">frtip',
          "pagingType": "full_numbers",
          "language": {
            "paginate": {
              "first": "Primero",
              "previous": "Anterior",
              "next": "Siguiente",
              "last": "Último"
            }
          }
        });
      });
    
      $(document).ready(function() {
        $('#miTabla').DataTable({
          "pageLength": 10
        });
      });
    
      $(document).ready(function() {
        $('#miTabla').DataTable({
          "searching": true,
          "ordering": true
        });
      });
    
      $(document).ready(function() {
        $('#miTabla').DataTable({
          "paging": false, // Deshabilita la paginación
          "searching": false, // Deshabilita la búsqueda
          // Otras opciones personalizadas...
        });
      });
    
      document.addEventListener('DOMContentLoaded', function() {
        $(document).ready(function() {
          $('#miTabla').DataTable({
            "language": {
              "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            }
          });
        });
      });
      
      















});

