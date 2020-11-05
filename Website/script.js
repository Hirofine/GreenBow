
$("#btnPrint").click( function () {
	//var divContents = document.getElementById("#dvContainer").innerHTML;
   var divContents = $("#dvContainer").html();
	
var doc = new jsPDF()

doc.text(divContents, 10, 10)
doc.save('a4.pdf')

});

