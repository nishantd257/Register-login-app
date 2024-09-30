<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function checkEmail(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();
        return response()->json(!$emailExists);
    }
}
