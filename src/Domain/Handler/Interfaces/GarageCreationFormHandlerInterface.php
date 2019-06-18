<?php


namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\GarageFactoryInterface;
use App\Domain\Repository\Interfaces\GarageRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface GarageCreationFormHandlerInterface
{
    /**
     * GarageCreationFormHandlerInterface constructor.
     *
     * @param GarageFactoryInterface $garageFactory
     * @param GarageRepositoryInterface $garageRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        GarageFactoryInterface $garageFactory,
        GarageRepositoryInterface $garageRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
