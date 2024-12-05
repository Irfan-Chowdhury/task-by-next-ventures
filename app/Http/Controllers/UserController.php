<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class UserController extends Controller
{
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
