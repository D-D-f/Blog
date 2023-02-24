<?php
    session_start();
    require_once('./model/inscription.php');
    require_once('./model/verification.php');
    require_once('./model/security.php');

    if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = strtolower(htmlspecialchars($_POST['email']));
        $password = htmlspecialchars($_POST['password']);
        
        if(Verification::pseudoDouble($pseudo)) {
            header('location: index.php?error=pseudoexist');
            exit();
        }

        if(!Verification::syntaxeEmail($email)) {
            header('location: index.php?error=syntaxe');
            exit();
        }
        
        if(Verification::emailDouble($email)) {
            header('location: index.php?error=double');
			exit();
        }

        if(!Verification::passwordVerif($password, $_POST['password_2'])) {
            header('location: index.php?error=different');
            exit();
        }

        $password = Security::code($password);
        $user = new Inscription($pseudo, $email, $password);
        $user->saveUser();
        $user->createSession();
        header('location: index.php');
        exit();
    }    
?>

<?php
    $title = "Formulaire d'inscription";
    ob_start();
?>

    <div class="containerForm d-flex flex-column justify-content-center align-items-center">
    <h2>Formulaire d'inscription</h2>
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
        <p>
            <i class="fa-solid fa-lock"></i> <input type="password" name="password_2" id="password_2" placeholder="Confirmer votre mot de passe">
        </p>

         <?php
            if(isset($_GET['error']) && $_GET['error'] == "pseudoexist") {
                echo "<p class='bg-danger mt-4 notif'>Votre pseudo existe déjà</p>";
            } 
            if(isset($_GET['error']) && $_GET['error'] == "double") {
                echo "<p class='bg-danger mt-4 notif'>Votre adresse mail existe déjà</p>";
            } 
            if(isset($_GET['error']) && $_GET['error'] == "different") {
                echo "<p class='bg-danger mt-4 notif'>Votre mot de passe est différent</p>";
            }
            if(isset($_GET['validation']) && $_GET['validation'] == "inscrit") {
                echo "<p class='bg-success mt-4 notif'>Félicitations vous êtes inscrit.</p>";
            }  
        ?>
        <div class="d-grid gap-2 col-6 mx-auto mt-5">
            <button class="btn btn-primary" type="submit">S'inscrire</button>
        </div>
    </form>
</div>

<?php
    $content = ob_get_clean();
    require('view/template.php');
?>


