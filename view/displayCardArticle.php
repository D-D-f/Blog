<?php
    require('./model/connection.php');

    $requete = $bdd->prepare('SELECT id, title, date, resum FROM Articles');
    $requete->execute();

    while($result = $requete->fetch()) {
        $id = $result['id'];
        $url = "./?page=article&id=" .$id;
?>
<a class="row card_lien" href="<?php echo $url; ?>">
  <div class="col">
    <div class="card">
      <img src="public/assets/img/articles.jpg" class="card-img-top" alt="fc porto mascotte">
        <div class="card-body">
            <h5 class="card-title"><?= $result['title'] ?></h5>
            <p class="card-text"><?= $result['resum'] ?></p>
        <button class="btn btn-primary">Voir plus</button>
        </div>
    </div>
  </div>
</a>

<?php
    }
?>