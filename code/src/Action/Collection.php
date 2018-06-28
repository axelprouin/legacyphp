<?php

namespace App\Action;

use App\Polyfill\RequestHandlerInterface;
use PDO;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;

final class Collection extends AbstractAction implements RequestHandlerInterface
{
    /**
     * @var PDO
     */
    private $dbConnection;

    public function __construct(PDO $dbConnection)
    {

        $this->dbConnection = $dbConnection;
    }

    public function handle(ServerRequestInterface $request)
    {
        return new Response\HtmlResponse($this->render('collection.php', [
            'dbConnection' => $this->dbConnection
        ]));
    }
}