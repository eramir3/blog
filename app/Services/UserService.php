<?php

namespace App\Services;

use App\Models\User;
use App\Utils\Utils;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function findById(int $id) : User
    {
        $user = User::findOrFail($id);
        return $user;
    }
}