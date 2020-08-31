<!--
 * Projet       : Travail de rentrée
 * Auteur       : Duparc Yohan
 * Date         : 24/08/2020
 * Description  : Faire un projet avec HTML/CSS et avec une base de données
 * Version      : 1.0
-->
<?php
session_start();



$action = filter_input(INPUT_POST, "action");

//Connexion à la base de donnée
try {
    $bdd = new PDO(
            'mysql:host=localhost;dbname=gameseek', "root", "", array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
            )
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if ($action == "disconnect") {

    $repConnect = $bdd->prepare('UPDATE user SET isConnected = false WHERE iduser = :userId');
    $repConnect->execute(array(
        'userId' => $_SESSION['userId']
    ));

    $_SESSION = [];
    session_destroy();
    header("Location: login.php");
}

echo $action;
?>
<!DOCTYPE html>
<html lang="fr">
    <title>Games seek</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="../CSS/cssSite.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" href="https://static.fnac-static.com/multimedia/Images/FR/NR/6a/8f/82/8556394/1545-1/tsp20180712094139/Manette-PS4-Sony-Dual-Shock-4-Blanc-glacier-V2.jpg">
    <body class="w3-content" style="max-width:1200px">

        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="width:250px" id="mySidebar">
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
            <!-- PAGE CONTENT -->
            <div class="w3-main" style="margin-left:250px">

                <!-- Push down content on small screens -->
                <div class="w3-hide-large"></div>

                <!-- Top header -->
                <header class="w3-container w3-xlarge">
                    <p class="w3-left w3-size">Bonjour <?= $_SESSION['pseudo'] ?>, bienvenu au coin VIP</p>
                </header>

                <div class="w3-row">
                    <div class="l3 s6 w3-accueil">
                        <h4>Description :</h4>
                        <div class="w3-test2">
                        </div>
                    </div>
                </div>
            </div>

            <div class="w3-padding-64 w3-light-grey w3-small" id="footer">
                <div class="w3-row-padding">
                    <div class="w3-test2">
                        <div class="w3-test" style="width: 150px">
                            <h4>About</h4>
                            <p><a href="HTML/Support.php" target="_blank">Support</a></p>                                    
                            <p><a href="HTML/VIP.php" target="_blank">Accès VIP</a></p>
                            <form action="#" method="POST">
                                <button style="margin-left:0.8%;width:100%;display:block;" type="submit" name="action" value="disconnect" class="btn btn-primary">Se déconnecter</button>
                            </form>
                        </div> 

                        <div class="w3-test" style="width: 150px">
                            <h4>Info</h4>
                            <p>Games seek corporation</p>
                            <p>076 674 32 27</p>
                            <p>yohan.dprc@eduge.ch</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="w3-black w3-center w3-padding-24"><span class="w3-hover">Yohan Duparc - I-DA.P2C - CFPT Informatique</span></footer>

            <!-- End page content -->
        </div>
    </div>
</body>
</html>