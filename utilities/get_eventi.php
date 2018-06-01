 <?php 
	$conn = connectDb();
	if(isset($allenamenti)){
		$query = "SELECT id, descrizione, luogo, indirizzo, data, ora_inizio,(CASE presenze.user WHEN ? THEN 1 ELSE 0 END) FROM eventi LEFT JOIN presenze ON eventi.id = presenze.id_evento";
	}else{
		$query = "SELECT id, descrizione, luogo, indirizzo, data, ora_inizio, 
								(CASE presenze.user WHEN ? THEN 1 ELSE 0 END) FROM eventi 
							LEFT JOIN presenze ON eventi.id = presenze.id_evento WHERE tipo = 'S' ";
	}
	$stmt = $conn->prepare($query);
	echo $conn->error;
	$res = $stmt->bind_param("s", $_SESSION["user"]);
	$res = $stmt->execute();
	$stmt->bind_result($event_id, $descrizione, $luogo, $indirizzo, $data, $ora_inizio, $presenza);

	/*creazione del calendario*/
	echo "
		<script type=\"text/javascript\">
			$(document).ready(function(){
				$('#calendario').fullCalendar({
					locale: 'it',
					themeSystem: 'bootstrap4',
					header: {
						left: 'prev',
						center: 'title',
						right: 'next'
					},
					events: [";			

	while(!is_null($stmt->fetch())){
		/*per ogni record restituito dalla query vengono impostati i campi dell'evento nel calendario*/
		echo "	{
					title: '$descrizione',
					start: '$data',
					ora: '$ora_inizio',
					luogo: '$luogo',
					indirizzo: '$indirizzo',
					id: '$event_id',
					presenza: $presenza
				},";
	}
	/*Quando si clicca su un evento viene generato un popup*/
	echo "],
		eventClick: function(event) {
			setPopupCont(event);
		}
	});
	});

	</script>";
?>
