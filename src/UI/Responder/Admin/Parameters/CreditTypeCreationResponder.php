<?php


namespace App\UI\Responder\Admin\Parameters;


use App\UI\Responder\Interfaces\CreditTypeCreationResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

final class CreditTypeCreationResponder implements CreditTypeCreationResponderInterface
{
    private $twig;

    private $urlGenerator;

    /**
     * CreditTypeCreationResponder constructor.
     * @param $twig
     * @param $urlGenerator
     */
    public function __construct(
        Environment $twig,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    public function response($redirect = false, FormInterface $form = null): Response
    {
        $redirect ?
            $response = new RedirectResponse($this->urlGenerator->generate('creditTypeShow')) :
            $response = new Response($this->twig->render('admin/parameters/credit-type-creation.html.twig', [
                'form' => $form->createView(),
            ]));

        return $response;
    }
}
