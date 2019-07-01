<?php


namespace App\UI\Responder\Admin\Parameters;


use App\Domain\Models\User;
use App\UI\Responder\Interfaces\UserEditResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class UserEditResponder implements UserEditResponderInterface
{
    private $twig;

    private $urlGenerator;

    /**
     * UserEditResponder constructor.
     * @param $twig
     * @param $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator)
    {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    public function response($redirect = false, FormInterface $form = null, User $user): Response
    {
        $redirect ?
            $response = new RedirectResponse($this->urlGenerator->generate('userShow')) :
            $response = new Response($this->twig->render('admin/parameters/user-edit.html.twig', [
                'form' => $form->createView(),
                'user' => $user
            ]));

        return $response;
    }
}