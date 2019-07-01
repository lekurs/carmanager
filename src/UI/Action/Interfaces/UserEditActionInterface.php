<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\UserEditFormHandlerInterface;
use App\Domain\Repository\Interfaces\UserRepositoryInterface;
use App\UI\Responder\Interfaces\UserEditResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface UserEditActionInterface
{
    /**
     * UserEditActionInterface constructor.
     *
     * @param UserRepositoryInterface $userRepo
     * @param FormFactoryInterface $formFactory
     * @param UserEditFormHandlerInterface $userEditHandler
     */
    public function __construct(
        UserRepositoryInterface $userRepo,
        FormFactoryInterface $formFactory,
        UserEditFormHandlerInterface $userEditHandler
    );

    /**
     * @param Request $request
     * @param UserEditResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, UserEditResponderInterface $responder): Response;
}
