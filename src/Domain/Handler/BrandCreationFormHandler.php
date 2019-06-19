<?php


namespace App\Domain\Handler;


use App\Domain\Factory\Interfaces\BrandFactoryInterface;
use App\Domain\Handler\Interfaces\BrandCreationFormHandlerInterface;
use App\Domain\Repository\Interfaces\BrandRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class BrandCreationFormHandler implements BrandCreationFormHandlerInterface
{
    private $marqueRepo;

    private $marqueFactory;

    private $session;

    private $validator;

    /**
     * BrandCreationFormHandler constructor.
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

            $brand = $this->marqueFactory->create($form->getData()->brand);

            $this->marqueRepo->save($brand);

            $this->session->getFlashBag()->add('success', 'Marque | Constructeur ajouté');

            return true;
        }

        return false;
    }
}
