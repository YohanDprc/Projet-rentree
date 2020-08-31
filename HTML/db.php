<!--
 * Projet       : Travail de rentrée
 * Auteur       : Duparc Yohan
 * Date         : 24/08/2020
 * Description  : Faire un projet avec HTML/CSS et avec une base de données
 * Version      : 1.0
-->
<?php

function connectToDb(){
    try
    {
       $bdd = new PDO(
          'mysql:host=localhost;dbname=gameseek',
          "root",
          "",
          array(
             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
             PDO::ATTR_EMULATE_PREPARES => false
          )
       );
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
}