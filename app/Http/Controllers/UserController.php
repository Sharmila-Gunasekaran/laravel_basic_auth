<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    // Admin-only page (used to demonstrate the 403 page for product managers)
    public function index(): View
    {
        return view('users.index', ['users' => User::orderBy('name')->get()]);
    }
}