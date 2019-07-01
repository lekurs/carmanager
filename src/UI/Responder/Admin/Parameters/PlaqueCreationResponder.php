<?php


namespace App\UI\Responder\Admin\Parameters;


use App\UI\Responder\Interfaces\PlaqueCreationResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class PlaqueCreationResponder implements PlaqueCreationResponderInterface
{
    private $twig;

    private $urlGenerator;

    /**
     * PlaqueCreationResponder constructor.
     * @param $twig
     * @param $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator)
    {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    public function response($redirect = false, FormInterface $form = null): Response
    {
        $redirect ?
            $response = new RedirectResponse($this->urlGenerator->generate('admin')) :
            $response = new Response($this->twig->render('admin/parameters/plaque-creation.html.twig', [
                'form' => $form->createView(),
            ]));

        return $response;
    }
}