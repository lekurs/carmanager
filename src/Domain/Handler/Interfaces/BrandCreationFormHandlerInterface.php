<?php


namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\BrandFactoryInterface;
use App\Domain\Repository\Interfaces\BrandRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface BrandCreationFormHandlerInterface
{
    /**
     * BrandCreationFormHandlerInterface constructor.
     *
     * @param BrandRepositoryInterface $marqueRepo
     * @param BrandFactoryInterface $marqueFactory
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        BrandRepositoryInterface $marqueRepo,
        BrandFactoryInterface $marqueFactory,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
