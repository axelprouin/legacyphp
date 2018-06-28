<?php

require dirname(__FILE__) . '/../vendor/autoload.php';

session_start();

//charger une config applicative
$config = require dirname(dirname(__FILE__)) . '/config/di.global.php';

//kernel applicatif
$application = \App\Application::createFromConfig($config);

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
        <? require dirname(__FILE__) . '/../include/menu.php' ?>
        <div id="contenu">
           <?php $application->run()->getBody(); ?>
        </div>
    </body>
</html>