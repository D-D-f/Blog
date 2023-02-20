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
<body>
    <header>
        <a href="index.php" class="logo">
            <i class="fa-solid fa-dragon"></i>
        </a>
        <nav class="d-flex justify-content-between align-items-center">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark">Contact</a>
                </li>
            </ul>

            <div class="signIn">
                <?php
                    if($_SESSION['connect'] == 1) {
                ?>
                        <form action="./index.php" method="POST">
                            <span><i class="fa-solid fa-user"></i> <?= $_SESSION['pseudo'];?></span>
                            <input type="submit" name="signoff" id="signoff" value="Déconnexion">
                        </form>
                <?php
                    } else {
                ?>
                        <a href="./?page=connexion"> Connexion</a>
                        <a href="./?page=inscription">Inscription</a>
                <?php
                    }

                    if($_POST['signoff']) {
                        session_destroy();
                        header('location: index.php');
                        exit();
                    }
                ?>                
            </div>
        </nav>
    </header>
        <?= $content ?>
        <section class="d-flex justify-content-around">
            <?php 
                require('./view/displayCardArticle.php');
            ?>
        </section>
    <footer>
        <span>© Blog David de Freitas 2023</span>
    </footer>
</body>
</html>