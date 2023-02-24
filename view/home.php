<?php
    $title = "Accueil";
    ob_start();
    if(!$_GET['page']) {
?>
    <aside class="container d-flex justify-content-evenly align-items-center">
        <img class="img_presentation" src="public/assets/img/dev.jpg" alt="développeur web">
        <p class="text_presentation">Bienvenue sur notre blog dédié à l'actualité du web ! Vous y trouverez les dernières tendances en matière de design, de développement, de marketing digital et bien plus encore. Nous nous efforçons de vous tenir informé(e)s des dernières évolutions du monde numérique, en vous présentant les nouveautés les plus importantes et les outils les plus utiles pour vous aider à améliorer votre présence en ligne. Que vous soyez un(e) professionnel(le) du web, un(e) entrepreneur(e) ou simplement un(e) passionné(e) de technologie, notre blog vous offre une source d'information fiable et intéressante. N'hésitez pas à explorer nos articles et à nous faire part de vos commentaires et suggestions !</p>
    </aside>
    <section class="container d-flex flex-column justify-content-between sect">
        <h2>Tous les articles</h2>
        <div class="d-flex justify-content-between">
            <?php require('view/displayCardArticle.php'); ?>
        </div>
    </section>
<?php       
    }
    $content = ob_get_clean();
    require('view/template.php');
?>