<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Marchant;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class DeliveryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $deliveries = Delivery::where('user_id', '=', $id)->get();
        return view('marchant.pages.delivery-table', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $id = Auth::id();
        $uuid = Uuid::uuid4()->toString();
        $uuid = str_replace("-", "", $uuid);
        $firstFiveChars = substr($uuid, 0, 5);
        $numericValue = hexdec($firstFiveChars);
        return view('marchant.pages.delivery-create', compact('id','numericValue'));
    }

    public function store(Request $request)
    {
       
       
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'divisions' => 'required|string',
            'district' => 'required|string',
            'police_station' => 'required|string',
            'category_type' => 'required|string',
            'delivery_type' => 'required|string',
            'cod_amount' => 'required|numeric',
            'invoice' => 'required|string',
            'note' => 'required|string',
            'weight' => 'required|string',
            'exchange_parcel' => 'required',
        ]);
        $delivery = new Delivery($request->all());
        $delivery->save();

        return redirect()->route('delivery.index')->with('success', 'Delivery created successfully.');
    }
    public function show(Delivery $delivery)
    {
        return view('marchant.pages.delivery-show', compact('delivery'));
    }

    public function edit(Delivery $delivery)
    {
        return view('marchant.pages.delivery-edit', compact('delivery'));
    }

    public function update(Request $request, Delivery $delivery)
    {
        $delivery->update($request->all());
        return redirect('delivery')->withSuccess('Update successfully.');
    }

    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return redirect('delivery')->withSuccess('Delete successfully.');
    }
}
