<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Form\GarageCreationForm;
use App\Domain\Handler\Interfaces\GarageCreationFormHandlerInterface;
use App\UI\Action\Interfaces\GarageCreationActionInterface;
use App\UI\Responder\Interfaces\GarageCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GarageCreationAction
 * @Route(name="garageCreation", path="admin/pdv/add")
 */
final class GarageCreationAction implements GarageCreationActionInterface
{
    private $formFactory;

    private $garageCreationFormHandler;

    /**
     * GarageCreationAction constructor.
     *
     * @inheritDoc
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        GarageCreationFormHandlerInterface $garageCreationFormHandler
    )
    {
        $this->formFactory = $formFactory;
        $this->garageCreationFormHandler = $garageCreationFormHandler;
    }

    public function __invoke(Request $request, GarageCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(GarageCreationForm::class)->handleRequest($request);

        if ($this->garageCreationFormHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}