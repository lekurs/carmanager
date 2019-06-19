<?php


namespace App\Domain\Handler;


use App\Domain\Factory\Interfaces\BrandFactoryInterface;
use App\Domain\Handler\Interfaces\MarqueCreationFormHandlerInterface;
use App\Domain\Repository\Interfaces\BrandRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class MarqueCreationFormHandler implements MarqueCreationFormHandlerInterface
{
    private $marqueRepo;

    private $marqueFactory;

    private $session;

    private $validator;

    /**
     * MarqueCreationFormHandler constructor.
     *
     * @inheritDoc
     */
    public function __construct(
        BrandRepositoryInterface $marqueRepo,
        BrandFactoryInterface $marqueFactory,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->marqueRepo = $marqueRepo;
        $this->marqueFactory = $marqueFactory;
        $this->session = $session;
        $this->validator = $validator;
    }

    /**
     * @inheritDoc
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $marque = $this->marqueFactory->create($form->getData()->marque);

            $this->marqueRepo->save($marque);

            $this->session->getFlashBag()->add('success', 'Marque | Constructeur ajouté');
        }
    }
}
