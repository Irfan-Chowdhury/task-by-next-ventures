<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Traits\ResponseTrait;

class UserController extends Controller
{
    use ResponseTrait;

    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $data  = $this->userService->getAllData();

        return $this->sendResponse($data);
    }
}
