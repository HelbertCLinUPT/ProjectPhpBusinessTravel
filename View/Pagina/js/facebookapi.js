const accessToken = 'EAALgzs2TxoEBAH1sqSg3yHLCsvhRNmuESo3o7r5uCbzisZBsj9QLZBtZBJ94kDMUMAFwbwLINSIlFfcA8gsYr0ZAw76Scws9WeZCRN0s44gywwYFRV7dmxYadGPbmCgkVDh4vmjaCxfvDF0RXVa6HBqjoR2jYlUU6hjZAsKVZAZAwN1ZAxS6ZAqXNo';

fetch(`https://graph.facebook.com/me/posts?fields=message,created_time,attachments&access_token=${accessToken}&limit=10`)
  .then(response => response.json())
  .then(data => {
    if (data.hasOwnProperty('data')) {
      const cardContainer = document.getElementById('card-container');

      const filteredPosts = data['data'].filter(post => post['message'] && post['message'] !== 'No hay mensaje disponible');

      // Limitar el número de publicaciones a mostrar a 3
      const limitedPosts = filteredPosts.slice(0, 3);

      limitedPosts.forEach(post => {
        const cardDiv = document.createElement('div');
        cardDiv.className = 'col-md-6 col-lg-4 mb-4 mb-lg-0';
        cardDiv.innerHTML = `
          <div class="card-blog">
            <a href="${post['attachments']['data'][0]['target']['url']}">
              <img class="card-img rounded-0" src="${post['attachments']['data'][0]['media']['image']['src']}" alt="">
            </a>
            <div class="card-blog-body">
              <a href="${post['attachments']['data'][0]['target']['url']}">
                <h4>${post['message']}</h4>
              </a>
              <ul class="card-blog-info">
                <li><a href="#"><span class="align-middle"><i class="ti-notepad"></i></span>${post['created_time']}</a></li>
              </ul>
            </div>
          </div>
        `;
        cardContainer.appendChild(cardDiv);
      });
    }
  })
  .catch(error => console.log(error));
