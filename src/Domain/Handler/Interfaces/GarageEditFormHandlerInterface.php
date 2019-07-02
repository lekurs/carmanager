<?php


namespace App\Domain\Handler\Interfaces;


use App\Domain\Models\Garage;
use App\Domain\Repository\Interfaces\GarageRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

interface GarageEditFormHandlerInterface
{
    /**
     * GarageEditFormHandlerInterface constructor.
     *
     * @param GarageRepositoryInterface $garageRepo
     * @param SessionInterface $session
     */
    public function __construct(
        GarageRepositoryInterface $garageRepo,
        SessionInterface $session
    );

    /**
     * @param FormInterface $form
     * @param Garage $garage
     * @return bool
     */
    public function handle(FormInterface $form, Garage $garage): bool;
}
