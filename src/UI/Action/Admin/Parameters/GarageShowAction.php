<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Repository\Interfaces\GarageRepositoryInterface;
use App\UI\Action\Interfaces\GarageShowActionInterface;
use App\UI\Responder\Interfaces\GarageShowResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GarageShowAction
 * @Route(name="garageShow", path="admin/pdv")
 */
final class GarageShowAction implements GarageShowActionInterface
{
    private $garageRepo;

    /**
     * GarageShowAction constructor.
     * @param $garageRepo
     */
    public function __construct(GarageRepositoryInterface $garageRepo)
    {
        $this->garageRepo = $garageRepo;
    }

    public function __invoke(Request $request, GarageShowResponderInterface $responder): Response
    {
        $garages = $this->garageRepo->getAll();

        return $responder->response($garages);
    }
}