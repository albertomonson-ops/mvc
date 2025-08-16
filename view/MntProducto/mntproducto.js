var table;

function init(){
    $("#producto_form").on("submit",function(e){
        guardaryeditar(e);

    });

}

$(document).ready(function() {

    // Initialize Select2
    $('#cat_id').select2({
        dropdownParent: $("#modalmantenimiento")
    });

    // Load category options from PHP
    $.post("../../controller/categoria.php?op=combo", function(data) {
        $("#cat_id").html(data);

        // Refresh Select2 so new options appear
        $('#cat_id').trigger('change');
    });

    // Initialize DataTable
    tabla = $('#producto_data').DataTable({

    });
});


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

function editar(prod_id) {
    $('#mdltitulo').html('Editar Registro');

    $.post("../../controller/productos.php?op=mostrar", { prod_id: prod_id }, function (data) {
        try {
            let json = JSON.parse(data);
            if (json && json.prod_id) {
                $('#prod_id').val(json.prod_id);
                $('#cat_id').val(json.cat_id).trigger('change');
                $('#prod_nom').val(json.prod_nom);
                $('#prod_desc').val(json.prod_desc);
                $('#prod_cant').val(json.prod_cant);
                $('#modalmantenimiento').modal('show');
            } else {
                alert('No se encontró el producto.');
            }
        } catch (e) {
            console.error("Error parsing JSON:", e);
            alert('Error al obtener los datos del producto.');
        }
    }).fail(function () {
        alert('Error en la comunicación con el servidor.');
    });
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
    $('#producto_form')[0].reset();
    $('#prod_id').val('');
    $('#cat_id').val('').trigger('change');
    $('#modalmantenimiento').modal('show');
});

init();
