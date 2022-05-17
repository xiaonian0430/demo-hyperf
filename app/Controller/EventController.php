<?php

declare(strict_types=1);
/**
 * 事件
 */
namespace App\Controller;
use App\Service\UserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
class EventController extends AbstractController
{
    #[Inject]
    protected UserService $userService;

    public function index(RequestInterface $request)
    {
        $user = $request->input('user', 'Hyperf');
        $method = $request->getMethod();
        $result=$this->userService->register();
        return [
            'method' => $method,
            'result' => $result,
            'message' => "Hello {$user}.",
        ];
    }
}
