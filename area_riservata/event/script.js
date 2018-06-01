var popup = $("#popup");
		var hide = $("#btn-hide");
		var desc = $(".descrizione");
		var data = $(".data");
		var event_id = 0;
		var registrati = $(".sign-in");

		hide.on("click", function(){
			popup.hide();
		});

		function setPopupCont(calEvent){
			if(calEvent.presenza){
				registrati.addClass("btn-danger");
				registrati.html("Annulla Iscrizione");
			}else{
				registrati.addClass("btn-success");
				registrati.html("Registrati");
			}
			desc.html(calEvent.title);
			$(".luogo").html(calEvent.luogo + "; " + calEvent.indirizzo);
			$(".ora_inizio").html(calEvent.ora);
			event_id = calEvent.id;
			popup.show();
		}

		registrati.on("click", function(e){
			var drop = $(e.target).hasClass("btn-danger");
			var req = new XMLHttpRequest();
			var data = new FormData();
			req.open("POST", "event.php");
			req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			req.onreadystatechange = function(){
				if(req.readyState == 4){
					console.log(req.responseText);
					if(req.responseText == "0"){
						if(drop){
							alert("La tua iscrizione all'evento: " + desc.html() + " è stata eliminata");
						}else{
							alert("Sei stato iscritto all'evento: " + desc.html());
						}
						location.href=".";
					}else{
						alert("E' morto Napoleone Bonaparte");
					}
				}
			};
			req.send("id=" + event_id + "&presenza=" + drop);
			popup.hide();
		});
