<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Services\UserService;
use App\Traits\ResponseTrait;
use Exception;

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
        $data = $this->userService->getAllUsers();

        return $this->sendResponse($data);
    }

    public function store(UserStoreRequest $request)
    {

        try {
            $data = $this->userService->createUser($request->validated());

            return $this->sendResponse($data, 'Data Saved Successfully');

        } catch (Exception $e) {

            return $this->sendError($e->getMessage());
        }
    }

    public function show(int $userId)
    {
        try {

            $show = $this->userService->showUser($userId);

            return $this->sendResponse($show);

        } catch (Exception $e) {

            return $this->sendError($e->getMessage());
        }
    }

    public function update(int $userId, UserUpdateRequest $request)
    {
        try {

            $data = $this->userService->updateUser($userId, $request->validated());

            return $this->sendResponse($data, 'Data Updated Successfully');

        } catch (Exception $e) {

            return $this->sendError($e->getMessage());
        }
    }

    public function destroy(int $userId)
    {
        try {

            $this->userService->deleteUser($userId);

            return $this->sendResponse([], 'Data Deleted Successfully');

        } catch (Exception $e) {

            return $this->sendError($e->getMessage());
        }
    }
}
