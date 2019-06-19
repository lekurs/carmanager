<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Form\CarCreationForm;
use App\Domain\Handler\Interfaces\CarCreationFormHandlerInterface;
use App\UI\Action\Interfaces\CarCreationActionInterface;
use App\UI\Responder\Interfaces\CarCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CarCreationAction
 * @Route(name="carCreation", path="admin/car/add")
 */
class CarCreationAction implements CarCreationActionInterface
{
    private $formFactory;

    private $carCreationFormHandler;

    /**
     * CarCreationAction constructor.
     * @param $formFactory
     * @param $carCreationFormHandler
     */
    public function __construct(FormFactoryInterface $formFactory, CarCreationFormHandlerInterface $carCreationFormHandler)
    {
        $this->formFactory = $formFactory;
        $this->carCreationFormHandler = $carCreationFormHandler;
    }

    public function __invoke(Request $request, CarCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(CarCreationForm::class)->handleRequest($request);

        if ($this->carCreationFormHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}