<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <h1>Mon super blog!</h1>
  <p><a href="index.php">Retour à la liste des billets</a></p>
<?php

 include 'config.php';

 $id_billet = $_GET['billet'];
 $request = $bdd->prepare('SELECT * FROM billets WHERE id = ?');
 $request->execute(array($_GET['billet']));
 $donnees = $request->fetch();
?>
<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation']; ?></em>
    </h3>
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    </p>
</div>
<h2>Commentaires</h2>
<?php
$request->closeCursor();
$request = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet=?');
$request->execute(array($_GET['billet']));
 while($donnees = $request->fetch()){
?>
<p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
<?php
}
$request->closeCursor();
?>
</body>
</html>
