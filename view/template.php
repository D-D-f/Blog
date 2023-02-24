<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="public/design/css/style.css">
    <title><?= $title ?></title>
</head>
<body class="d-flex flex-column justify-content-between bg-dark text-light">
        <nav class="navbar bg-body-tertiary d-flex justify-content-center align-items-center">
        <div class="container-fluid bg-primary">
            <h1>
                <a class="navbar-brand text-dark" href="index.php">ActuWeb</a>
            </h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ActuWeb</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                </li>
                <?php 
                    if(isset($_SESSION['pseudo'])) {
                ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['pseudo']; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                    if($_SESSION['connect'] == 1) {
                                        if(Admin::admin($_SESSION['pseudo'])) { ?>
                                                <li class="nav-item">
                                                    <a href="./?page=createarticle">Créer un article</a>
                                                </li>
                                        <?php 
                                        
                                    }?>
                                    <form class="form_deco" action="./index.php" method="POST">
                                        <input type="submit" name="signoff" id="signoff" value="Déconnexion">
                                    </form>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php
                        } else {
                    ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./?page=connexion">Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./?page=inscription">Inscription</a>
                            </li>
                    <?php
                        }
                            if($_POST['signoff']) {
                            session_destroy();
                            header('location: index.php');
                            exit();
                        }
                    ?> 
                </ul>
            </div>
            </div>
        </div>
    </nav>

    <?= $content ?>
   
    <footer class="bg-primary text-dark p-4">
        <span>© Blog David de Freitas 2023</span>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>