<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountDeletionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'password.confirm']);
    }

    public function index(){
        return view('client.auth.account-delete');
    }

    public function destroy(){
        auth()->user()->delete();
        return redirect()->route('register');
    }
}
