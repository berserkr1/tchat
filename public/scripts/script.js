function charger()
	{
		$.get('index.php?page=tchat_list&ajax', function(page)
			{
				$('.tchat-list').html(page);
			});
	}

setInterval(function()
		{
			charger();
		}, 1000);

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
						charger();
						$('#message').val('');
					}
				});			
		}
	});
});