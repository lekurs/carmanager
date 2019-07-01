<?php


namespace App\Domain\Handler;


use App\Domain\Factory\Interfaces\PlaqueFactoryInterface;
use App\Domain\Handler\Interfaces\PlaqueCreationFormHandlerInterface;
use App\Domain\Repository\Interfaces\PlaqueRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PlaqueCreationFormHandler implements PlaqueCreationFormHandlerInterface
{
    private $plaqueFactory;

    private $plaqueRepo;

    private $session;

    private $validator;

    /**
     * PlaqueCreationFormHandler constructor.
     * @param $plaqueFactory
     * @param $plaqueRepo
     * @param $session
     * @param $validator
     */
    public function __construct(
        PlaqueFactoryInterface $plaqueFactory,
        PlaqueRepositoryInterface $plaqueRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->plaqueFactory = $plaqueFactory;
        $this->plaqueRepo = $plaqueRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $plaque = $this->plaqueFactory->create($form->getData()->name, $form->getData()->zone);

            $this->plaqueRepo->save($plaque);

            $this->session->getFlashBag()->add('success', 'Plaque ajoutée');

            return true;
        }

        return false;
    }
}