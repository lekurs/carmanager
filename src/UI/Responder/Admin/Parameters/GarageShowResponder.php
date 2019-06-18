<?php


namespace App\UI\Responder\Admin\Parameters;


use App\UI\Responder\Interfaces\GarageShowResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class GarageShowResponder implements GarageShowResponderInterface
{
    private $twig;

    /**
     * GarageShowResponder constructor.
     *
     * @inheritDoc
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @inheritDoc
     */
    public function response(array $garages): Response
    {
        return new Response($this->twig->render('admin/parameters/garage-show.html.twig', [
            'garages' => $garages
        ]));
    }
}
