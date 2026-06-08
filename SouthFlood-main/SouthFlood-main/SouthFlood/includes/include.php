<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<nav>
        <div class="nav-wrapper cabecalho"> <!-- Você pode trocar "blue" por qualquer cor do Materialize -->
            <a href="#" class="brand-logo" id="CBrand"><img class="brand-logo" id="logoSL"src="../imgs/logo sem letra.png" alt=""><b>SouthFlood</b></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down NavDireita">
            <li><a href="sass.html">Sobre</a></li>
            <li><a href="badges.html">Config</a></li>
            <li><a href="../LOGIN/Login.php">LogIn</a></li>
            </ul>
        </div>
     
    </nav>
    <style>

        @charset "UTF-8";

.cabecalho{
    background-color: rgb(255, 255, 255) !important;
    
}
nav {
    height: 80px;
    line-height: 80px;
        position: fixed;
         top: 0;
         z-index: 1000;
}

#CBrand{
    color:rgb(126, 163, 255);
    font-style: italic;
    left: 100px;
     font-family: "Bebas Neue", sans-serif;
     font-size: 50px;
      position: absolute;
             transform: translateY(05%);

}
.NavDireita li a{
    color: rgb(126, 163, 255) !important;
    font-family: "Bebas Neue", sans-serif;
}
/* FONTES----------------------------*/
.bebas-neue-regular {
  font-family: "Bebas Neue", sans-serif;
  font-weight: 400;
  font-style: normal;
}





#logoSL{
    color:rgb(126, 163, 255);
    left: -90px;
    top: 3px;
      position: absolute;
             transform: translateY(05%);
             height: 60px;


}
</style>