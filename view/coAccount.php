<?php
    require_once('./model/connectionAccount.php');

    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['pseudo'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        if(ConnectionAccount::checkAccount($pseudo, $email, $password)) {
            header('location: index.php');
            exit();
        } else {
            header('location: index.php?error=falseid');
            exit();
        }
    }
?>

<div class="containerForm d-flex flex-column justify-content-center align-items-center">
    <h2>Connexion</h2>
    <form method="POST" class="d-flex flex-column justify-content-center align-items-center">
        <p class="d-flex align-items-center">
            <i class="fa-solid fa-user"></i> <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
        </p>
        <p>
            <i class="fa-solid fa-envelope"></i> <input type="text" name="email" id="email" placeholder="E-mail">
        </p>
        <p>
            <i class="fa-solid fa-lock"></i> <input type="password" name="password" id="password" placeholder="Mot de passe">
        </p>

        <?php
            if(isset($_GET['error']) && $_GET['error'] == "falseid") {
                echo "<p class='bg-danger notif'>Vos identifiants sont incorrect</p>"; 
            }
        ?>

        <div class="d-grid gap-2 col-6 mx-auto mt-5">
            <button class="btn btn-dark" type="submit">Connexion</button>
        </div>
    </form>
</div>

