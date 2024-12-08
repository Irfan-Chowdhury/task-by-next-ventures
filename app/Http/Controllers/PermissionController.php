<?php

namespace App\Http\Controllers;

use App\Services\PermissionService;
use App\Traits\ResponseTrait;

class PermissionController extends Controller
{
    use ResponseTrait;

    public function __construct(private PermissionService $permissionService) {}

    public function index()
    {
        $data = $this->permissionService->getAllPermissions();

        return $this->sendResponse($data);
    }
}
