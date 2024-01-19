<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Delivery;
use App\Models\Pickup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

// use Session;

class AdminController extends Controller
{
    public function index()
    {
        $admin = array();
        if (Session::has('loginId')) {
            $admin = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('admin-dashboard', compact('admin'));
    }

    public function create()
    {
        $admin = array();
        if(Session::has('loginId')){
            $admin = Admin::where('id', '=', Session::get('loginId'))->first();
        }
        return view('server.auth.admin-registration', compact('admin'));
    }

    public function store(Request $request)
    {
        Admin::create($request->all());

        $request->validate([
            'admin_name' => 'required',
            'designation' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        return redirect('admin/table')->withSuccess('Admin added successfully.');
    }

    public function loginView()
    {
        return view('server.auth.admin-login');
    }

    function loginCheck(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', '=', $request->email)->where('designation', '=', $request->designation)->first();
        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                $request->session()->put('loginId', $admin->id);
                // Log::channel('adminlogininfo')->info("User {id} successfully login.", ['id' => $admin->id]);
                return redirect('admin/dashboard');
            } else if ($request->password == $admin->password) {
                $request->session()->put('loginId', $admin->id);
                // Log::channel('adminlogininfo')->info("User {id} successfully login.", ['id' => $admin->id]);
                return redirect('admin/dashboard');
            } else {
              
                return back()->with('fail', 'Login details are not valid');
            }
        } else {
            return back()->with('fail', 'Login details are not valid');
        }
    }

    public function table()
    {
        $admins = Admin::paginate(10);
        return view('server.pages.admin-table',  compact('admins'));
    }

    function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('admin/login');
        }
    }

    public function adminEdit(Request $request)
    {
        $id = Session::get('loginId');
        $admin = Admin::where('id', '=', $id)->first();
        // $admin = Admin::find($admin_id)->get(); 
        // dd($admin);
        return view('server.auth.admin-update', ['admin' => $admin]);
    }


    public function adminUpdate(Request $request)
    {
        // dd($request->id);
        $admin = Admin::find($request->id);
        $admin->admin_name = $request->admin_name;
        $admin->designation = $request->designation;
        $admin->phone = $request->phone;
        $admin->email = $request->email;

        $admin->update();
        return redirect('admin/edit')->withSuccess('Admin update successfully.');
    }

    function changePassword()
    {
        return view('server.auth.admin-change-password');
    }

    function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required',

        ]);

        $id = Session::get('loginId');

        $admin = Admin::where('id', '=', $id)->first();
        if (Hash::check($request->old_password, $admin->password)) {
            $admin->password = Hash::make($request->password);
            $admin->update();

            return redirect('admin/change/password')->withSuccess('Update successfully.');
        } else {

            return redirect('admin/change/password')->withSuccess('Old Password Does not Match.');
        };
    }

    public function adminDelete(Request $request)
    {
        $id = Session::get('loginId');
        Admin::where('id', '=', $id)->first()->delete();
        return redirect('admin/login');
    }

    public function pickupConfirmation(Request $request)
    {
        $pickup = Pickup::find($request->id);
        $pickup->is_active = 2;

        $pickup->update();

        return redirect('pickup');
    }

    public function pickupCancelConfirmation(Request $request)
    {
        $pickup = Pickup::find($request->id);
        $pickup->is_active = 3;
        $pickup->update();

        return redirect('pickup');
    }
    public function searchAdmin(Request $request)
    {
        $search = $request->input('search');
        $deliveries = Delivery::whereHas('user', function ($query) use ($search) {
            $query->whereRaw("CONCAT(fname, ' ', lname) LIKE ?", ["%{$search}%"]);
        })
        ->orWhere('phone', 'LIKE', "%{$search}%")
        ->orWhere('address', 'LIKE', "%{$search}%")
        ->orWhere('order_tracking_id', 'LIKE', "%{$search}%")
        ->with(['user' => function ($query) {
            // Select the necessary columns from the users table
            $query->select('id', 'fname', 'lname');
        }])
        ->get(['id', 'name', 'phone', 'address', 'police_station', 'district', 'divisions', 'category_type', 'delivery_type', 'order_tracking_id', 'invoice', 'note', 'is_active', 'user_id']);
        return response()->json(['deliveries' => $deliveries]);
    }


    public function destroy(Request $request){
        Admin::find($request->id)->delete();
        return redirect('admin/table');
    }
    public function searchPickup(Request $request){
        $search = $request->input('search');
        $deliveries = Pickup::whereHas('user', function ($query) use ($search) {
            $query->whereRaw("CONCAT(fname, ' ', lname) LIKE ?", ["%{$search}%"]);
        })
        ->orWhere('phone', 'LIKE', "%{$search}%")
        ->orWhere('address', 'LIKE', "%{$search}%")
        ->orWhere('name', 'LIKE', "%{$search}%")
        ->orWhere('alt_phone', 'LIKE', "%{$search}%")
        ->orWhere('ps', 'LIKE', "%{$search}%")
        ->orWhere('district', 'LIKE', "%{$search}%")
        ->orWhere('divisions', 'LIKE', "%{$search}%")
        ->orWhere('email', 'LIKE', "%{$search}%")
        ->with(['user' => function ($query) {
            // Select the necessary columns from the users table
            $query->select('id', 'fname', 'lname');
        }])
        ->get(['id', 'name', 'phone','ps', 'address', 'alt_phone', 'district', 'divisions','user_id','email']);
        return response()->json(['deliveries' => $deliveries]);
    }

    public function searchMerchant(Request $request){
        $searchTerm = $request->input('search');
        $deliveries = User::where('business_name', 'LIKE', "%$searchTerm%")
        ->orWhere('fname', 'LIKE', "%$searchTerm%")
        ->orWhere('lname', 'LIKE', "%$searchTerm%")
        ->orWhere('pick_up_location', 'LIKE', "%$searchTerm%")
        ->orWhere('phone', 'LIKE', "%$searchTerm%")
        ->orWhere('email', 'LIKE', "%$searchTerm%")
        ->get();
    return response()->json(['deliveries' => $deliveries]);
    }
}
