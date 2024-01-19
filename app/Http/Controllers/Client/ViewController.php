<?php

namespace App\Http\Controllers\Client;
use App\Models\Deliverycharge;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function home(){
        $deliveryCharge = Deliverycharge::all();
        return view('welcome', compact('deliveryCharge'));

    }

    public function tracking(){
        return view('client.pages.tracking');
    }

    public function contact(){
        return view('client.pages.contact');
    }

    public function service(){
        return view('client.pages.service');
    }

    public function about(){
        return view('client.pages.about');
    }
}
