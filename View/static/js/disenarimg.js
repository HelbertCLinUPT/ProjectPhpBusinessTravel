$(document).ready(function() {
    var imageCounter = 1;
  
    $('#disenar-btn').click(function() {
      realizarSolicitud();
    });
  
    function realizarSolicitud() {
      $('#disenar-btn').prop('disabled', true);
      $('#disenar-btn svg').addClass('opacity-0');
  
      $('#mensaje-error').addClass('hidden');
      $('#mensaje-no-found').addClass('hidden');
      $('#results').addClass('hidden');
  
      var consulta = $('input[name="consulta"]').val();
      var forma = $('select[name="forma"]').val();
      var logo = $('#logo-checkbox').is(':checked');
      var titulo = $('#titulo-checkbox').is(':checked');
  
      if (consulta !== '') {
        $('#loading-indicator').removeClass('hidden');
  
        $('#gallery').empty();
  
        var requestData = {
          query: consulta,
          orientation: forma,
          logo: logo,
          titulo: titulo
        };
  
        $.ajax({
          url: 'https://imagen.erickml.shop/api/img/generar',
          method: 'POST',
          contentType: 'application/json',
          data: JSON.stringify(requestData),
          success: function(data) {
            if (data.urls && data.urls.length > 0) {
              data.urls.forEach(function(url) {
                var imageId = 'generated-image-' + imageCounter;
                var uniqueUrl = url + '?timestamp=' + Date.now();
                var imageElement =
                  '<div class="bg-white rounded-xl shadow overflow-hidden">' +
                  '<img id="' +
                  imageId +
                  '" class="w-full h-full object-cover" src="' +
                  uniqueUrl +
                  '" alt="' +
                  consulta +
                  '">' +
                  '</div>';
  
                $('#gallery').append(imageElement);
  
                imageCounter++;
              });
            } else {
              $('#mensaje-no-found').removeClass('hidden');
            }
            $('#results').removeClass('hidden');
            $('#loading-indicator').addClass('hidden');
            $('#disenar-btn').prop('disabled', false);
            $('#disenar-btn svg').removeClass('opacity-0');
          },
          error: function(error) {
            console.log(error);
            $('#mensaje-error').removeClass('hidden');
            $('#loading-indicator').addClass('hidden');
            $('#disenar-btn').prop('disabled', false);
            $('#disenar-btn svg').removeClass('opacity-50');
          },
        });
      } else {
        $('#mensaje-error').removeClass('hidden');
        $('#disenar-btn').prop('disabled', false);
        $('#disenar-btn svg').removeClass('opacity-50');
      }
    }
  });
  