<?php


namespace App\UI\Action\Admin;


use App\UI\Action\Interfaces\AdminHomeActionInterface;
use App\UI\Responder\Interfaces\AdminHomeResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminHomeAction
 * @Route(name="admin", path="admin")
 */
class AdminHomeAction implements AdminHomeActionInterface
{
    public function __invoke(AdminHomeResponderInterface $responder): Response
    {
        return $responder->response();
    }
}