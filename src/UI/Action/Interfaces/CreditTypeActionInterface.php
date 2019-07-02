<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\CreditTypeCreationHandlerInterface;
use App\UI\Responder\Interfaces\CreditTypeCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface CreditTypeActionInterface
{
    /**
     * CreditTypeActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param CreditTypeCreationHandlerInterface $creditTypeCreationHandler
     */
    public function __construct (
        FormFactoryInterface $formFactory,
        CreditTypeCreationHandlerInterface $creditTypeCreationHandler
    );

    /**
     * @param Request $request
     * @param CreditTypeCreationResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, CreditTypeCreationResponderInterface $responder): Response;
}
