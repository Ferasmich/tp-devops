<!--inserer ici la navbar Supported content  : https://getbootstrap.com/docs/5.2/components/navbar/-->
<nav class="navbar navbar-expand-lg bg-dark perso_size20">
<!--bg-dark ; navbar-expend-md(medium) au lieu de large afin que le menu apparaissent dès que l'écran est à la motié de sa taille--> 

  <div class="container-fluid">
   <!-- adapter la nav a notre cas -->

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle perso_ColorRoseMenu" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            L'association
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item perso_ColorRoseMenu" href="../Global/association.php">Qui sommes-nous</a></li>
            <li><a class="dropdown-item perso_ColorRoseMenu" href="../Global/partenaires.php">Partenaires</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle perso_ColorOrangeMenu" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pensionnaires
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item perso_ColorOrangeMenu" href="../Global/pensionnaires.php?idstatut=<?= ID_STATUT_A_L_ADOPTION ?>">Ils cherchent une famille</a></li>
            <li><a class="dropdown-item perso_ColorOrangeMenu" href="../Global/pensionnaires.php?idstatut=<?= ID_STATUT_FALD ?>">Famille d'acceui longue durée</a></li>
            <li><a class="dropdown-item perso_ColorOrangeMenu" href="../Global/pensionnaires.php?idstatut=<?= ID_STATUT_ADOPTE ?>">Les anciens</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle perso_ColorVertMenu" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Actualités
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item  perso_ColorVertMenu" href="../Global/actus.php">Nouvelle des adoptés</a></li>
            <li><a class="dropdown-item  perso_ColorVertMenu" href="#">Evènement</a></li>
            <li><a class="dropdown-item  perso_ColorVertMenu" href="#">Nos actions au quotidien</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle perso_ColorRougeMenu" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Conseils
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item  perso_ColorRougeMenu" href="../Articles/temperatures.php">Températures</a></li>
            <li><a class="dropdown-item  perso_ColorRougeMenu" href="../Articles/chocolat.php">Le chocolat</a></li>
            <li><a class="dropdown-item  perso_ColorRougeMenu" href="../Articles/plantes.php">Les plantes toxiques</a></li>
            <li><a class="dropdown-item  perso_ColorRougeMenu" href="../Articles/sterilisation.php">Stérilisation</a></li>
            <li><a class="dropdown-item  perso_ColorRougeMenu" href="../Articles/educateur.php">Educateur canin</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle perso_ColorBleuCielMenu" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Contacts
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item  perso_ColorBleuCielMenu" href="../../pages/Contact/contact.php">Contact</a></li>
            <li><a class="dropdown-item  perso_ColorBleuCielMenu" href="../Contact/don.php">Don</a></li>
            <li><a class="dropdown-item  perso_ColorBleuCielMenu" href="../Contact/mentions.php">Mentions légales</a></li>
          </ul>
        </li>

    </div>
  </div>    
</nav>