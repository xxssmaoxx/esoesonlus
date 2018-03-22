<?php 
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/esoes/utilities/divAccedi.html"; ?>


<div id="header">
  <a href="/esoes/index.php"><img src="/esoes/img/home/esoes_logo_completo_light1.jpg" class="logo animated bounceInDown"></a>
  <a id="btn-accedi" class="desktop btn btn-primary navbar-btn pointer animated bounceInDown"><i class="far fa-user">&nbsp;</i> Accedi</a>
</div>


<nav class="navbar navbar-expand-lg bg-blue">
  <button class="black navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="mobile btn btn-primary" id="menu-btn-accedi"><i class="fa fa-user">&nbsp;</i> Accedi</a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
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
</nav>


<script>

$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');

  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });


  return false;
});
  

var menuBtnShow = document.getElementById("menu-btn-accedi");
var show = document.getElementById("btn-accedi");
var popup = document.getElementById("popup");
var hide = document.getElementById("btn-hide");


<?php 
  if(isset($_SESSION["user"])){

    $span = "Area riservata";

    echo "menuBtnShow.innerHTML = '<i class=\"far fa-user\"></i><span style=\"font-family:sans-serif\"> $span</span>';
          menuBtnShow.href = '/esoes/area_riservata/';
          show.innerHTML = '<i class=\"far fa-user\"></i><span style=\"font-family:sans-serif\"> $span</span>';
          show.href = '/esoes/area_riservata/';";
  }else{
    echo "show.onclick = function(){
            popup.style.display = \"block\";
          }

          menuBtnShow.onclick = function(){
            popup.style.display = \"block\";
          } 

          hide.onclick = function(){
            popup.style.display = \"none\";
          }";
  }

  ?>

</script>