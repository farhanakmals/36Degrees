<?php

namespace App\Http\Controllers\DivisionHead;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DivisionEmployeeController extends Controller
{
    public function index()
    {
        $userPosition = Auth::user()->position;
        $data = User::whereNot('role', 'admin')->where('position', $userPosition)->get();

        return view('division_head.employer', compact('data'));
    }
}
