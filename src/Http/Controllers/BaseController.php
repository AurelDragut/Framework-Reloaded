<?php

namespace App\src\Http\Controllers;

use Psr\Http\Message\ResponseInterface;
use Twig\Environment;

class BaseController
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function render(ResponseInterface $response, string $view, array $arguments)
    {
        $response->getBody()->write(
            $this->twig->render("$view.twig", $arguments)
        );

        return $response;
    }
}
