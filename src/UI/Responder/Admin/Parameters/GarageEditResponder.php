<?php


namespace App\UI\Responder\Admin\Parameters;


use App\Domain\Models\Garage;
use App\UI\Responder\Interfaces\GarageEditResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class GarageEditResponder implements GarageEditResponderInterface
{
    private $twig;

    private $urlGenerator;

    /**
     * GarageEditResponder constructor.
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

    public function response($redirect = false, FormInterface $form = null, Garage $garage): Response
    {
        $redirect ?
            $response = new RedirectResponse($this->urlGenerator->generate('garageShow')) :
            $response = new Response($this->twig->render('admin/parameters/garage-edit.html.twig', [
                'form' => $form->createView(),
                'garage' => $garage,
            ]));

        return $response;
    }
}
