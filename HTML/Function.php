<!--
 * Projet       : Travail de rentrée
 * Auteur       : Duparc Yohan
 * Date         : 24/08/2020
 * Description  : Faire un projet avec HTML/CSS et avec une base de données
 * Version      : 1.0
-->
<?php

function debug($variable){
    
    echo "<pre>" . print_r($variable, true) . "</pre>";
    
}


function str_random($length){
    $alphabet = '0123456789qwertzuioplkjhgfdsayxcvbnmQWERTZUIOPLKJHGFDSAYXCVBNM';
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}