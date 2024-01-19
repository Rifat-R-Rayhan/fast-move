<?php

namespace App\Http\Controllers;

use App\Models\Calculator;
use App\Models\Delivery;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        
        $search = $request->search;
        $deliveries = Delivery::where ( 'name', 'LIKE', '%' . $search . '%' )
        ->orWhere ( 'phone', 'LIKE', '%' . $search . '%' )
        ->orWhere ( 'address', 'LIKE', '%' . $search . '%' )
        ->orWhere ( 'category_type', 'LIKE', '%' . $search . '%' )
        ->orWhere ( 'invoice', 'LIKE', '%' . $search . '%' )
        ->orWhere ( 'exchange_parcel', 'LIKE', '%' . $search . '%' )
        ->orWhere ( 'is_active', 'LIKE', '%' . $search . '%' )
        ->get();
        // dd($deliveries);
        return view('marchant.pages.delivery-table', compact('deliveries'));
    }

    // public function search(Request $request)
    // {
    //     $searchTerm = $request->input('search');
    //     $deliveries = Delivery::where('id', 'LIKE', "%$searchTerm%")
    //         ->orWhere('name', 'LIKE', "%$searchTerm%")
    //         ->orWhere('phone', 'LIKE', "%$searchTerm%")
    //         ->orWhere('address', 'LIKE', "%$searchTerm%")
    //         ->orWhere('is_active', 'LIKE', "%$searchTerm%")
    //         ->get();

    //     return response()->json($deliveries);
    // }
}
