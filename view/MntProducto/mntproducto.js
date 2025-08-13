var table;

function init(){
    $("#producto_form").on("submit",function(e){
        guardaryeditar(e);

    });

}

$(document).ready(function() {
    tabla = $('#producto_data').dataTable({
        "aProcessing": true, // Activamos el procesamiento del datatables
        "aServerSide": true, // Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip', // Definimos los elementos del control de table
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../../controller/productos.php?op=listar',
            type: "get",
            dataType: "json",
            error: function(e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10, // Por cada 20 registros hace una paginación
        "order": [[0, "asc"]], // Ordenar (columna,Orden)
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }).DataTable();
});

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#producto_form")[0]); 
    $.ajax({
        url: "/mvc/controller/productos.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
            $('#producto_form')[0].reset();
            $('#modalmantenimiento').modal('hide');
            $('#producto_data').DataTable().ajax.reload();

            swal.fire(
                'Registro!',
                'El registro correctamente',
                'success'

            );
        }
    });
}

function editar(prod_id){
    console.log(prod_id);

}

function eliminar(prod_id) {
  Swal.fire({
    title: "CRUD?",
    text: "¿Desea eliminar el registro?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Sí",
    cancelButtonText: "No",
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {

      $.post("/mvc/controller/productos.php?op=eliminar", { prod_id: prod_id }, function (data) {
        $('#producto_data').DataTable().ajax.reload();

        Swal.fire(
          "Eliminado!",
          "El registro se eliminó correctamente.",
          "success"
        );
      });

    }
  });
}


$(document).on("click","#btnnuevo", function(){
    $('#mdltitulo').html('Nuevo Registro');
    $('#modalmantenimiento').modal('show');
});

init();
