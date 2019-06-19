<?php


namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\CarFactoryInterface;
use App\Domain\Repository\Interfaces\CarRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface CarCreationFormHandlerInterface
{
    /**
     * CarCreationFormHandlerInterface constructor.
     *
     * @param CarFactoryInterface $carFactory
     * @param CarRepositoryInterface $carRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        CarFactoryInterface $carFactory,
        CarRepositoryInterface $carRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
