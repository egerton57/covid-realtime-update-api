<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
        public function index() {
        $users = User::all();
        return response()->json($users);
    }
}
