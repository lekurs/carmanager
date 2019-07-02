<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\GarageEditFormHandlerInterface;
use App\Domain\Repository\Interfaces\GarageRepositoryInterface;
use App\UI\Responder\Interfaces\GarageEditResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface GarageEditActionInterface
{
    /**
     * GarageEditActionInterface constructor.
     *
     * @param GarageEditFormHandlerInterface $garageEditHandler
     * @param GarageRepositoryInterface $garageRepo
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        GarageEditFormHandlerInterface $garageEditHandler,
        GarageRepositoryInterface $garageRepo,
        FormFactoryInterface $formFactory
    );

    /**
     * @param Request $request
     * @param GarageEditResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, GarageEditResponderInterface $responder): Response;
}
