<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\DTO\Security\UserEditFormDTO;
use App\Domain\Form\Security\UserEditForm;
use App\Domain\Handler\Interfaces\UserEditFormHandlerInterface;
use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use App\UI\Action\Interfaces\UserEditActionInterface;
use App\UI\Responder\Interfaces\UserEditResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserEditAction
 * @Route(name="userEdit", path="admin/uilisateur/{slug}")
 */
final class UserEditAction implements UserEditActionInterface
{
    private $userRepo;

    private $formFactory;

    private $userEditHandler;

    /**
     * UserEditAction constructor.
     *
     * @inheritDoc
     */
    public function __construct(
        UserRepositoryInterface $userRepo,
        FormFactoryInterface $formFactory,
        UserEditFormHandlerInterface $userEditHandler
    ) {
        $this->userRepo = $userRepo;
        $this->formFactory = $formFactory;
        $this->userEditHandler = $userEditHandler;
    }

    public function __invoke(Request $request, UserEditResponderInterface $responder): Response
    {
        $user = $this->userRepo->getOneBySlug($request->attributes->get('slug'));

        $userEditDto = new UserEditFormDTO(
            $user->getUsername(),
            $user->getLastName(),
            $user->getPassword(),
            $user->getRoles(),
            $user->getEmail(),
            $user->getOnline(),
            $user->getGarage()
        );

        $form = $this->formFactory->create(UserEditForm::class, $userEditDto)->handleRequest($request);

        if ($this->userEditHandler->handle($form, $user)) {

            return $responder->response(true, null, $user);
        }

        return $responder->response(false, $form, $user);
    }
}