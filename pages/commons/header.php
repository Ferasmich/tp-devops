<?php include("../../utile/formatage.php"); 
      include("../../utile/config.php"); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Copse&display=swap" rel="stylesheet">
    <link href="../../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <title>N.A.N.A</title>
</head>
<body>
    
        <div class="container p-0 mt-2 rounded perso_shadow">
            <!--p(padding);mt(margin-top)-->

            <header class='bg-dark text-white rounded-top perso_policeTitre perso_shadow justify-content-around'>

                    <div class="row align-items-center m-0">
                        <div class="col-2 p-2 text-center">
                            <!-- 2/12 de la colonne = 1/6 de l'écran => responsive--->
                            <a href="index.php">
                                <img src="../../sources/images/Autres/logoNANA2.jpg" class="rounded-circle img-fluid perso_logoSize">
                            </a>
                        </div>

                    
                        <!--- creation du MENU --->
                        <div class="col-6 col-lg-8 m-0 p-0 ">
                            <?php include("../Commons/menu.php") ?>
                        </div>

    
                        <div class='col-4 col-lg-2 text-right pt-1 pr-4 d-none d-lg-block'>
                            <!--notre text ne sera affiché que lorsque l'écran sera grand autrement il est caché => responsive-->
                            N.A.N.A <br /> Clermont (09)
                        </div>
                        
                    </div>

            </header>

        <!---Contenu du site-->
        <div class="border p-1 perso_minCorspSize px-5">
            <!--px-5 -> padding sur l'axe des x de 5-->