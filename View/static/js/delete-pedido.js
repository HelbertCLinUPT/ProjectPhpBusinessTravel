$(document).ready(function() {
    // Capturar el evento click en el botón de eliminar
    $('.delete-button').click(function() {
        // Obtener el id del proveedor del atributo data-id del botón
        var id = $(this).data('id');

        // Mostrar un diálogo de confirmación utilizando SweetAlert2
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción no se puede deshacer',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'MainController.php?action=pedido-delete&id=' + id;
            }
        });
    });
});
