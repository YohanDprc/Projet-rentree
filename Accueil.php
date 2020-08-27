<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
    <title>Games seek</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="CSS/cssSite.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" href="https://static.fnac-static.com/multimedia/Images/FR/NR/6a/8f/82/8556394/1545-1/tsp20180712094139/Manette-PS4-Sony-Dual-Shock-4-Blanc-glacier-V2.jpg">
    <body class="w3-content" style="max-width:1200px">

        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="width:250px" id="mySidebar">
            <div class="w3-container w3-display-container w3-padding-16">
                <img class="w3-logo" src="Image/GestionLogo.PNG" alt=""/>
            </div>
            <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
                <a href="Accueil.php" class="w3-bar-item w3-button w3-fondLien">Accueil</a>
                <a href="HTML/Rechercher.php" class="w3-bar-item w3-button w3-fondLien">Recherche</a>
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
                    <p class="w3-left w3-size">Accueil</p>
                </header>

                <div class="w3-row">
                    <div class="l3 s6 w3-accueil">
                        <h4>Description :</h4>
                        <p>Faire un projet rentrée qui peut rechercher un ou des jeux vidéo en remplissant certains champs/critères. Exemple en précisant l’entreprise de distribution du jeux vidéo (Ubisoft, Electronic Arts, Bethesda Softworks, …), le PEGI (3, 7 ,12 ,16 ou 18) et en fonction du prix (entre 40 et 50 CHF par exemple).</p>
                        <div class="w3-test2">
                            <div class="w3-test">
                                <img src="Image/R6S.jpg" alt="" class="w3-R6S"/>
                            </div>

                            <div class="w3-test">
                                <h6><b>Entreprise de distribution :</b></h6>
                                <p>Ubisoft</p>
                                <h6><b>PEGI :</b></h6>
                                <p>18</p>
                                <h6><b>Prix :</b></h6>
                                <p>26.95 CHF</p>
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