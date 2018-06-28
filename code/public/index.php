<?php

require dirname(__FILE__) . '/../vendor/autoload.php';

//charger une config applicative
$config = require dirname(dirname(__FILE__)) . '/config/di.global.php';

//kernel applicatif
$application = \App\Application::createFromConfig($config);
echo $application->run()->getBody();