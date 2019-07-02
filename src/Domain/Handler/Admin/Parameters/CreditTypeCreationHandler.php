<?php


namespace App\Domain\Handler\Admin\Parameters;


use App\Domain\Factory\Interfaces\CreditTypeFactoryInterface;
use App\Domain\Handler\Interfaces\CreditTypeCreationHandlerInterface;
use App\Domain\Repository\Interfaces\CreditTypeRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreditTypeCreationHandler implements CreditTypeCreationHandlerInterface
{
    private $creditTypeRepo;

    private $creditTypeFactory;

    private $session;

    private $validator;

    /**
     * CreditTypeCreationHandler constructor.
     * @param $creditTypeRepo
     * @param $creditTypeFactory
     * @param $session
     * @param $validator
     */
    public function __construct(
        CreditTypeRepositoryInterface $creditTypeRepo,
        CreditTypeFactoryInterface $creditTypeFactory,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->creditTypeRepo = $creditTypeRepo;
        $this->creditTypeFactory = $creditTypeFactory;
        $this->session = $session;
        $this->validator = $validator;
    }

    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $creditType = $this->creditTypeFactory->create($form->getData()->type);

//            $this->validator->validate($form->getData(), [], []);

            $this->creditTypeRepo->save($creditType);

            $this->session->getFlashBag()->add('success', 'Type de financement ajouté');

            return true;
        }

        return false;
    }
}