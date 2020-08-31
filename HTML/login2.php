<!--
 * Projet       : Travail de rentrée
 * Auteur       : Duparc Yohan
 * Date         : 24/08/2020
 * Description  : Faire un projet avec HTML/CSS et avec une base de données
 * Version      : 1.0
-->
<?php session_start(); ?>
<?php
if (!empty($_POST) && !empty($_POST['NomComplet']) && !empty($_POST['Password'])){
        require_once '../HTML/db.php';
        require_once '../HTML/Function.php';
        $req = $pdo->prepare('SELECT * FROM inscription WHERE (nomComplet = :nomComplet OR email = :nomComplet) AND comfirmed_at IS NOT NULL');
        $req->execute(['NomComplet' => $_POST['NomComplet']]);
        $user = $req->fetch();
        if(password_verify($_POST['Password'], $user->password)){
            $_SESSION['auth'] = $user;
            $_SESSION['flash']['sucess'] = 'bravo';
            header('Location: account.php');
            exit;
        }else{
           $_SESSION['flash']['danger'] = 'pas juste'; 
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

                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" required="required">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Mot de passe" required="required">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Se souvenir de moi
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Se connecter</button>
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
