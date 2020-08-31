<!--
 * Projet       : Travail de rentrée
 * Auteur       : Duparc Yohan
 * Date         : 24/08/2020
 * Description  : Faire un projet avec HTML/CSS et avec une base de données
 * Version      : 1.0
-->
<!DOCTYPE html>
<html lang="fr">
    <title>Games Seek : VIP Info</title>
    <meta charset="UTF-8"/>
    <link href="../CSS/cssSite.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" href="https://chicoree.ch/media/VIP-nl-titel_5xsKiYq.jpg"> 
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
                    <p class="w3-left w3-size">Info concernant l'accès VIP</p>
                </header>

                <div class="w3-container w3-black">
                    <h1>En savoir plus sur ce que nous vous proposons !</h1> 
                    <p>Tout d'abord vous recevrez un email à chaque fois que l'ont ajoutent un nouveau jeu.</p><br>
                    <p>Ensuite vous aurez des remises sur certains jeux et recevrez des cadeaux.</p><br>
                    <p>Alors si vous voulez vous inscrire je vous laisse cliquer <a href="login.php">ici</a>.</p>
                </div>

                <div class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
                    <div class="w3-row-padding w3-test2">
                        <div class="w3-test" style="width: 135px">
                            <h4>About</h4>
                            <a href="VIP.php" target="_blank">Revenir sur la page VIP</a>
                        </div>
                        <div class="w3-test" style="width: 135px">
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