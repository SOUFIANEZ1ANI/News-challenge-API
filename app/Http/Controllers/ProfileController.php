<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfileResource;

class ProfileController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        return new ProfileResource($user);
    }
}
