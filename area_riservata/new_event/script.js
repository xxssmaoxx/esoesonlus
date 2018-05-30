var confirm = document.getElementById("create");

$(document).ready(function(){
	$("#datepicker").datepicker({
		dateFormat: "dd-mm-yy"
	});
	$.datepicker.setDefaults(
	  $.extend(
	    $.datepicker.regional['it']
	  )
	);
	$("#timepicker").wickedpicker({
		twentyFour: true
	});
});



confirm.onclick = function(){
	var descrizione = document.getElementById("titolo");
	var luogo = document.getElementById("luogo");
	var indirizzo = document.getElementById("indirizzo");
	var data = document.getElementById("datepicker");
	var tipo = document.getElementById("tipo")
	var ora = document.getElementById("timepicker");


	var req = new XMLHttpRequest();
	req.open("POST", "create_event.php");
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.onreadystatechange = function(){
		if(req.readyState == 4 && req.status == 200){
			//stato finale con richiesta effettuata
			alert(req.responseText);
			if(req.responseText == "0"){
				alert("ok");
			}else{
				alert("non ok");
			}
		}
	};
	req.send("titolo=" + titolo.value + "&luogo=" + luogo.value + "&indirizzo=" + indirizzo.value + "&giorno=" + data.value + "&tipo=" + tipo.value + "&ora=" + ora.value);

};
