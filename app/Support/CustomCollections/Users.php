<?php

namespace App\Support\CustomCollections;

use App\Models\User;

class Users extends ClassArray
{
    protected function className(): string
    {
        return User::class;
    }
}
