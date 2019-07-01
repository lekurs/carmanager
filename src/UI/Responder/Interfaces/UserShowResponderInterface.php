<?php


namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

interface UserShowResponderInterface
{
    /**
     * UserShowResponderInterface constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param array $users
     * @return Response
     */
    public function response(array $users): Response;
}
