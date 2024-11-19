// Función para abrir el modal de edición y llenar los campos con los datos del artículo
function openEditModal(item) {
    $('#item_id').val(item.id); // Llenar el campo oculto con el ID del artículo
    $('#item_name').val(item.item_name);
    $('#item_type').val(item.item_type);
    $('#quantity').val(item.quantity);
    $('#price').val(item.price);

    // Mostrar el modal
    $('#editItemModal').modal('show');
}
// AJAX para manejar la actualización del artículo
$('#updateInventoryItem').on('submit', function(e) {
    e.preventDefault(); // Evitar el envío normal del formulario

    console.log($(this).serialize()); // Verifica los datos que se están enviando

    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: $(this).serialize(), // Serializa los datos del formulario
        dataType: "json",
        success: function(response) {
            if (response.done) {
                alert(response.data); // Muestra el mensaje de éxito
                // Aquí puedes agregar lógica para actualizar la lista de artículos o cerrar el modal
            } else {
                alert("Error: " + response.data); // Muestra un mensaje de error si la operación falla
            }
        },
        error: function(xhr, status, error) {
            alert("Ocurrió un error: " + error); // Manejo de errores de la solicitud AJAX
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