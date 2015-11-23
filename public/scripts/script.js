$('document').ready(function()
{
	$('.poster').click(function() { // modif en setTimeout()
		$.get('http://192.168.1.84/phpmyadmin/#PMAURL-2:db_sql.php?db=tchat', function(message) 
		{
			var tab = JSON.parse(message);
			$('.tchat-read').empty();
			var i = 0;
			while (i < tab.length)
			{
				$('.tchat-read').append('<p>'+tab[i]+'</p>');
				i++;
			}
		});
	});
});