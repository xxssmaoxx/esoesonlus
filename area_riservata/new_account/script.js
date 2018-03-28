var confirm = document.getElementById("create");

confirm.onclick = function(){
	var user = document.getElementById("user");
	var clownName = document.getElementById("clown-name");
	var email = document.getElementById("email");
	var perm = document.getElementById("permessi");


	var req = new XMLHttpRequest();
	req.open("POST", "create_account.php");
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.onreadystatechange = function(){
		if(req.readyState == 4 && req.status == 200){
			alert(req.responseText);
			if(req.responseText == "0"){
				alert("ok");
			}else{
				alert("non ok");
			}
		}else{
			alert(req.status);
		}
	};
	req.send("user=" + user.value + "&clownName=" + clownName.value + "&email=" + email.value + "&permessi=" + perm.value);

};