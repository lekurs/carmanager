<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use App\UI\Action\Interfaces\UserShowActionInterface;
use App\UI\Responder\Interfaces\UserShowResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserShowAction
 * @Route(name="userShow", path="admin/utilisateur")
 */
class UserShowAction implements UserShowActionInterface
{
    private $userRepo;

    /**
     * UserShowAction constructor.
     * @param $userRepo
     */
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function __invoke(UserShowResponderInterface $responder): Response
    {
        $users = $this->userRepo->getAllOnline();

        return $responder->response($users);
    }
}