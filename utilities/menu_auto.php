<?php
    include "./imports.html";
    require "./connectDb.php";
	
	$conn = connectDb();
	
	$nav = "<nav class='navbar navbar-expand-lg bg-blue'> <button class='black navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown'> <span class='navbar-toggler-icon'></span> </button> <a class='mobile btn btn-primary' id='menu-btn-accedi' href='/esoes/area_riservata/'><i class='far fa-user'></i><span style='font-family:sans-serif'> Area riservata</span></a> <div class='collapse navbar-collapse' id='navbarNavDropdown'> <ul class='navbar-nav'>";
	echo $nav;
	
	$stmt = $conn->prepare("SELECT menu_padre, id_pagine, titolo FROM menu LEFT JOIN pagine ON id_pagine = id WHERE livello = 0 ORDER BY ordine");
	$stmt->execute();
	$stmt->bind_result($menu_padre, $id_pagine, $titolo);
	
	while(!is_null($stmt->fetch())){

		$conn1 = connectDb();
		$titolo = is_null($titolo)?"#":"/esoes/$titolo";
		$datatoggle = $titolo == "#"?"data-toggle='dropdown'":"";
		echo "<li class='nav-item dropdown'><a class='nav-link' href='$titolo' $datatoggle >$menu_padre</a>";

		$stmt1 = $conn1->prepare("SELECT menu_padre, id_pagine, titolo FROM menu LEFT JOIN pagine ON id_pagine = id WHERE menu_padre = ? AND livello = 1");
		$stmt1->bind_param("s", $menu_padre);
		$stmt1->execute();
		$stmt1->bind_result($menu_padre, $id_pagine, $titolo);
		echo "<ul class='dropdown-menu'>";

		while(!is_null($stmt1->fetch())){
			$url = is_null($titolo)?"#":"/esoes/$titolo";
			$url = str_replace(" ", "_", $url);
			$datatoggle = $titolo == "#"?"data-toggle='dropdown'":"";
			echo "<li><a class='dropdown-item' href='$url' $datatoggle>$titolo</a></li>";
		}
		echo "</ul></li>";
		$conn1->close();
	}
	
	$conn->close();
?>