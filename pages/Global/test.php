<?php 
require_once "pdo.php";
include("../commons/header.php");?>


<?php    

$bdd= connexionPDO();

//Préparons notre requête
$stmt = $bdd->prepare("SELECT * From animal");


//Lançons notre requête
$stmt->execute();


//Nous allons récuperer nos infos et la stocker dans une variable $animaux
$animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);//nous vellons récuperer que le tableau associatif


//Nous allons libérer la connexion au serveur, permettant ainsi à d'autres req SQL s'être exécutées
$stmt->closeCursor();


?>

<!----->

<?= styleTitreNiveau1("Ils cherchent une famille", COLOR_PENSIONNAIRE) ?>

<div class='row no-gutters'>
    <?php  foreach($animaux as $animal) : ?>
        <?php

            $stmt = $bdd->prepare('
            SELECT i.id_image,libelle_image,url_image,description_image
            from image i
            inner JOIN contient c on i.id_image = c.id_image
            inner JOIN animal a on a.id_animal = c.id_animal
            WHERE a.id_animal = :idAnimal
            LIMIT 1');
            $stmt->bindValue(":idAnimal",$animal['id_animal']);
            //bindValue permet de sécuriser et éviter les injection SQL 
            $stmt->execute();
            $image = $stmt->fetch(PDO::FETCH_ASSOC);



        ?>
    <div class="col-12 col-lg-6">
    <div class='row border border-dark rounded-lg m-2 align-items-center <?= ($animal['sexe']) ? "perso_bgGreen" : "perso_bgRose" ?>' style="height:200px;">
            <div class="col p-2 text-center">
                <img src='../../sources/images/Animaux/<?=$animal['type_animal']?>/<?=$image['url_image']?>' class="img-thumbnail" style="max-height:180px;" alt="<?= $image['libelle_image'] ?>" />
            </div>
            <div class="col-2 border-left border-right border-dark text-center">
                <img src='../../sources/images/Autres/icones/ChienOk.png' class="img-fluid m-1" style="width:50px;" alt="chienOk" />
                <img src='../../sources/images/Autres/icones/ChatOk.png' class="img-fluid m-1" style="width:50px;" alt="chatOk" />
                <img src='../../sources/images/Autres/icones/BabyOk.png' class="img-fluid m-1" style="width:50px;" alt="bayOk" />
            </div>
            <div class="col-6 text-center">
                <div class="perso_policeTitre perso_size20 mb-3"><?=$animal['nom_animal'] ?></div>
                <div class="mb-2"><?= $animal['date_naissance_animal'] ?></div>
                <div class="my-3">
                    <span class="badge badge-warning m-1 p-2 d-none d-sm-inline"> douce </span>
                    <span class="badge badge-warning m-1 p-2 d-none d-sm-inline"> calme </span>
                    <span class="badge badge-warning m-1 p-2 d-none d-md-inline"> joueuse </span>
                </div>
                <a href="animal.php" class="btn btn-primary">Visiter ma page </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<?php include("../commons/footer.php");?>