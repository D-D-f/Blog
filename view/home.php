<?php
    $title = "Accueil";
    ob_start();
    if(!$_GET['page']) {
?>
    <aside class="d-flex justify-content-evenly align-items-center">
        <img class="img_presentation" src="public/assets/img/dev.jpg" alt="développeur web">
        <p class="text_presentation">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias vel illum omnis dignissimos porro velit ea maiores quos provident saepe qui fugit eveniet minima natus eum modi, neque quisquam! Voluptas obcaecati deserunt veniam consequatur quos dolores dicta non explicabo, eveniet cumque aut voluptate in quam dolor? Ullam ut, itaque nostrum nisi magnam inventore vero quisquam. Totam, perspiciatis? Eius officiis officia dolore est, ullam veniam doloremque nisi beatae enim quia accusantium, sed sequi sit. Vel veritatis vitae, aut repudiandae debitis eveniet ad beatae placeat consequatur cum et sint accusamus incidunt eaque, dolorum voluptatem deserunt, quia facilis. Doloremque at quasi repellat rem! </p>
    </aside>
        <section class="d-flex flex-column justify-content-between sect">
              <h2>Tous les articles</h2>
            <div class="d-flex justify-content-around align-items-center">
                <?php require('view/displayCardArticle.php'); ?>
            </div>
        </section>
<?php       
    }
    $content = ob_get_clean();
    require('view/template.php');
?>