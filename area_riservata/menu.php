<div class="sidebar list-group">
	<a href="/esoes/area_riservata" class="list-group-item list-group-item-action" id="profilo">Il mio profilo</a>
	<a href="/esoes/area_riservata/event" class="list-group-item list-group-item-action" id="event">Registrati agli eventi</a>
	



	<?php 
		switch ($_SESSION["permission"]){
			/*admin*/
			case 1:
				include "admin.php";

			break;
			/*editor*/
			case 2:
				include "editor.html";
			break;
		}
	?>
	<a href="/esoes" class="list-group-item list-group-item-action">Torna al sito</a>
	<a href="#" id="logout" class="bg-red list-group-item list-group-item-action ">Disconnettiti</a>
	<script type="text/javascript" src="/esoes/area_riservata/js/menu.js"></script>
	<script type="text/javascript">
		document.getElementById("logout").addEventListener("click", function(){
				var req = new XMLHttpRequest();
				req.onreadystatechange = function(){
					if(req.readyState == 4 && req.status == 200){
						alert("Sei stato scollegato");
						window.location.replace("..");
					}
				}
				req.open("GET", "/esoes/area_riservata/logout.php", true);
				req.send(null);
		});
	</script>
</div>

