<?php


namespace App\UI\Responder\Admin\Parameters;


use App\UI\Responder\Interfaces\BrandCreationResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class BrandCreationResponder implements BrandCreationResponderInterface
{
    private $urlGenerator;

    private $twig;

    /**
     * BrandCreationResponder constructor.
     * @param $urlGenerator
     * @param $twig
     */
    public function __construct(UrlGeneratorInterface $urlGenerator, Environment $twig)
    {
        $this->urlGenerator = $urlGenerator;
        $this->twig = $twig;
    }

    public function response($redirect = false, FormInterface $form= null): Response
    {
        $redirect ?
            $response = new RedirectResponse($this->urlGenerator->generate('admin')) :
            $response = new Response($this->twig->render('admin/parameters/brand-creation.html.twig', [
                'form' => $form->createView(),
            ]));

        return $response;
    }
}