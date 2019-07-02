<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Form\Parameters\CreditTypeForm;
use App\Domain\Handler\Interfaces\CreditTypeCreationHandlerInterface;
use App\UI\Action\Interfaces\CreditTypeActionInterface;
use App\UI\Responder\Interfaces\CreditTypeCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CreditTypeAction
 * @Route(name="creditTypeCreation", path="admin/credit_type/add")
 */
final class CreditTypeAction implements CreditTypeActionInterface
{
    private $formFactory;

    private $creditTypeCreationHandler;

    /**
     * CreditTypeAction constructor.
     * @param $formFactory
     * @param $creditTypeCreationHandler
     */
    public function __construct (
        FormFactoryInterface $formFactory,
        CreditTypeCreationHandlerInterface $creditTypeCreationHandler
    ) {
        $this->formFactory = $formFactory;
        $this->creditTypeCreationHandler = $creditTypeCreationHandler;
    }

    public function __invoke(Request $request, CreditTypeCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(CreditTypeForm::class)->handleRequest($request);

        if ($this->creditTypeCreationHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}
