<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'role_id' => $this->id,
            'role_name' => $this->name,
            'permissions' => $this->whenLoaded('permissions', PermissionResource::collection($this->permissions)),
        ];
    }
}
