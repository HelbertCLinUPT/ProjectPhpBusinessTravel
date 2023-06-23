function descargarComoPDF() {
  var divTexto = document.getElementById("resultado-consulta");
  var doc = new jsPDF();
  var contenido = divTexto.innerText;
  var fontSize = 11;
  var maxWidth = 260;
  var maxLinesPerPage = 26; // Número máximo de líneas por página
  var lines = doc.splitTextToSize(contenido, maxWidth);

  var currentPage = 1; // Página actual
  var currentLine = 0; // Línea actual

  doc.setFontSize(fontSize);
  lines.forEach(function (linea) {
    if (currentLine >= maxLinesPerPage) {
      // Si se alcanza el límite de líneas por página, pasar a la siguiente página
      doc.addPage();
      currentPage++;
      currentLine = 0;
    }

    var x = 8; // Ajusta la posición horizontal según tu diseño
    var y = 18 + (fontSize) * currentLine; // Incrementar la posición vertical según el tamaño de fuente y el espaciado

    doc.text(linea, x, y);
    currentLine++;
  });


  doc.save("documento.pdf");
}
