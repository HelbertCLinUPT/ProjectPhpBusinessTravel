$(document).ready(function() {
    $('.delete-button').click(function() {
        var id = $(this).data('id');

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
                
                window.location.href = 'MainController.php?action=interesado-delete&id=' + id;
            }
        });
    });
});
