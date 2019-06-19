<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Form\BrandForm;
use App\Domain\Handler\Interfaces\BrandCreationFormHandlerInterface;
use App\UI\Action\Interfaces\BrandCreationActionInterface;
use App\UI\Responder\Interfaces\BrandCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class BrandCreationAction
 * @Route(name="brandCreation", path="admin/marque/add")
 */
class BrandCreationAction implements BrandCreationActionInterface
{
    private $formFactory;

    private $brandCreationFormHandler;

    /**
     * BrandCreationAction constructor.
     * @param $formFactory
     * @param $brandCreationFormHandler
     */
    public function __construct(FormFactoryInterface $formFactory, BrandCreationFormHandlerInterface $brandCreationFormHandler)
    {
        $this->formFactory = $formFactory;
        $this->brandCreationFormHandler = $brandCreationFormHandler;
    }

    public function __invoke(Request $request, BrandCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(BrandForm::class)->handleRequest($request);

        if ($this->brandCreationFormHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}