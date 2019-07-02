<?php


namespace App\UI\Responder\Interfaces;


use App\Domain\Models\Garage;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

interface GarageEditResponderInterface
{
    public function __construct(
        Environment $twig,
        UrlGeneratorInterface $urlGenerator
    );

    /**
     * @param bool $redirect
     * @param FormInterface|null $form
     * @param Garage $garage
     * @return Response
     */
    public function response($redirect = false, FormInterface $form = null, Garage $garage): Response;
}
