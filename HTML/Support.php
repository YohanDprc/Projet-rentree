<!--
 * Projet       : Travail de rentrée
 * Auteur       : Duparc Yohan
 * Date         : 24/08/2020
 * Description  : Faire un projet avec HTML/CSS et avec une base de données
 * Version      : 1.0
-->
<?php

session_start();

require_once '../HTML/Function.php';
    
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

$filterNom = filter_input(INPUT_POST, 'Nom', FILTER_SANITIZE_STRING);
$filterEmail = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_STRING);
$filterObjet = filter_input(INPUT_POST, 'Objet', FILTER_SANITIZE_STRING);
$filterMessage = filter_input(INPUT_POST, 'Message', FILTER_SANITIZE_STRING);

$varNom = filter_var($filterNom, FILTER_SANITIZE_STRING);
$varEmail = filter_var($filterEmail, FILTER_VALIDATE_EMAIL);
$varObjet = filter_var($filterObjet, FILTER_SANITIZE_STRING);
$varMessage = filter_var($filterMessage, FILTER_SANITIZE_STRING);

$arrayNom = array($varNom);
$arrayEmail = array($varEmail);

if (!empty($_POST)) {
    $errors = array();

    if (empty($varNom) || !preg_match("/^[a-zA-Z0-9_]+$/", $varNom)) {
        $errors["Nom"] = "Votre pseudo est invalide ! (alphanumérique)";
    } else {
        $req = $bdd->prepare("SELECT idEnregistrement FROM suggestion WHERE username = ?");
        $req->execute($arrayNom);
        $user = $req->fetch();
        if ($user) {
            $errors["username"] = "Ce pseudo est déjà pris";
        }
    }

    if (empty($varEmail) || !filter_var($varEmail, FILTER_VALIDATE_EMAIL)) {
        $errors["Email"] = "Votre email est invalide ! (alphanumérique)";
    } else {
        $req = $bdd->prepare("SELECT idEnregistrement FROM suggestion WHERE email = ?");
        $req->execute($arrayEmail);
        $user = $req->fetch();
        if ($user) {
            $errors["email"] = "Cet email est déjà utilisé pour un autre compte";
        }
    }

    if (empty($varObjet) || !preg_match("/^[a-zA-Z0-9', ]+$/", $varObjet)) {
        $errors["Objet"] = "Votre objet est invalide ! (alphanumérique)";
    }

    if (empty($varMessage) || !preg_match("/^[a-zA-Z0-9', ]+$/", $varMessage)) {
        $errors["Message"] = "Votre message est invalide ! (alphanumérique)";
    }

       
    if (empty($errors)) {
        $rep = $bdd->prepare("INSERT INTO suggestion SET username = ?, email = ?, objet = ?, message = ?");
        $rep->execute(array($varNom, $varEmail, $varObjet, $varMessage));
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <title>Games Seek : Support</title>
    <meta charset="UTF-8"/>
    <link rel="icon" href="https://www.meinbergglobal.com/images/icons/svg/blue/user_headset.svg">
    <link href="../CSS/cssSite.css" rel="stylesheet" type="text/css"/>
    <body class="w3-content" style="max-width:1200px">

        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:260px" id="mySidebar">
            <div class="w3-container w3-display-container w3-padding-16">
                <img class="w3-logo" src="../Image/GestionLogo.PNG" alt=""/>
            </div>
            <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
                <a href="../Accueil.php" class="w3-bar-item w3-button w3-fondLien">Accueil</a>
                <a href="Rechercher.php" class="w3-bar-item w3-button w3-fondLien">Recherche</a>

            </div>
        </nav>


        <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">

        </header>


        <div>
            <!-- !PAGE CONTENT! -->
            <div class="w3-main" style="margin-left:250px">

                <!-- Push down content on small screens -->
                <div class="w3-hide-large" style="margin-top:83px"></div>

                <!-- Top header -->
                <header class="w3-container w3-xlarge">
                    <p class="w3-left w3-size">Support</p><br>
                    <br><?php if (!empty($errors)):endif; ?>
                    <div>
                        <ul>
                            <?php
                            if (empty($errors)) {
                                
                            } else {?>
                            <p>Vous avez mal remplis le formulaire !</p>
                            <?php
                                foreach ($errors as $error) {
                                    debug($error);
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </header>

                <div class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
                    <div class="w3-row-padding w3-test2">
                        <div class="w3-col s4 w3-test" style="width: 150px;">
                            <h4>Contact</h4>
                            <p>Des questions ?<br>Des suggestions ? <br>Des améliorations ?<br><b><u>N'hésitez pas !</u></b></p>
                            <form action="" method="post">
                                <p><input class="w3-input w3-border" type="text" placeholder="Nom" name="Nom" required="required"></p>
                                <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required="required"></p>
                                <p><input class="w3-input w3-border" type="text" placeholder="Objet" name="Objet" required="required"></p>
                                <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required="required"></p>
                                <button type="submit" class="w3-button w3-red w3-margin-bottom">Envoyer</button>
                            </form>
                        </div>
                        <div class="w3-test" style="width: 150px;">
                            <h4>Info</h4>
                            <p>Games Seek corporation</p>
                            <p>076 674 32 27</p>
                            <p>yohan.dprc@eduge.ch</p>
                        </div> 
                    </div>
                </div>

                <!-- Footer -->
                <footer class="w3-black w3-center w3-padding-24"><span class="w3-hover">Yohan Duparc - I-DA.P3B - CFPT Informatique</span></footer>

                <!-- End page content -->
            </div>
        </div>
    </body>
</html>