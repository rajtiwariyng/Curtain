<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Franchise;
use App\Models\Product;
use App\Models\Appointment;
use App\Models\User;
use App\Models\ZipCode;


class AdminController extends Controller
{
    public function dashboard(Request $request){
        $franchise=Franchise::all();
        $product=Product::all();
        $appointment = Appointment::where('status', 'Appointment Booked');

        if ($request->has('dateFilter')) {
            $appointment->whereDate('created_at', $request->dateFilter);
        }

        $appointment = $appointment->get();
        $user=User::all();
        return view('admin.dashboard',compact('franchise','product','appointment','user'));
    }

    public function getLocationByPincode(Request $request)
    {
        $pincode = $request->input('pincode');
        $data = ZipCode::where('zip_code', $pincode)->first();
        if ($data) {
            // Assuming the 'location' is a field you want to return
            return response()->json(['status'=> 'true','location_data' => $data,'message' => 'success']);
        }else{
            return response()->json(['status'=> 'false','location_data' => '','message' => 'failed']);
        }
    }
}
