<!--
 * Projet       : Travail de rentrée
 * Auteur       : Duparc Yohan
 * Date         : 24/08/2020
 * Description  : Faire un projet avec HTML/CSS et avec une base de données
 * Version      : 1.0
-->
<?php
require_once '../HTML/Function.php';

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

$res = NULL;

if (!empty($_POST)) {
    $distri = $_POST["distributeur"];
    $pegi = $_POST["pegi"];
    if (empty($distri) && empty($pegi)) {
        
    } else {
        $req = $bdd->query("SELECT * FROM jeu WHERE idDistributeur = $distri  AND idPegi = $pegi;");
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <title>Games Seek : Recherche</title>
    <meta charset="UTF-8"/>
    <link href="../CSS/cssSite.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" href="https://png.pngtree.com/element_our/png/20181206/magnifying-glass-vector-icon-png_262124.jpg"> 
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

                <!-- Top header -->
                <header class="w3-container w3-xlarge">
                    <p class="w3-left w3-size">Rechercher</p>
                    <img class="w3-logo-loupe" src="../Image/Loupe.jpg" alt=""/>
                </header>

                <form action="#" method="post" class="w3-black w3-form">
                    <div class="w3-test2">
                        <div class="w3-test" style="width: 275px">
                            Choisissez un distributeur de jeux vidéo :
                            <select required="required" name="distributeur">
                                <option value="default">Sélectionner votre distributeur</option>
                                <option value="1">Ubisoft</option>
                                <option value="2">Electronic Arts (EA)</option>
                                <option value="3">Bethesda Softworks</option>
                                <option value="4">Activision</option>
                                <option value="5">Blizzard Entertainment</option>
                                <option value="6">Rockstar Games</option>
                            </select>
                        </div>

                        <div class="w3-test" style="width: 275px">
                            Choisissez un PEGI :
                            <select required="required" name="pegi">
                                <option value="default">Sélectionner votre PEGI</option>
                                <option value="1">3</option>
                                <option value="2">7</option>
                                <option value="3">12</option>
                                <option value="4">16</option>
                                <option value="5">18</option>
                            </select>
                        </div>

                        <div class="w3-test" style="width: 275px">
                            Veuillez écrire votre prix (optionnel):
                            <div style="height: 82px;" class="w3-test"><input type="number" name="prix" placeholder="Entrez un prix (sans CHF)"/></div>
                        </div>

                    </div>

                    <button type="submit" name="search" class="w3-button w3-red w3-margin-bottom w3-margin-top">Rechercher un jeu</button>
                    <?php
                    if (!empty($_POST)) {
                        $distri = $_POST["distributeur"];
                        $pegi = $_POST["pegi"];
                        foreach ($req as $jeu) {
                            echo $jeu['nomJeu'] . "<img class=\"tailleImg\" src=\"../" . $jeu['lienImage'] . "\" alt=\"" . $jeu['lienImage'] . "\">";
                        }
                    }
                    ?>
                </form>

                <div class="w3-padding-64 w3-light-grey w3-small">
                    <div class="w3-row-padding">
                        <div class="w3-test">
                            <h4>Info</h4>
                            <p>Games seek corporation</p>
                            <p>076 674 32 27</p>
                            <p>yohan.dprc@eduge.ch</p>
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