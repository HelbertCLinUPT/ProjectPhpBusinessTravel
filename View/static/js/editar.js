const editForm = document.getElementById('edit-form');

editForm.addEventListener('submit', function (event) {
    event.preventDefault();

    Swal.fire({
        title: 'Do you want to save the changes?',
        timer: 2000,
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Save',
        denyButtonText: `Don't save`,
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Actualizado correctamente!', '', 'success')
            editForm.submit();
        }
        else if (result.isDenied) {
            Swal.fire('No se guardaron los cambios', '', 'info')
            window.history.back();
        }
        else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
              )
              window.history.back();
            }
    });
});
