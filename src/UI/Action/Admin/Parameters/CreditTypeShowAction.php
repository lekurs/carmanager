<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Repository\Interfaces\CreditTypeRepositoryInterface;
use App\UI\Action\Interfaces\CreditTypeShowActionInterface;
use App\UI\Responder\Interfaces\CreditTypeShowResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CreditTypeShowAction
 * @Route(name="creditTypeShow", path="admin/credit_type")
 */
class CreditTypeShowAction implements CreditTypeShowActionInterface
{
    private $creditTypeRepo;

    /**
     * CreditTypeShowAction constructor.
     * @param $creditTypeRepo
     */
    public function __construct(CreditTypeRepositoryInterface $creditTypeRepo)
    {
        $this->creditTypeRepo = $creditTypeRepo;
    }

    public function __invoke(CreditTypeShowResponderInterface $responder): Response
    {
        $creditTypes = $this->creditTypeRepo->getAll();

        return $responder->response($creditTypes);
    }
}