$(document).ready( function () {
	$("#formulaire").submit(function(e) {
		e.preventDefault();
		alert(''+ this.post + "");
        } );
} );