function myFunction() {
  var x = document.getElementById("click");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}



//  *****   Export to PDF  *****   //

var specialElementHandlers = {
  // element with id of "bypass" - jQuery style selector
  '.no-export': function (element, renderer) {
      // true = "handled elsewhere, bypass text extraction"
      return true;
  }
};

function exportPDF(id) {
  var doc = new jsPDF('l', 'pt', 'a4');
  //A4 - 595x842 pts
  //https://www.gnu.org/software/gv/manual/html_node/Paper-Keywords-and-paper-size-in-points.html


  //Html source 
  var source = document.getElementById(id);
console.log(source);
  var margins = {
      top: 150,
      bottom: 50,
      left: 100,
      width: 600
  };

  var logo = new Image();
  logo.src = '../public/assets/images/logo.png';

        // footer
    //Footer
    var footerText = 'Generated on ' + new Date().toLocaleDateString();
    var footerFontSize = 20;
    var footerFontWeight = 'normal';
    var footerWidth = doc.getStringUnitWidth(footerText) * footerFontSize / doc.internal.scaleFactor;
    var footerOffset = (margins.width - footerWidth) / 2;
    doc.setFontSize(footerFontSize);
    doc.setFont(footerFontWeight);
    doc.text(footerText, margins.left + footerOffset, doc.internal.pageSize.height - 20, { align: 'left' }); // add the footer


    //Header
    var header = 'Fuelup - Transactions';
    var headerFontSize = 48;
    var headerFontWeight = 'bold';
    var headerWidth = doc.getStringUnitWidth(header) * headerFontSize / doc.internal.scaleFactor;
    var headerOffset = (margins.width - headerWidth) / 2;
    doc.setFontSize(headerFontSize);
    doc.setFont(headerFontWeight);
    doc.text(header, margins.left +80 + headerOffset, margins.top - 50, { align: 'center' }); // add the header


    // Add the logo
    var logoWidth = 100;
    var logoHeight = 100;
    var logoX = margins.left - 2*(logoWidth) + (margins.width - logoWidth) / 2;
    var logoY = margins.top - 100 + (100 - logoHeight) / 2;
    doc.addImage(logo, 'PNG', logoX, logoY, logoWidth, logoHeight);



    doc.fromHTML(
        source, // HTML string or DOM elem ref.
        margins.left,
        margins.top, {
            'width': margins.width,
            'elementHandlers': specialElementHandlers,
            'margin-left': 'auto', // add margin-left style to center the table
            'margin-right': 'auto' // add margin-right style to center the table
        },

    function (dispose) {
        // dispose: object with X, Y of the last line add to the PDF 
        //          this allow the insertion of new lines after html
        doc.save('Fuelup.pdf');
    }, margins);

}

//   ******  Export to CSV  ******  //

function exportTableToCSV(tableId) {
  var rows = document.querySelectorAll('#' + tableId + '  tr');
  var csv = [];


  for (var i = 0; i < rows.length; i++) {
    var row = [], cols = rows[i].querySelectorAll('td, th');
    for (var j = 0; j < cols.length; j++) {
      row.push(cols[j].innerText);
    }
    csv.push(row.join(','));
  }
  downloadCSV(csv.join('\n'));
}

function downloadCSV(csv) {
  var blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
  var url = URL.createObjectURL(blob);
  var link = document.createElement('a');
  link.setAttribute('href', url);
  link.setAttribute('download', 'Fuelup.csv');
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}
