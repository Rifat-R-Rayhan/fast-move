<?php

namespace App\Http\Controllers\Marchant;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarchantDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(){
        $id = Auth::user()->id;
        $marchant=User::where('id', '=', $id)->get();
        // $marchant = User::all();
        return view('marchant-dashboard', compact('marchant'));
    }

    public function coverageArea(){
        return view('marchant.pages.coverage-area');
    }

    public function pricing(){
        return view('marchant.pages.pricing');
    }

    // public function deliveryConfirmation(Request $request)
    // {
    //     $delivery = Delivery::find($request->id);
    //     $delivery->is_active = 2;
    
    //     $delivery->update();

    //     return redirect('/delivery');
    // }

    // public function deliveryCheckout(Request $request)
    // {
    //     $delivery = Delivery::find($request->id);
    //     $delivery->is_active = 3;
    
    //     $delivery->update();

    //     return redirect('/delivery');
    // }


    // public function cancelConfirmation(Request $request){
    //     $delivery = Delivery::find($request->id);
    //     $delivery->is_active = 'canceled';
    //     $delivery->update();
    //     return redirect('/delivery');
    // }
 
}
