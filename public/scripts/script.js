function charger()
	{
		setInterval(function()
		{
			$.get('index.php?page=tchat&ajax', function(page)
			{
				$('section').html(page);
			});
		}, 1000);
	}

$(document).ready(function()
{
	$("#formulaire").submit(function(e)
	{
		e.preventDefault();
		var message = $('#message').val();
		if(message != "")
		{			
				$.ajax
				({
					url : "index.php?page=tchat",
					type : "POST",
					data:{"input":message},
					success : function(html)
					{
						$('#message').prepend(html);
					}
				});	
			charger();			
		}
	});
});