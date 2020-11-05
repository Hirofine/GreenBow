function demoFromHTML() {
  var pdf = new jsPDF('p', 'pt', 'letter');
  // source can be HTML-formatted string, or a reference
  // to an actual DOM element from which the text will be scraped.
  source = $('#customers')[0];
  specialElementHandlers = {
    // element with id of "bypass" - jQuery style selector
    '#bypassme': function(element, renderer) {
      // true = "handled elsewhere, bypass text extraction"
      return true
    }
  };
  //margins for the PDF file
  margins = {
    top: 80,
    bottom: 60,
    left: 40,
    width: 2000,
  };
  // Get HTML fromat into PDF
  pdf.fromHTML(
    source, // HTML string or DOM elem ref.
    margins.left, // x coord
    margins.top, { // y coord
      'width': margins.width, // max width of content on PDF
      'elementHandlers': specialElementHandlers,
    },
    // function to download pdf
    function(dispose) {
      pdf.save('Results.pdf');
    }, margins);
}

