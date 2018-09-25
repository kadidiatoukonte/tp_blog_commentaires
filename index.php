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
  <p>Derniers billets du blog :</p>
<?php
 include 'config.php';
 $request = $bdd->query('SELECT * FROM billets ORDER BY id DESC LIMIT 0,5');
 while($donnees = $request->fetch()){
 ?>
<div class="news">
  <h3><?php echo $donnees ['titre']; ?>!<em><?php echo $donnees ['date_creation']; ?></em></h3>
  <p><?php echo $donnees ['contenu']; ?></p>
  <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
</div>
<?php
}
 $request->closeCursor();
?>

</body>

</html>
