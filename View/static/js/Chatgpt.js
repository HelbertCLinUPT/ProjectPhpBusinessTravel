$(document).ready(function () {

  var savedContent = localStorage.getItem('resultado-consulta');

  if (savedContent) {
    $('#resultado-consulta').html(savedContent);
  }

    $('#buscar-btn').click(function () {
      var consulta = $('input[name="consulta"]').val();
      var rol = $('input[name="rol"]').val();

      if (consulta.trim() === '') {
        $('#mensaje-error').removeClass('hidden');
        return; // Detener la ejecución si el campo está vacío
      }
      $('#mensaje-error').addClass('hidden');

      var data =   {
        "role": rol,
        "content": consulta
      };
      console.log(data);
  
      // Bloquear el botón de BUSCAR
      $('#buscar-btn').prop('disabled', true).removeClass('bg-blue-700').addClass('bg-blue-900');;
  
      // Mostrar el elemento de carga
      $('#buscar-btn').html('<span class="mr-2"><svg class="animate-spin h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-1.647zm10-5.938A7.962 7.962 0 0120 12h-4c0 3.042-1.135 5.824-3 7.938l-3-1.647z"></path></svg></span>');
  
      $.ajax({
        type: "POST",
        url: "https://gpt.helbert.info/openai",
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function (response) {
      
          if (response.content) {
            var formattedContent = response.content.replace(/\n/g, "<br>");
            $('#resultado-consulta').html(formattedContent);
            localStorage.setItem('resultado-consulta', formattedContent);

          } else {
            console.error("No se encontró respuesta válida");
          }
  
          // Desbloquear el botón de BUSCAR
          $('#buscar-btn').prop('disabled', false);
  
          // Restaurar el texto del botón
          $('#buscar-btn').html('<span class="w-6 h-7 flex items-center justify-center"> <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"> <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --> <path style="fill: #ffffff;" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" /> </svg> </span>').removeClass('bg-blue-900').addClass('bg-blue-700');
        },
        error: function (xhr, status, error) {
          console.error(error);
  
          // Desbloquear el botón de BUSCAR en caso de error
          $('#buscar-btn').prop('disabled', false);
  
          // Restaurar el texto del botón
          $('#buscar-btn').html('<span class="w-6 h-7 flex items-center justify-center"> <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"> <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --> <path style="fill: #ffffff;" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" /> </svg> </span>').removeClass('bg-blue-900').addClass('bg-blue-700');
        }
      });
    });
  });
  