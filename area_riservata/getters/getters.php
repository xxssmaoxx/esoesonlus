<?php
function get_frase(){
	$conn = connectDb();
	$stmt = $conn->prepare("SELECT frase FROM clown WHERE user=?");
	$stmt->bind_param("s", $_SESSION['user']);
	$stmt->execute();
	$stmt->bind_result($frase);
	$stmt->fetch();
	echo $frase;	
}

function get_iscrizioni(){
	$conn = connectDb();
	$stmt = $conn->prepare("SELECT descrizione, luogo, indirizzo, data, ora_inizio FROM eventi JOIN presenze ON eventi.id = presenze.id_evento WHERE user=? 
	                    AND now() <=  data ORDER BY data, ora_inizio");
	$stmt->bind_param("s", $_SESSION["user"]);
	$stmt->execute();
	$stmt->bind_result($descrizione, $luogo, $indirizzo, $data, $ora_inizio);

	// variabile che dice se il clown Ã¨ iscritto ad almeno un evento

	$has_event = false;

	if (!is_null($stmt->fetch())) {
		$has_event = true;
		echo "<div class=\"presenze\">
		        <h3>Eventi a cui partecipi</h3>
		        <table class=\"table\">
		            <thead class=\"bg-blue white\">
		                <tr>
		                    <th scope=\"col\">Titolo</th>
		                    <th scope=\"col\">Luogo</th>
		                    <th scope=\"col\">Indirizzo</th>
		                    <th scope=\"col\">Data</th>
		                    <th scope=\"col\">Ora inizio</th>
		                </tr>
		            </thead>
		            <tbody>
			            <tr>
	                        <th scope=\"row\">$descrizione</th>
	                        <td>$luogo</td>
	                        <td>$indirizzo</td>
	                        <td>$data</td>
	                        <td>$ora_inizio</td>
	                    </tr>";
	}

	while (!is_null($stmt->fetch())) {
		$is_event = true;
		echo "
	                    <tr>
	                        <th scope=\"row\">$descrizione</th>
	                        <td>$luogo</td>
	                        <td>$indirizzo</td>
	                        <td>$data</td>
	                        <td>$ora_inizio</td>
	                    </tr>";
	}

	if ($has_event) {
		echo "
	                	</tbody>
			        </table>
			    </div>";
	}

}

function get_email(){
	$conn = connectDb();
	$stmt = $conn->prepare("SELECT mail FROM clown WHERE user=?");
	$stmt->bind_param("s", $_SESSION['user']);
	$stmt->execute();
	$stmt->bind_result($mail);
	$stmt->fetch();
	echo $mail;
}

function get_nome(){
	$conn = connectDb();
	$stmt = $conn->prepare("SELECT nome_clown FROM clown WHERE user=?");
	$stmt->bind_param("s", $_SESSION['user']);
	$stmt->execute();
	$stmt->bind_result($nome);
	$stmt->fetch();
	echo $nome;
}

function get_image_src(){
	$conn = connectDb();
	$stmt = $conn->prepare("SELECT src FROM immagini JOIN clown ON immagini.id = clown.id_img WHERE user=?");
	echo $conn->error;
	$stmt->bind_param("s", $_SESSION['user']);
	echo $stmt->error;
	$stmt->execute();
	$stmt->bind_result($img);
	$stmt->fetch();
	echo "\"/esoes/uploads/$img\"";
}

?>