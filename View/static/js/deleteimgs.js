$(document).ready(function() {
  $('#country-select').change(function() {
    var selectedOption = $(this).val();
    if (selectedOption === '') {
      $('#eliminar-btn').addClass('hidden');
    } else if (selectedOption === 'todos') {
      $('#eliminar-btn').addClass('hidden');
    } else {
      $('#eliminar-btn').removeClass('hidden');
    }
  });

  $('#eliminar-btn').click(function() {
    var selectedOption = $('#country-select').val();
    if (selectedOption !== '') {
      var confirmar = confirm('¿Estás seguro de que deseas eliminar las imágenes seleccionadas?');
      if (confirmar) {
        eliminarImagenes(selectedOption);
      }
    }
  });

  function eliminarImagenes(opcion) {
    $('#eliminar-btn').prop('disabled', true);
    $('#eliminar-btn svg').addClass('opacity-0');
    console.log(opcion)
    var requestData = {
      query: opcion // Utiliza el valor seleccionado del select
    };

    if (opcion === 'todas') {
      requestData.query = '';
    }

    $.ajax({
      url: 'https://imagen.erickml.shop/api/img/eliminar',
      method: 'DELETE',
      contentType: 'application/json',
      data: JSON.stringify(requestData),
      success: function(data) {
        alert('Las imágenes se eliminaron exitosamente.');
        $('#eliminar-btn').prop('disabled', false);
        $('#eliminar-btn svg').removeClass('opacity-0');
        window.location.reload();
      },
      error: function(error) {
        console.log(error);
        alert('Ocurrió un error al eliminar las imágenes.');
        $('#eliminar-btn').prop('disabled', false);
        $('#eliminar-btn svg').removeClass('opacity-0');
      },
    });
  }
});
