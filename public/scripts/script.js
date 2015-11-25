// Scroll bottom auto pour la tchatbox
tchatBox = document.getElementById('tchat-read');
tchatBox.scrollTop=tchatBox.scrollHeight;

function messages() {
		global $db;
		$query = "SELECT * FROM post LEFT JOIN user ON post.id_user = user.id ORDER BY 'date'";
		$resultat = mysqli_query($db, $query);
		if ($resultat) {
			while ($message = mysqli_fetch_assoc($resultat)) {
				echo "<".$message['date']."> ".htmlentities($message['pseudo'])." : ".htmlentities($message['contenu'])."<br/>";
			}
		}
	}

function charger()
	{
		setInterval(function()
		{
			$.get('', function(page)
			{
				$('section').html(page);
			});
		}, 1000);
	}

$(document).ready(function() {
	$("#tchat-form").submit(function(event) {
		event.preventDefault();
		var message = $('#tchat-write').val();
		if(message != "") {			
			$.ajax 
			({
				url : "index.php?page=accueil",
				type : "POST",
				data:{"message":message},
				success : function(html) {
					$('#tchat-read').prepend(html);
				}
			});	
			charger();			
		}
	});
});
