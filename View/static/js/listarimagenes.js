fetch('https://imagen.erickml.shop/api/img')
  .then(response => response.json())
  .then(data => {
    const imagesByCountry = data.data;
    const imageListContainer = document.getElementById('image-list');
    const countrySelect = document.getElementById('country-select');

    // Agregar la opción "Todos" al inicio del select
    const allOption = document.createElement('option');
    allOption.value = 'todos';
    allOption.textContent = 'Todos';
    allOption.selected = true; // Seleccionar la opción "Todos" por defecto
    countrySelect.appendChild(allOption);

    // Llenar el select con las opciones de los países
    imagesByCountry.forEach(country => {
      const countryName = country.pais;
      const option = document.createElement('option');
      option.value = countryName;
      option.textContent = countryName;
      countrySelect.appendChild(option);
    });

    // Función para renderizar las imágenes del país seleccionado
    function renderImagesByCountry(country) {
      // Limpiar la lista de imágenes
      imageListContainer.innerHTML = '';

      if (country === 'todos') {
        // Mostrar todas las imágenes si se selecciona la opción "Todos"
        imagesByCountry.forEach(country => {
          const countryTitle = document.createElement('h2');
          countryTitle.textContent = country.pais.toUpperCase();
          countryTitle.classList.add('text-2xl', 'font-bold', 'mb-4', 'text-center');
          imageListContainer.appendChild(countryTitle);

          const imageList = document.createElement('ul');
          imageList.classList.add('grid', 'grid-cols-2', 'md:grid-cols-4', 'gap-4');

          country.urls.forEach(url => {
            const imageLink = document.createElement('a');
            imageLink.href = url;
            imageLink.classList.add('block', 'w-full', 'h-auto');

            const imageElement = document.createElement('img');
            imageElement.src = '';
            imageElement.classList.add('lazyload', 'w-full', 'h-auto');
            imageElement.setAttribute('data-src', url);
            imageElement.setAttribute('data-expand', '-10');

            imageLink.appendChild(imageElement);

            const listItem = document.createElement('li');
            listItem.appendChild(imageLink);

            imageList.appendChild(listItem);
          });

          imageListContainer.appendChild(imageList);
        });
      } else {
        // Buscar las imágenes correspondientes al país seleccionado
        const selectedCountry = imagesByCountry.find(item => item.pais === country);
        if (selectedCountry) {
          const countryTitle = document.createElement('h2');
          countryTitle.textContent = selectedCountry.pais.toUpperCase();
          countryTitle.classList.add('text-2xl', 'font-bold', 'mb-4', 'text-center');
          imageListContainer.appendChild(countryTitle);

          const imageList = document.createElement('ul');
          imageList.classList.add('grid', 'grid-cols-2', 'md:grid-cols-4', 'gap-4');

          selectedCountry.urls.forEach(url => {
            const imageLink = document.createElement('a');
            imageLink.href = url;
            imageLink.classList.add('block', 'w-full', 'h-auto');

            const imageElement = document.createElement('img');
            imageElement.src = '';
            imageElement.classList.add('lazyload', 'w-full', 'h-auto');
            imageElement.setAttribute('data-src', url);
            imageElement.setAttribute('data-expand', '-10');

            imageLink.appendChild(imageElement);

            const listItem = document.createElement('li');
            listItem.appendChild(imageLink);

            imageList.appendChild(listItem);
          });

          imageListContainer.appendChild(imageList);
        }
      }

      // Inicializar lazysizes después de agregar las imágenes
      lazySizes.init();
    }

    // Evento para renderizar las imágenes cuando se selecciona una opción
    countrySelect.addEventListener('change', (event) => {
      const selectedCountry = event.target.value;
      renderImagesByCountry(selectedCountry);
    });

    // Renderizar todas las imágenes por defecto
    renderImagesByCountry('todos');
  })
  .catch(error => {
    console.log('Error al obtener los datos:', error);
  });
