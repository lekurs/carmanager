<?php


namespace App\Domain\Handler\Admin\Parameters;


use App\Domain\Handler\Interfaces\GarageEditFormHandlerInterface;
use App\Domain\Models\Garage;
use App\Domain\Repository\Interfaces\GarageRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

final class GarageEditFormHandler implements GarageEditFormHandlerInterface
{
    private $garageRepo;

    private $session;

    /**
     * GarageEditFormHandler constructor.
     * @param $garageRepo
     * @param $session
     */
    public function __construct(
        GarageRepositoryInterface $garageRepo,
        SessionInterface $session
    ) {
        $this->garageRepo = $garageRepo;
        $this->session = $session;
    }

    public function handle(FormInterface $form, Garage $garage): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $garage->editGarage($form->getData());

            $this->garageRepo->edit();

            $this->session->getFlashBag()->add('success', 'Garage mit à jour');

            return true;
        }

        return false;
    }
}
