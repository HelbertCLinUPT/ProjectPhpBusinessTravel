function descargarComoPDF() {
  var doc = new jsPDF();

  var logoImg = new Image();
  logoImg.src = 'View/Pagina/img/LogoEmpresa.png';
  doc.addImage(logoImg, 'PNG', 10, 10, 30, 30); 

  var titulo = "Business Travel";
  doc.setFontSize(18);
  doc.text(titulo, 50, 25);

  var divTexto = document.getElementById("resultado-consulta");
  var contenido = divTexto.innerText;
  var fontSize = 11;
  var maxWidth = 260;
  var maxLinesPerPage = 26; 
  var lines = doc.splitTextToSize(contenido, maxWidth);

  var currentPage = 1; 
  var currentLine = 2; 

  doc.setFontSize(fontSize);
  lines.forEach(function (linea) {
    if (currentLine >= maxLinesPerPage) {
      doc.addPage();
      currentPage++;
      currentLine = 0;
    }

    var x = 8; 
    var y = 18 + (fontSize) * currentLine; 

    doc.text(linea, x, y);
    currentLine++;
  });

  //doc.save("documento.pdf");
  doc.output('save', {
    callback: function (data) {
      var blob = new Blob([data], { type: 'application/pdf' });
      var fileName = prompt("Por favor, ingrese el nombre del archivo:", "documento.pdf");
      if (fileName === null) {
        return; // El usuario canceló la operación
      }
      saveAs(blob, fileName);
    }
  });
}
