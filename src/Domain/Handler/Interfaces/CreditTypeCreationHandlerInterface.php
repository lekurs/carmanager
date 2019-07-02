<?php


namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\CreditTypeFactoryInterface;
use App\Domain\Repository\Interfaces\CreditTypeRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface CreditTypeCreationHandlerInterface
{
    /**
     * CreditTypeCreationHandlerInterface constructor.
     *
     * @param CreditTypeRepositoryInterface $creditTypeRepo
     * @param CreditTypeFactoryInterface $creditTypeFactory
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        CreditTypeRepositoryInterface $creditTypeRepo,
        CreditTypeFactoryInterface $creditTypeFactory,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
