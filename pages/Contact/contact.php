<?php include("../commons/header.php");?>


<?=styleTitreNiveau1("Contact", COLOR_CONTACT) ?>

<?=styleTitreNiveau3("Suivez-nous :", COLOR_CONTACT) ?>

<p class="pl-5">
    <a href="https://www.facebook.com/nosamisnosamnimaux/" target=_blank>
        <img src="../../sources/images/Autres/icones/facebook.png" alt="">
        Suivez-nous sur facebook et participez à l'aventure de Nos Amis Nos Animaux :
        <a href="https://www.facebook.com/nosamisnosamnimaux" target=_blank>
            <span class="badge badge-pill badge-primary">Notre facebook</span>
        </a>
    </a>
</p>


<?= styleTitreNiveau3("Contactez-nous :", COLOR_CONTACT) ?>

<div class="pl-5">
    <p>
        <img src="../../sources/images/Autres/icones/courrier.png" alt="courrier" width="30px">
        Par courrier : Hameau de la Souleille - 09420 Clermont, Midi-Pyrenees, France
    </p>
    <p>
        <img src="../../sources/images/Autres/icones/mail.png" alt="mail" width="30px">
        Par mail : <a href="mailto:associationnosamisnosaimaux@gmail.com">
        associationnosamisnosanimaux@gmail.com</a>
    </p>
    <p>
        <img src="../../sources/images/Autres/icones/tel.png" alt="mail" width="30px">
        Par téléphone : 06 10 59 94 71
    </p>
    <p>
        <span class="badge badge-pill badge-danger">Ou</span>
        <span class="badge badge-pill badge-warning">par notre</span>
        <span>formulaire</span><span> de contact :</span>
    </p>
</div>

<!---etape 2 : le traitement--->
<?php //securiser le form : rendre les champs obligatoire
if(isset($_POST['nom']) && !empty($_POST['nom'])&& //isset => si la variable existe et empty => est vide
isset($_POST['mail']) && !empty($_POST['mail'])&&
isset($_POST['objet']) && !empty($_POST['objet'])&&
isset($_POST['message']) && !empty($_POST['message'])&&
isset($_POST['captcha']) && !empty($_POST['captcha'])
) {

    $captcha = (int) $_POST['captcha'];//S'assurer qu'il ne s'agit pas d'un robot

    if($captcha === 8){

        $nom = htmlentities($_POST['nom']);//htmlentities converti notre saisie en entités HTML afin d'éviter les car spéc (guillemets et autre)7
        $mail = htmlentities($_POST['mail']);
        $objet = htmlentities($_POST['objet']);
        $message = htmlentities($_POST['message']);
        $destinataire = "associationnosamisnosanimaux@gmail.com";
        mail($destinataire, $objet. " - " .$nom, "mail : ". $mail. " message : ".$message);
        //Service non utilisable dans l'immediat car le service mailler n'a pas été mis en place

        echo '<div class="alert alert-success" role="alert" >';
            echo 'Message envoyé';
        echo '</div>';


    } else {//Alerte bootstrap

        echo '<div class="alert alert-danger" role="alert" >';
        echo 'Erreur de Captcha, recommencer';
        echo '</div>';


    }







}  



?>


<!--Notre formulaire de contact avec l'utilisation des classes bootstrap propre au form-->
<form method="POST" action="#" class="pl-5">
    <div class="form-group row no-gutters align-items-center">
        <label for="nom" class="col-auto pr-3">Nom :</label>
        <input type="text" name="nom" id="nom" class="form-control col" placeholder="nom" required>
    </div>
    <div class="form-group row no-gutters align-items-center">
        <label for="mail" class="col-auto pr-3">Email :</label>
        <input type="email" name="mail" id="mail" class="form-control col" placeholder="nom@exemple.com" required>
    </div>

    <div class="form-group row no-gutters align-items-center">
        <label for="objet" class="col-auto pr-3">Objet :</label>
        <select name="objet" id="objet" class="form-control col">
            <option value="question">Question</option>
            <option value="adoption">Adoption</option>
            <option value="donnation">Donnation</option>
            <option value="autre">Autre</option>
        </select>
    </div>

    <div class="form-group">
        <label for="message">Message :</label>
        <textarea name="message" id="message"  rows="3" class="form-control" required></textarea>
    </div>

    <div class="form-group row no-gutters align-items-center">
        <label for="captcha" class="col-auto pr-3">Combien font 3 + 5 :</label>
        <input type="number" name="captcha" id="captcha" class="form-control col" required>
    </div>

    <input type="submit" class="btn btn-primary mx-auto d-block" value="Valider" />
</form>











<?php include("../commons/footer.php");?>