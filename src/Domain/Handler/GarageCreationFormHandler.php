<?php


namespace App\Domain\Handler;


use App\Domain\Factory\Interfaces\GarageFactoryInterface;
use App\Domain\Handler\Interfaces\GarageCreationFormHandlerInterface;
use App\Domain\Repository\Interfaces\GarageRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class GarageCreationFormHandler implements GarageCreationFormHandlerInterface
{
    private $garageFactory;

    private $garageRepo;

    private $session;

    private $validator;

    /**
     * GarageCreationFormHandler constructor.
     *
     * @inheritDoc
     */
    public function __construct(
        GarageFactoryInterface $garageFactory,
        GarageRepositoryInterface $garageRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->garageFactory = $garageFactory;
        $this->garageRepo = $garageRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    /**
     * @inheritDoc
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $garage = $this->garageFactory->create($form->getData()->name, $form->getData()->code);

            $this->garageRepo->save($garage);

            $this->session->getFlashBag()->add('success', 'Le garage à été ajouté');

            return true;
        }

        return false;
    }
}
