<?php
// UserController.php

namespace App\Action;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use \Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class UserController
{
    private UserRepository $userRepository;

    public function __construct(ContainerInterface $c)
    {
        $this->userRepository = $c->get(EntityManager::class)->getRepository('App\Domain\User');
    }

    public function index(Request $request, Response $response): Response
    {
        $view = Twig::fromRequest($request);
        $users = $this->userRepository->getAllUsers();

        if ($request->hasHeader('HX-Request')) {
            return $view->render($response, 'partial/users.twig', ['users' => $users]);
        } else {
            return $view->render($response, 'full/users.twig', ['users' => $users]);
        }
    }
}
