<?php


namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\GarageFactoryInterface;
use App\Domain\Repository\Interfaces\GarageRepositoryInterface;
use App\Services\Interfaces\SlugHelperInterface;
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
     * @param SlugHelperInterface $slugHelper
     */
    public function __construct(
        GarageFactoryInterface $garageFactory,
        GarageRepositoryInterface $garageRepo,
        SessionInterface $session,
        ValidatorInterface $validator,
        SlugHelperInterface $slugHelper
    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
