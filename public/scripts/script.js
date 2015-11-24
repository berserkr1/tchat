// Scroll bottom auto pour la tchatbox
tchatBox = document.getElementById('tchat-read');
tchatBox.scrollTop=tchatBox.scrollHeight;

// $('document').ready(function()
// {
		function envoiMessage(form) {
			if (form.message != "") { return true; }
			else { return false; }
	 	//, function(message)
	// 	{
	// 		var tab = JSON.parse(message);
	// 		$('.tchat-read').empty();
	// 		var i = 0;
	// 		while (i < tab.length)
	// 		{
	// 			$('.tchat-read').append('<p>'+tab[i]+'</p>');
	// 			i++;
	// 		}
	// 	});
		}/*)*/;
// });

// setTimeout() pour le refresh