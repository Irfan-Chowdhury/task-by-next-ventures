<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permission\PermissionStoreRequest;
use App\Http\Requests\Permission\PermissionUpdateRequest;
use App\Services\PermissionService;
use Exception;

class PermissionController extends Controller
{
    public function __construct(private PermissionService $permissionService){}

    public function index()
    {
        $data = $this->permissionService->getAllPermissions();

        return $this->sendResponse($data);
    }

    public function store(PermissionStoreRequest $request)
    {
        try {
            $data = $this->permissionService->createPermission($request->validated());

            return $this->sendResponse($data,'Data Saved Successfully');

        } catch (Exception $e) {

            return $this->sendError($e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {

            $show = $this->permissionService->showPermission($id);

            return $this->sendResponse($show);

        } catch (Exception $e) {

            return $this->sendError($e->getMessage());
        }
    }

    public function update(int $id, PermissionUpdateRequest $request)
    {
        try {

            $data = $this->permissionService->updatePermission($id, $request->validated());

            return $this->sendResponse($data, 'Data Updated Successfully');

        } catch (Exception $e) {

            return $this->sendError($e->getMessage());
        }

    }

    public function destroy(int $id)
    {
        try {

            $this->permissionService->deletePermission($id);

            return $this->sendResponse( [],'Data Deleted Successfully');

        } catch (Exception $e) {

            return $this->sendError($e->getMessage());
        }
    }
}
