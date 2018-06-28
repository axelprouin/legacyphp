<?php
session_start();

//if ('identification' == $_GET['page'] and isset($_SESSION['identifie'])
//    && true === $_SESSION['identifie']) {
//    header('Location: index.php');
//    require dirname(__FILE__) . '/../include/connexion.php';
//}

 ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Travailler avec du legacy</title>
        <link href="css/principal.css" media="screen" rel="stylesheet" type="text/css">
    </head>
    <body>
        <? require dirname(__FILE__) . '/menu.php' ?>
        <div id="contenu">
            <?php echo $content ?>
        </div>
    </body>
</html>