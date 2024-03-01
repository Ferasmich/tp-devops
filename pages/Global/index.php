<?php include("../commons/header.php") ?>

<?php echo styleTitreNiveau1("Ils ont besoin de vous!", COLOR_ASSO);?>


<div id="carouselExampleIndicator" class="carousel slide" data-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicator" data-bs-slide-to="0" class="active bg-dark" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicator" data-bs-slide-to="1"></button>
  </div>
  <div class="carousel-inner">

  <!--Début d'un ITEM--->
    <div class="carousel-item active">
        <div class="row no-gutters border rounded overflow-hidden mb-4">
            <div class="col-12 col-md-auto text-center">
                <!--s'adapter automatiquement lorsque qu'on est à mi-taille d'écran-->
                <img src="../../sources/images/Animaux/Chat/Framboise/Framboise3.jpg" style="height: 250px" alt="photo de Framboise"/>
            </div>
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="perso_ColoRoseMenu perso_policeTitre perso_textShadow">Framboise</h3>
                        <div class="text-muted">02/2019</div>
                            <p>Description de Framboise</p>
                        <a href="" class='btn btn-primary'>Visiter ma page</a>
                    </div>
            
        </div>
    </div>
    <!-- Fin d'un ITEM -->

    <!--Début d'un ITEM--->
        <div class="carousel-item active">
            <div class="row no-gutters border rounded overflow-hidden mb-4">
                <div class="col-12 col-md-auto text-center">
                    <!--s'adapter automatiquement lorsque qu'on est à mi-taille d'écran-->
                    <img src="../../sources/images/Animaux/Chat/Framboise/Framboise2.jpg" style="height: 250px" alt="photo de Framboise"/>
                </div>
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="perso_ColoRoseMenu perso_policeTitre perso_textShadow">Framboise</h3>
                            <div class="text-muted">02/2019</div>
                                <p>Description de Framboise</p>
                            <a href="../Global/animal.php" class='btn btn-primary'>Visiter ma page</a>
                        </div>
                
            </div>
        </div>
        <!-- Fin d'un ITEM -->

<?php include("../commons/footer.php") ?>