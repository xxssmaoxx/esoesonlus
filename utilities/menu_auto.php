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
<!--	
      <li class="nav-item">
        <a class="nav-link" href="/esoes/index.php">HOME</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
          CHI SIAMO
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/esoes/chi_siamo">Chi Siamo</a></li>
          <li><a class="dropdown-item" href="/esoes/carte_clown">I clown</a></li>
          <li><a class="dropdown-item" href="/esoes/manifesto">Manifesto</a></li>
          <li><a class="dropdown-item" href="/esoes/governance">Governance</a></li>
          <li><a class="dropdown-item" href="/esoes/policies">Policies</a></li>
          <li><a class="dropdown-item" href="/esoes/attimi_di_esoes">Attimi di Eso Es</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
          EVENTI
        </a>  
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/esoes/news">News</a></li>
          <li><a class="dropdown-item" href="/esoes/eventi">Eventi</a></li>
        </ul>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
          PROGETTI
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/esoes/progetti">Progetti</a></li>
          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Programma Borse di Studio</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/esoes/borse_studio">Programma Borse di Studio</a></li>
              <li><a class="dropdown-item" href="#">Programma Borse di Studio 2015</a></li>
              <li><a class="dropdown-item" href="#">Programma Borse di Studio 2016</a></li>
              <li><a class="dropdown-item" href="#">Programma Borse di Studio 2017</a></li>
              <li><a class="dropdown-item" href="#">Istantanee Programma Borse di Studio</a></li>
            </ul>
          </li>
          <li role="presentation" class="divider"></li>
          <li><a class="dropdown-item" href="/esoes/fondo_sanitario">Fondo Sanitario Niños Eso Es</a></li>
          <li><a class="dropdown-item" href="/esoes/guatemala">Il Guatemala</a></li>
          <li><a class="dropdown-item" href="/esoes/archivio_progetti">Archivio Progetti</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
          MISSIONE
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/esoes/missione">Missione</a></li>
          <li><a class="dropdown-item" href="#">#OpeGuate 2016</a></li>
          <li><a class="dropdown-item" href="/esoes/opeguate_libro_2016">#OPEGUATE2016 - Il Libro</a></li>
          <li><a class="dropdown-item" href="/esoes/storia">La Storia</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
          SOSTIENICI
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/esoes/sostienici">Sostienici</a></li>
          <li><a class="dropdown-item" href="/esoes/5_per_mille">5 per Mille</a></li>
          <li><a class="dropdown-item" href="/esoes/agevolazioni_fiscali">Agevolazioni Fiscali</a></li>
        </ul>
      </li>
      <li class="nav-item last-item">
        <a class="nav-link" href="/esoes/contattaci">CONTATTACI</a>
      </li>
    </ul>
  </div>


*/
