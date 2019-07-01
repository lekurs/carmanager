<?php


namespace App\Domain\Handler\Admin\Parameters;


use App\Domain\Handler\Interfaces\UserEditFormHandlerInterface;
use App\Domain\Models\User;
use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserEditFormHandler implements UserEditFormHandlerInterface
{
    private $userRepo;

    private $session;

    private $validator;

    /**
     * UserEditFormHandler constructor.
     * @param $userRepo
     * @param $session
     * @param $validator
     */
    public function __construct(
        UserRepositoryInterface $userRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->userRepo = $userRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    public function handle(FormInterface $form, User $user): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            if (!empty($form->getData()->password)) {
                $user->editUser($form->getData());
            } else {
                $password = $user->getPassword();

                $user->editUser($form->getData(), $password);
            }

            $this->userRepo->edit();

            return true;
        }

        return false;
    }
}