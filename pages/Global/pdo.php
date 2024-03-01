<?php

function connexionPDO(){


    try{

            $bdd = new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE_NAME.";charset=utf8",USER_NAME,PASSWORD);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

            return $bdd;

    }catch(PDOException $e){ //$e est un objet de la classe PDOException


        $message = "Erreur PDO avec le message : ".$e->getMessage();

        die($message); //Exit du catch

    }



}