<?php


namespace App\Domain\Handler;


use App\Domain\Factory\Interfaces\CarFactoryInterface;
use App\Domain\Handler\Interfaces\CarCreationFormHandlerInterface;
use App\Domain\Repository\Interfaces\CarRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class CarCreationFormHandler implements CarCreationFormHandlerInterface
{
    private $carFactory;

    private $carRepo;

    private $session;

    private $validator;

    /**
     * CarCreationFormHandler constructor.
     *
     * @inheritDoc
     */
    public function __construct(
        CarFactoryInterface $carFactory,
        CarRepositoryInterface $carRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->carFactory = $carFactory;
        $this->carRepo = $carRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    /**
     * @inheritDoc
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $car = $this->carFactory->create($form->getData()->model, $form->getData()->brand);

            $this->carRepo->save($car);

            $this->session->getFlashBag()->add('success', 'Véhicule ajouté');

            return true;
        }

        return false;
    }
}
