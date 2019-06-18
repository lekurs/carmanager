<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\GarageRepositoryInterface;
use App\UI\Responder\Interfaces\GarageShowResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface GarageShowActionInterface
{
    /**
     * GarageShowActionInterface constructor.
     *
     * @param GarageRepositoryInterface $garageRepo
     */
    public function __construct(GarageRepositoryInterface $garageRepo);

    /**
     * @param Request $request
     * @param GarageShowResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, GarageShowResponderInterface $responder): Response;
}
