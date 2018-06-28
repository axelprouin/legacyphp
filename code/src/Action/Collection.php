<?php

namespace App\Action;

use App\Polyfill\RequestHandlerInterface;
use PDO;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;

final class Collection implements RequestHandlerInterface
{
    private $dbConnection;

    private $templateRenderer;

    public function __construct(PDO $dbConnection, TemplateRendererInterface $templateRenderer)
    {

        $this->dbConnection = $dbConnection;
        $this->templateRenderer = $templateRenderer;
    }

    public function handle(ServerRequestInterface $request)
    {
        ob_start();
        require dirname(dirname(dirname(__FILE__))) . '/include/collection.php';
        $content = ob_get_clean();

        return new Response\HtmlResponse($content);
    }
}