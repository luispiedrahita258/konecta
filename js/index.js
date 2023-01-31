$(function () {
    load(1);
});

function load(page) {
    var query = $("#q").val();
    var per_page = 10;
    var parametros = { "action": "ajax", "page": page, 'query': query, 'per_page': per_page };
    $("#loader").fadeIn('slow');
    $.ajax({
        url: 'controller/listar/listar_productos.php',
        data: parametros,
        beforeSend: function (objeto) {
            $("#loader").html("Cargando...");
        },
        success: function (data) {
            $(".outer_div").html(data).fadeIn('slow');
            $("#loader").html("");
        }
    })
}

$('#editProductModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var name = button.data('name')
    $('#nombre_edit').val(name)
    var reference = button.data('reference')
    $('#reference_edit').val(reference)
    var price = button.data('price')
    $('#price_edit').val(price)
    var peso = button.data('peso')
    $('#peso_edit').val(peso)
    var category = button.data('category')
    $('#category_edit').val(category)
    var stock = button.data('stock')
    $('#stock_edit').val(stock)
    var id = button.data('id')
    $('#edit_product_id').val(id)
})

$('#deleteProductModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    $('#delete_product_id').val(id)
})

$("#edit_product").submit(function (event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "controller/editar/editar_producto.php",
        data: parametros,
        beforeSend: function (objeto) {
            $("#resultados").html("Enviando...");
        },
        success: function (datos) {
            $("#resultados").html(datos);
            load(1);
            $('#editProductModal').modal('hide');
        }
    });
    event.preventDefault();
});

$("#add_product").submit(function (event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "controller/guardar/guardar_producto.php",
        data: parametros,
        beforeSend: function (objeto) {
            $("#resultados").html("Enviando...");
        },
        success: function (datos) {
            $("#resultados").html(datos);
            load(1);
            $('#addProductModal').modal('hide');
        }
    });
    event.preventDefault();
});

$("#delete_product").submit(function (event) {
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "controller/eliminar/eliminar_producto.php",
        data: parametros,
        beforeSend: function (objeto) {
            $("#resultados").html("Enviando...");
        },
        success: function (datos) {
            $("#resultados").html(datos);
            load(1);
            $('#deleteProductModal').modal('hide');
        }
    });
    event.preventDefault();
});