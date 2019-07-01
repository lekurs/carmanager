<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Form\PlaqueCreationForm;
use App\Domain\Handler\Interfaces\PlaqueCreationFormHandlerInterface;
use App\UI\Action\Interfaces\PlaqueCreationActionInterface;
use App\UI\Responder\Interfaces\PlaqueCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PlaqueCreationAction
 * @Route(name="plaqueCreation", path="admin/plaque/ajouter")
 */
class PlaqueCreationAction implements PlaqueCreationActionInterface
{
    private $formFactory;

    private $plaqueCreationHandler;

    /**
     * PlaqueCreationAction constructor.
     * @param $formFactory
     * @param $plaqueCreationHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        PlaqueCreationFormHandlerInterface $plaqueCreationHandler
    ) {
        $this->formFactory = $formFactory;
        $this->plaqueCreationHandler = $plaqueCreationHandler;
    }

    public function __invoke(Request $request, PlaqueCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(PlaqueCreationForm::class)->handleRequest($request);

        if ($this->plaqueCreationHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}