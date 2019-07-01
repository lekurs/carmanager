<?php


namespace App\Domain\Handler\Security;


use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Domain\Handler\Interfaces\UserCreationFormHandlerInterface;
use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserCreationFormHandler implements UserCreationFormHandlerInterface
{
    private $userFactory;

    private $userRepo;

    private $session;

    private $validator;

    private $slugify;

    /**
     * UserCreationFormHandler constructor.
     * @param UserFactoryInterface $userFactory
     * @param UserRepositoryInterface $userRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     * @param SlugHelperInterface $slugify
     */
    public function __construct(
        UserFactoryInterface $userFactory,
        UserRepositoryInterface $userRepo,
        SessionInterface $session,
        ValidatorInterface $validator,
        SlugHelperInterface $slugify
    ) {
        $this->userFactory = $userFactory;
        $this->userRepo = $userRepo;
        $this->session = $session;
        $this->validator = $validator;
        $this->slugify = $slugify;
    }

    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $user = $this->userFactory->create(
                $form->getData()->username,
                $form->getData()->lastName,
                $form->getData()->password,
                $form->getData()->roles,
                $form->getData()->email,
                true,
                $this->slugify->replace($form->getData()->lastName . '-' . $form->getData()->username),
                $form->getData()->garage
            );

            $this->userRepo->save($user);

            $this->session->getFlashBag()->add('success', 'Utilisateur ajouté');

            return true;
        }

        return false;
    }
}