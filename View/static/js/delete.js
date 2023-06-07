$(document).ready(function() {
    // Capturar el evento click en el botón de eliminar
    $('.delete-button').click(function() {
        // Obtener el RUC del proveedor del atributo data-ruc del botón
        var ruc = $(this).data('ruc');

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
                // Redireccionar a MainController.php para procesar la eliminación del proveedor
                window.location.href = 'MainController.php?action=proveedor-delete&ruc=' + ruc;
            }
        });
    });
});
