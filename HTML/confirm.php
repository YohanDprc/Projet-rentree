<!--
 * Projet       : Travail de rentrée
 * Auteur       : Duparc Yohan
 * Date         : 24/08/2020
 * Description  : Faire un projet avec HTML/CSS et avec une base de données
 * Version      : 1.0
-->
<?php session_start(); ?>
<?php

$user_id = $_GET['id'];
$token = $_GET['token'];
require_once '../HTML/db.php';
$req = $pdo->prepare('SELECT * FROM inscription WHERE idInscription = ?');
$req->execute([$user_id]);
$user = $req->fetch();
session_start();

if($user && $user->confirmation_token == $token){
    session_start();
    $pdo->prepare('UPDATE inscription SET confirmation_token = NULL, comfirmed_at = NOW() WHERE idInscription = ?')->execute([$user_id]);
    $_SESSION['flash']['success'] = "Votre compte a été validé";
    $_SESSION['auth'] = $user;
    header('Location: account.php');
}else{
    $_SESSION['flash']['danger'] = "Ce token n'est plus valide";
    header('Location: login2.php');
}