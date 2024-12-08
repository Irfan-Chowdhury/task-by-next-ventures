<?php

namespace App\Http\Controllers;

use App\Services\PermissionService;

class PermissionController extends Controller
{
    public function __construct(private PermissionService $permissionService){}

    public function index()
    {
        $data = $this->permissionService->getAllPermissions();

        return $this->sendResponse($data);
    }
}
