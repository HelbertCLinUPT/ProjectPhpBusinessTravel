<script>
    let popup = document.createElement("div");
    popup.className = "fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white border border-gray-300 shadow-md p-4 rounded-md";
    popup.innerHTML = `
                <p class="text-green-500 font-bold mb-2">¡Se ha enviado correctamente!</p>
                <button onclick="this.parentNode.remove(); window.location.href = \'index.php\'" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cerrar</button>
            `;
    document.body.appendChild(popup);
</script>