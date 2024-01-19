<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Delivery;
use App\Models\Deliverycharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DeliverychargeController extends Controller
{
    public function addDeliveryCharge()
    {
        if(Session::has('loginId')){
            $admin = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('server.pages.calculator-create',compact('admin'));
    }
    public function storeDeliveryCharge(Request $request)
    {
        // dd($request->all());
        Validator::make($request->all(), [
            'from' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'service_regular' => 'required|numeric|min:0',
            'service_same_day' => 'required|numeric|min:0',
            'Pickup' => 'required|string|max:255',
            'Pickup_Drop' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
        ]);
        $deliveryCharge = new Deliverycharge();
        $deliveryCharge->from_location = $request->from;
        $deliveryCharge->destination = $request->destination;
        $deliveryCharge->from_location = $request->from;
        $deliveryCharge->destination = $request->destination;
        if ($request->category === 'Regular') {
            $deliveryCharge->category_regular = $request->category;
        } elseif ($request->category === 'Document') {
            $deliveryCharge->category_document = $request->category;
        } elseif ($request->category === 'Book') {
            $deliveryCharge->category_book = $request->category;
        }

        // $deliveryCharge->category = $request->category;
        $deliveryCharge->regular = $request->service_regular;
        $deliveryCharge->same_day = $request->service_same_day;
        $deliveryCharge->Pickup = $request->Pickup;
        $deliveryCharge->Pickup_Drop = $request->Pickup_Drop;
        $deliveryCharge->weight = $request->weight;
        $deliveryCharge->price = $request->price;
        $deliveryCharge->save();
        return redirect()->back()->with('message', 'Delivery Charge Added Successfully');
    }
    // public function calculate_delivery_charge(Request $request)
    // {
    //     $fromLocation = $request->input('from_location');
    //     $destination = $request->input('destination');
    //     $category = $request->input('category');
    //     $service = $request->input('service');
    //     $weight = $request->input('weight');

    //     $deliveryCharge = DeliveryCharge::where([
    //         'from_location' => $fromLocation,
    //         'destination' => $destination,
    //         'category' => $category,
    //     ])->first();
    //     $finalPrice = $service === '1' ? $deliveryCharge->regular : $deliveryCharge->same_day;
    //     $finalPrice *= $weight;

    //     return response()->json([
    //         'deliveryCharge' => [
    //             'price' => $finalPrice,
    //         ]
    //     ]);
    // }

    public function calculate_delivery_charge(Request $request)
    {
        $fromLocation = $request->input('from_location');
        $destination = $request->input('destination');
        $service = $request->input('service');
        $weight = $request->input('weight');

        // Assuming you have a DeliveryCharge model
        $deliveryCharge = DeliveryCharge::where([
            'from_location' => $fromLocation,
            'destination' => $destination,
        ])->first();

        if ($deliveryCharge) {
            $finalPrice = $service === '1' ? $deliveryCharge->regular : $deliveryCharge->same_day;
            // Add more conditions for other category types if needed
            $finalPrice *= $weight;

            return response()->json([
                'deliveryCharge' => [
                    'price' => $finalPrice,
                ]
            ]);
        } else {
            // Handle the case where the delivery charge is not found
            return response()->json([
                'error' => 'Invalid delivery charge',
            ], 400); // Use appropriate HTTP status code
        }
    }
    public function search(Request $request)
    {
        $trackingId = $request->input('tracking_id');
        $delivery = Delivery::where('order_tracking_id', $trackingId)->first();
        return response()->json(['delivery' => $delivery]);
    }
}
