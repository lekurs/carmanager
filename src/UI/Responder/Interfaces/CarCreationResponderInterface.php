<?php


namespace App\UI\Responder\Interfaces;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

interface CarCreationResponderInterface
{
    /**
     * CarCreationResponderInterface constructor.
     *
     * @param UrlGeneratorInterface $urlGenerator
     * @param Environment $twig
     */
    public function __construct(UrlGeneratorInterface $urlGenerator, Environment $twig);

    /**
     * @param bool $redirect
     * @param FormInterface|null $form
     * @return Response
     */
    public function response($redirect = false, FormInterface $form = null): Response;
}
