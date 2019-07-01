<?php


namespace App\UI\Action\Security;


use App\Domain\Form\Security\UserCreationForm;
use App\Domain\Handler\Interfaces\UserCreationFormHandlerInterface;
use App\UI\Action\Interfaces\UserCreationActionInterface;
use App\UI\Responder\Interfaces\UserCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserCreationAction
 * @Route(name="userCreation", path="admin/utilisateur/ajouter")
 */
class UserCreationAction implements UserCreationActionInterface
{
    private $userCreationHandler;

    private $formFactory;

    /**
     * UserCreationAction constructor.
     * @param $userCreationHandler
     * @param $formFactory
     */
    public function __construct(
        UserCreationFormHandlerInterface $userCreationHandler,
        FormFactoryInterface $formFactory
    ) {
        $this->userCreationHandler = $userCreationHandler;
        $this->formFactory = $formFactory;
    }

    public function __invoke(Request $request, UserCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(UserCreationForm::class)->handleRequest($request);

        if ($this->userCreationHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}