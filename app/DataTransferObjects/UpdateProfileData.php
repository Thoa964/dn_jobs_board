<?php

namespace App\DataTransferObjects;

use App\Http\Requests\UpdateProfileRequest;
use Spatie\DataTransferObject\DataTransferObject;

class UpdateProfileData extends DataTransferObject
{

    public static function fromRequest(UpdateProfileRequest $request): array {
        return $request->validated();
    }
}
