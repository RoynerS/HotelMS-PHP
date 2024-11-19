// Función para abrir el modal de edición y llenar los campos con los datos del artículo
function openEditModal(item) {
    $('#edit_item_id').val(item.id);
    $('#edit_item_name').val(item.item_name);
    $('#edit_item_type').val(item.item_type);
    $('#edit_quantity').val(item.quantity);
    $('#edit_price').val(item.price);

    // Mostrar el modal
    $('#editItemModal').modal('show');
}

// AJAX para manejar la actualización del artículo
// AJAX para manejar la actualización del artículo
$('#editInventoryItem').on('submit', function(e) {
    e.preventDefault(); // Prevenir el envío normal del formulario

    $.ajax({
        type: 'POST',
        url: 'ajax.php', // URL del archivo que maneja la lógica
        data: $(this).serialize() + '&edit_item=1', // Agregar un indicador de que es una actualización
        success: function(response) {
            // Manejar la respuesta del servidor
            const res = JSON.parse(response);
            if (res.done) {
                alert(res.data); // Mostrar mensaje de éxito
                location.reload(); // Recargar la página para ver los cambios
            } else {
                alert(res.data); // Mostrar mensaje de error
            }
        },
        error: function() {
            alert('Error en la conexión con el servidor.'); // Mensaje de error en caso de fallo en la solicitud
        }
    });
});

function deleteItem(itemId) {
    if (confirm("¿Estás seguro de que deseas eliminar este artículo?")) {
        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            data: { delete_item: true, item_id: itemId }, // Enviamos el ID del artículo a eliminar
            success: function(response) {
                const res = JSON.parse(response);
                if (res.done) {
                    alert(res.data); // Mostrar mensaje de éxito
                    location.reload(); // Recargar la página para ver los cambios
                } else {
                    alert(res.data); // Mostrar mensaje de error
                }
            },
            error: function() {
                alert('Error en la conexión con el servidor.'); // Mensaje de error en caso de fallo en la solicitud
            }
        });
    }
}