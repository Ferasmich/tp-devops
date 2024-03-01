<?php 
require_once "pdo.php";
include("../Commons/header.php"); ?>


<?php

//rendre la page dyn 
$bdd = connexionPDO();
$req = '
SELECT * 
FROM animal 
where id_animal = :idAnimal';
$stmt = $bdd->prepare($req);
$stmt->bindValue(":idAnimal",$_GET['idAnimal']);
$stmt->execute();
$animal = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt->closeCursor();

// echo "<pre>";
// print_r($animal);

//gestion des images 
$stmt = $bdd->prepare('
            SELECT i.id_image,libelle_image,url_image,description_image
            from image i
            inner JOIN contient c on i.id_image = c.id_image
            inner JOIN animal a on a.id_animal = c.id_animal
            WHERE a.id_animal = :idAnimal');

            $stmt->bindValue(":idAnimal",$_GET['idAnimal']);
            //bindValue permet de sécuriser et éviter les injection SQL 
            $stmt->execute();
            $images = $stmt->fetchALL(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            // echo "<pre>";
            // print_r($images);


?>

<?= styleTitreNiveau1($animal['nom_animal'], COLOR_PENSIONNAIRE) ?>

<div class='row border border-dark rounded-lg m-2 align-items-center <?= ($animal['sexe']) ? "perso_bgGreen" : "perso_bgRose" ?>'>
    <div class="col p-2 text-center">
        <img src='../../sources/images/Animaux/<?=$animal['type_animal']?>/<?=$images[0]['url_image']?>' class="img-thumbnail" 
        style="max-height:180px;" alt="<?= $image[0]['libelle_image'] ?>" />
    </div>
    <?php 
        $iconeChien = "";
        if($animal['ami_chien'] === "oui") $iconeChien = "ChienOk";
        else if($animal['ami_chien'] === "non") $iconeChien = "ChienBar";
        else if($animal['ami_chien'] === "N/A") $iconeChien = "ChienQuest";
        $iconeChat = "";
        if($animal['ami_chat'] === "oui") $iconeChat = "ChatOk";
        else if($animal['ami_chat'] === "non") $iconeChat = "ChatBar";
        else if($animal['ami_chat'] === "N/A") $iconeChat = "ChatQuest";
        $inconeEnfant = "";
        if($animal['ami_enfant'] === "oui") $inconeEnfant = "babyOk";
        else if($animal['ami_enfant'] === "non") $inconeEnfant = "babyBar";
        else if($animal['ami_enfant'] === "N/A") $inconeEnfant = "babyQuest";
    ?>
   <div class="col-2 col-md-1 border-left border-right border-dark text-center">
        <img src='../../sources/images/Autres/icones/<?= $iconeChien  ?>.png' class="img-fluid m-1" style="width:50px;" alt="chienOk" />
        <img src='../../sources/images/Autres/icones/<?= $iconeChat  ?>.png' class="img-fluid m-1" style="width:50px;" alt="chatOk" />
        <img src='../../sources/images/Autres/icones/<?= $inconeEnfant  ?>.png' class="img-fluid m-1" style="width:50px;" alt="bayOk" />
    </div>

    <div class="col-6 col-md-4 text-center">
        <div class="mb-2">Puce : <?=$animal['puce'] ?></div>
        <div class="mb-2">Né : <?= $animal['date_naissance_animal']?></div>

        <!--Afficher les caractères depuis la BDD-->
        <?php $stmt = $bdd->prepare('
                        SELECT c.libelle_caractere_m, c.libelle_caractere_f FROM `caractere` c
                        inner join dispose d on c.id_caractere = d.id_caractere
                        where id_animal = :idAnimal');//Nous avons simplement copier/coller notre req SQL que nous avons modifier

                        $stmt->bindValue(':idAnimal',$animal['id_animal']);//bindValue permet de sécuriser et éviter les injection SQL
                        $stmt->execute();
                        $caracteres = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $stmt->closeCursor();
                    ?>
        
        <div class="my-3">
            <?php foreach ($caracteres as $caractere) {?>
            <span class="badge badge-warning m-1 p-2 d-none d-sm-inline"> <?= ($animal['sexe']) ? $caractere['libelle_caractere_m'] : $caractere['libelle_caractere_f'] ?></span>
            <?php } ?>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <?= $animal['adoption_animal'] ?>
    </div>
</div>

<div class="row no-gutters align-items-center">
    <div class="col-12 col-lg-6">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
  <div class="carousel-indicators">
    <?php foreach($images as $key => $image) : ?>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $key ?>" 
    class="<?php echo ($key === 0) ? "active" : "" ?> bg-dark"></button>
    <?php endforeach; ?>
  </div>
  <div class="carousel-inner text-center">
        <?php foreach($images as $key => $image) : ?>
    <div class="carousel-item active <?php echo ($key === 0) ? "active" : "" ?>">
    <img src="../../sources/images/Animaux/<?= $animal['type_animal'] ?>/<?= $image['url_image']?>" class="img-thumbnail" style="height:500px" alt="<?= $image['libelle_image']?>">
    </div>
    <?php endforeach; ?>
  </div>

    <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
</div>
</div>
    <div class="col-12 col-lg-6">
        <div>  
            <?= styleTitreNiveau2("Qui suis-je ?", COLOR_PENSIONNAIRE) ?>

                        <?= $animal['description_animal'] ?>
        </div>
        <hr />
        <div>
            <img src="../../sources/images/Autres/icones/oeil.jpg" alt="" width="50" height="50" class="d-block mx-auto">
            <?= $animal['localisation_animal']?>
        </div>
        <hr />
        <div>
            <img src="../../sources/images/Autres/icones/iconeContrat.png" alt="" width="50" height="50" class="d-block mx-auto">
            <?= $animal['engagement_animal']?>
        </div>
    </div>
</div>



<?php include("../commons/footer.php"); ?>