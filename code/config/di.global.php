<?php

use App\DependencyInjection\Container;
use Gaufrette\Adapter;
use Gaufrette\Adapter\Local;
use Gaufrette\Filesystem;
use \App\DependencyInjection\Factory\Filesystem as FilesystemFactory;
use \App\DependencyInjection\Factory\FilesystemAdapter as FilesystemAdapter;

$dirname = dirname(__FILE__) . '/di.local.php';
$customParams = [];
if (is_file($dirname)) {
    $customParams = require $dirname;

    if (!$customParams) {
        $customParams = [];
    }
}

$baseParams = [
    'Filesystem' => new FilesystemFactory(),
    'Adapter' => new FilesystemAdapter(),
    'file_path' => function() {
        return isset($_ENV['FILE_PATH']) ? $_ENV['FILE_PATH'] : '/root/couverture';
    }
];

return new Container(Zend\Stdlib\ArrayUtils::merge($baseParams, $customParams));