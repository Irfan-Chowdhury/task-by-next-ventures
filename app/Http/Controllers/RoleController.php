<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\RoleStoreRequest;
use App\Http\Requests\Role\RoleUpdateRequest;
use App\Services\RoleService;
use App\Traits\ResponseTrait;
use Exception;

class RoleController extends Controller
{
    use ResponseTrait;
    
    public function __construct(private RoleService $roleService){}

    public function index()
    {
        $data = $this->roleService->getAllRoles();

        return $this->sendResponse($data);
    }

    public function store(RoleStoreRequest $request)
    {
        try {
            $data = $this->roleService->createRole($request->validated());

            return $this->sendResponse($data,'Data Saved Successfully');

        } catch (Exception $e) {

            return $this->sendError($e->getMessage());
        }
    }

    public function show(int $id)
    {
        try {

            $show = $this->roleService->showRole($id);

            return $this->sendResponse($show);

        } catch (Exception $e) {

            return $this->sendError($e->getMessage());
        }
    }

    public function update(int $id, RoleUpdateRequest $request)
    {
        try {

            $data = $this->roleService->updateRole($id, $request->validated());

            return $this->sendResponse($data, 'Data Updated Successfully');

        } catch (Exception $e) {

            return $this->sendError($e->getMessage());
        }

    }

    public function destroy(int $id)
    {
        try {

            $this->roleService->deleteRole($id);

            return $this->sendResponse( [],'Data Deleted Successfully');

        } catch (Exception $e) {

            return $this->sendError($e->getMessage());
        }
    }
}