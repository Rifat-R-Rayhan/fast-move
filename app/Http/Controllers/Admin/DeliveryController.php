<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DeliveryController extends Controller
{
    public function index(){
        if(Session::has('loginId')){
            $admin = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        $deliveries = Delivery::paginate(10);
        return view('server.pages.delivery-table', compact('deliveries','admin'));
    }

    public function edit(Request $request){
        // dd($request->id);
        if(Session::has('loginId')){
            $admin = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        $delivery = Delivery::find($request->id);
        return view('server.pages.admin-delivery-edit', compact('delivery','admin'));
    }

    public function update(Request $request){
        // dd($request->all());
        $delivery = Delivery::find($request->id);
        $delivery->name = $request->name;
        $delivery->phone = $request->phone;
        $delivery->address = $request->address;
        $delivery->divisions = $request->divisions;
        $delivery->district = $request->district;
        $delivery->police_station = $request->police_station;
        $delivery->category_type = $request->category_type;
        $delivery->delivery_type = $request->delivery_type;
        $delivery->cod_amount = $request->cod_amount;
        $delivery->district = $request->district;
        $delivery->invoice = $request->invoice;
        $delivery->note = $request->note;
        $delivery->weight = $request->weight;
        $delivery->exchange_parcel = $request->exchange_parcel;

        $delivery->update();
        return redirect('admin/delivery')->withSuccess('Update successfully.');
    }

    public function deliveryConfirmation(Request $request)
    {
        $delivery = Delivery::find($request->id);
        $delivery->is_active = 2;
    
        $delivery->update();

        return redirect('admin/delivery');
    }

    public function deliveryCheckout(Request $request)
    {
        $delivery = Delivery::find($request->id);
        $delivery->is_active = 3;
    
        $delivery->update();

        return redirect('admin/delivery');
    }

    public function deliveryDelivered(Request $request)
    {
        $delivery = Delivery::find($request->id);
        $delivery->is_active = 4;
    
        $delivery->update();

        return redirect('admin/delivery');
    }


    public function cancelConfirmation(Request $request){
        $delivery = Delivery::find($request->id);
        $delivery->is_active = 'cancelled';
        $delivery->update();
        return redirect('admin/delivery');
    }

    public function destroy(Request $request){
        Delivery::find($request->id)->delete();
        return redirect('admin/delivery');
    }
}
