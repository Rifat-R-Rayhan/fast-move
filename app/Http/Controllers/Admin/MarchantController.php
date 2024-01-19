<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MarchantController extends Controller
{
    public function index(){
        if(Session::has('loginId')){
            $admin = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        $users = User::paginate(10);
        return view('server.pages.marchant-table', compact('users','admin'));
    }
}
