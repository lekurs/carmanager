<?php


namespace App\UI\Responder\Admin;


use App\UI\Responder\Interfaces\AdminHomeResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class AdminHomeResponder implements AdminHomeResponderInterface
{
    private $twig;

    /**
     * AdminHomeResponder constructor.
     * @param $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function response(): Response
    {
        return new Response($this->twig->render('layout/admin-layout.html.twig'));
    }
}