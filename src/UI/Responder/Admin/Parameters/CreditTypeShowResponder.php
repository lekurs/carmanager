<?php


namespace App\UI\Responder\Admin\Parameters;


use App\UI\Responder\Interfaces\CreditTypeShowResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class CreditTypeShowResponder implements CreditTypeShowResponderInterface
{
    private $twig;

    /**
     * CreditTypeShowResponder constructor.
     * @param $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function response(array $creditTypes): Response
    {
        return new Response($this->twig->render('admin/parameters/credit-type-show.html.twig', [
            'creditTypes' => $creditTypes,
        ]));
    }
}