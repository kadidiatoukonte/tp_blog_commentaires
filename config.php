<?php

try

{

    $bdd = new PDO('mysql:host=localhost;dbname=tp_blog_des_commentaires;charset=utf8', 'root', 'aoua1993');

}

catch(Exception $e)

{

        die('Erreur : '.$e->getMessage());

}
