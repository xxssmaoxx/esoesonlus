<?php
    $conn = connectDb();
    $stmt = $conn->prepare("SELECT nome_clown, descrizione, luogo, indirizzo, data, ora_inizio FROM eventi JOIN presenze ON eventi.id = presenze.id_evento JOIN clown ON clown.user = presenze.user  WHERE now() <= data ORDER BY nome_clown");
    $stmt->execute();
    $stmt->bind_result($clown_name, $descrizione, $luogo, $indirizzo, $data, $ora_inizio);
    if(!is_null($stmt->fetch())){
	    $precedente = $clown_name;
	    echo "
	    <div class=\"presenze-clown\">
	        <h3 class=\"nome-clown bold \">$clown_name</h3>
	        <div class=\"table-responsive-sm\">
	            <table class=\"table table-hover\">
	                <thead class=\"bg-blue white\">
	                    <th scope=\"col\">Descrizione</th>
	                    <th scope=\"col\">Luogo</th>
	                    <th scope=\"col\">Data</th>
	                    <th scope=\"col\">Ora inizio</th>
	                </thead>
	                <tbody>
	        ";
	        echo "
	                <tr>
	                    <th scope=\"row\">$descrizione</th>
	                    <td>$luogo, $indirizzo</td>
	                    <td>$data</td>
	                    <td>$ora_inizio</td>
	                </tr>"; 
	    while(!is_null($stmt->fetch())){
	        //controllo se è ancora il clown di prima
	        if($precedente == $clown_name){
	            //se è lo stesso clown di prima stampo i dati dell'evento nella stessa tabella
	            echo "
	                <tr>
	                    <th scope=\"row\">$descrizione</th>
	                    <td>$luogo, $indirizzo</td>
	                    <td>$data</td>
	                    <td>$ora_inizio</td>
	                </tr>";
	        }else{
	            /*
	            *se è un nuovo clown devo chiudere la tabella del vecchio clown, scrivere come titolo il nome del
	            *nuovo clown e poi fare la tabella degli appuntamenti del nuovo clown.
	            *Devo anche aggiornare il clown precedente.
	            */
	            $precedente = $clown_name;
	            echo "
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	                <div class=\"presenze-clown\">
	                    <h3 class=\"nome-clown\">*** $clown_name ***</h3>
	                    <div class=\"table-responsive-sm\">
	                        <table class=\"table table-hover\">
	                            <thead class=\"bg-blue\">
	                                <th scope=\"col\">Descrizione</th>
	                                <th scope=\"col\">Luogo</th>
	                                <th scope=\"col\">Data</th>
	                                <th scope=\"col\">Ora inizio</th>
	                            </thead>
	                            <tbody>
	                                <tr>
	                                    <th scope=\"row\">$descrizione</th>
	                                    <td>$luogo, $indirizzo</td>
	                                    <td>$data</td>
	                                    <td>$ora_inizio</td>
	                                </tr>";
	        }
	    }
	}else{
		echo "Non ci sono clown iscritti agli eventi in programma!";
	}
?>