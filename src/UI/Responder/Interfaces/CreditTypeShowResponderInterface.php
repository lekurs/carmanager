<?php


namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

interface CreditTypeShowResponderInterface
{
    /**
     * CreditTypeShowResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param array $creditTypes
     * @return Response
     */
    public function response(array $creditTypes): Response;
}
