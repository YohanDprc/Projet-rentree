<?php

function connectToDb(){
    try
    {
       $bdd = new PDO(
          'mysql:host=localhost;dbname=amirtagram',
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