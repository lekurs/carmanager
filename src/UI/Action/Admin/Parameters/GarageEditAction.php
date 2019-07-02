<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\DTO\Parameters\GarageEditDTO;
use App\Domain\Form\Parameters\GarageEditForm;
use App\Domain\Handler\Interfaces\GarageEditFormHandlerInterface;
use App\Domain\Repository\Interfaces\GarageRepositoryInterface;
use App\UI\Action\Interfaces\GarageEditActionInterface;
use App\UI\Responder\Interfaces\GarageEditResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GarageEditAction
 * @Route(name="garageEdit", path="admin/pdv/edit/{slug}")
 */
final class GarageEditAction implements GarageEditActionInterface
{
    private $garageEditHandler;

    private $garageRepo;

    private $formFactory;

    /**
     * GarageEditAction constructor.
     *
     * @param GarageEditFormHandlerInterface $garageEditHandler
     * @param GarageRepositoryInterface $garageRepo
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        GarageEditFormHandlerInterface $garageEditHandler,
        GarageRepositoryInterface $garageRepo,
        FormFactoryInterface $formFactory
    ) {
        $this->garageEditHandler = $garageEditHandler;
        $this->garageRepo = $garageRepo;
        $this->formFactory = $formFactory;
    }

    public function __invoke(Request $request, GarageEditResponderInterface $responder): Response
    {
        $garage = $this->garageRepo->getOneBySlug($request->attributes->get('slug'));

        $garageDTO = new GarageEditDTO(
            $garage->getCode(),
            $garage->getName(),
            $garage->getBrand(),
            $garage->getPlaque()
        );

        $form = $this->formFactory->create(GarageEditForm::class, $garageDTO)->handleRequest($request);

        if ($this->garageEditHandler->handle($form, $garage)) {

            return $responder->response(true, null, $garage);
        }

        return $responder->response(false, $form, $garage);
    }
}
