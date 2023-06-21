
const accessKey = 'X-XxtQnxALK9wuy3Iju6esdO0hgq66SLsEm1bZXujvY';
const query = 'miami';
const orientation = 'landscape';

const url = `https://api.unsplash.com/search/photos?query=${encodeURIComponent(query)}&orientation=${orientation}`;

const headers = {
    'Accept-Version': 'v1',
    'Authorization': `Client-ID ${accessKey}`
};

fetch(url, { headers })
    .then(response => response.json())
    .then(data => {
        const imageUrls = data.results.slice(0, 4).map(result => result.urls.regular);
        const imageContainer = document.getElementById('image-container');
    
        imageUrls.forEach(imageUrl => {
            const imgElement = document.createElement('img');
            imgElement.src = imageUrl;
            imgElement.alt = 'Imagen de lugar turístico';
            imgElement.classList.add('w-1/3','h-[500px]');
            imageContainer.appendChild(imgElement);
          });
    })
    
    .catch(error => console.error(error));
