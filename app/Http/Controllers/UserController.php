<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(Request $request)
    {
        return User::query()
            ->paginate(10000)->withQueryString();
    }
}
