<?php


namespace App\UI\Responder\Admin\Parameters;


use App\UI\Responder\Interfaces\UserShowResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class UserShowResponder implements UserShowResponderInterface
{
    private $twig;

    /**
     * UserShowResponder constructor.
     * @param $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function response(array $users): Response
    {
        return new Response($this->twig->render('admin/parameters/user-show.html.twig', [
            'users' =>$users
        ]));
    }
}