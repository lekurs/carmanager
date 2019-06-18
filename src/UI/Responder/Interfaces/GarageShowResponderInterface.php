<?php


namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

interface GarageShowResponderInterface
{
    /**
     * GarageShowResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param array $garages
     * @return Response
     */
    public function response(array $garages): Response;
}
