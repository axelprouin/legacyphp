<?php

namespace App\Action;

use App\Polyfill\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;

final class Collection implements RequestHandlerInterface
{
    private $dbConnection;

    public function __construct($dbConnection)
    {

        $this->dbConnection = $dbConnection;
    }

    public function handle(ServerRequestInterface $request)
    {
        return new Response\HtmlResponse(require dirname(dirname(dirname(__FILE__))) . '/include/collection.php');
    }
}