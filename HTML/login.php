<?php
session_start();

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

//Création des variables de la session
if(!isset($_SESSION['userList'])){
    $_SESSION['pseudo'] = "";
    $_SESSION['isConnected'] = false;
    $_SESSION['password'] = [];
  }

//Récuperation des données

$action = filter_input(INPUT_POST,"action");
$pseudo = filter_input(INPUT_POST,"pseudo");
$password = filter_input(INPUT_POST,"password");
//-------------------------------------------------

$message = "";


if($action == "connect"){
  
  if($pseudo != "" && $password != ""){
    $sql = "SELECT * FROM user";
    $reponse = $bdd->prepare($sql);
    $reponse->execute();





    if (($res = $reponse->fetch()) == false) {
      echo "lol";
  } else {
      do {
          if($pseudo == $res['pseudo'] && $password == $res['password']){
            $_SESSION['pseudo'] = $res['pseudo'];
            $_SESSION['isConnected'] = true;
            $_SESSION['password'] = $res['password'];
            $_SESSION['userId'] = $res['iduser'];

            $repConnect = $bdd->prepare('UPDATE user SET isConnected = true WHERE iduser = :userId');
            $repConnect->execute(array(
              'userId' => $_SESSION['userId']
              ));

            header("Location: http://localhost/projects/SitePHP/Accueil.php");

          }
          else{
            $message = "Entrée inorrect";
          }
      } while ($res = $reponse->fetch());
  }
  }
  else{
    $message = "Entrée inorrect";
  }
  
}
else if($action == "register"){



  if($pseudo != "" && $password != ""){
    $req = $bdd->prepare('SELECT pseudo FROM user WHERE pseudo= :Pseudo');

    $req->execute(array(
      'Pseudo' => $pseudo,
      ));
    
    if ($donnees = $req->fetch())
    {
        $message = "Il y a déjà une personne qui utilise $pseudo comme pseudo !";
    }
    else
    {
      $req = $bdd->prepare('INSERT INTO user(pseudo, password) VALUES(:pseudo, :password)');
    
      $req->execute(array(
        'pseudo' => $pseudo,
        'password' => $password
        ));
        $message = "Compte crée";
    }
}
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="../CSS/adminlte.css" rel="stylesheet" type="text/css"/>
        <title>Games Seek : VIP Connexion</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="../Accueil.php"><b>GamesSeek</b>VIP</a>
            </div>
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
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Connexion à un compte</p>

                    <form id="login" action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="pseudo" placeholder="Pseudo" required="required">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" required="required">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <small id="emailHelp" style="color:red;" text-muted><?=$message?></small>
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Se souvenir de moi
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" name="action" value="connect" class="btn btn-primary btn-block btn-flat">Se connecter</button>
                                <button type="submit" name="action" value="register" class="btn btn-primary btn-block btn-flat">Créer un compte</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <div class="social-auth-links text-center mb-3">
                        <p>- OU -</p>
                    </div>

                    <p class="mb-0">
                        <a href="register.php" class="text-center">Enregistrer un nouveau membre</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>

    </body>
</html>
