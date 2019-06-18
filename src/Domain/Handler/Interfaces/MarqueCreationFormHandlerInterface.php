<?php


namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\MarqueFactoryInterface;
use App\Domain\Repository\Interfaces\MarqueRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface MarqueCreationFormHandlerInterface
{
    /**
     * MarqueCreationFormHandlerInterface constructor.
     *
     * @param MarqueRepositoryInterface $marqueRepo
     * @param MarqueFactoryInterface $marqueFactory
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        MarqueRepositoryInterface $marqueRepo,
        MarqueFactoryInterface $marqueFactory,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
