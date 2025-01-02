<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Franchise;
use App\Models\Product;
use App\Models\Appointment;
use App\Models\Quotation;
use App\Models\User;
use App\Models\ZipCode;


class AdminController extends Controller
{
    public function dashboard(Request $request){
        $franchise=Franchise::all();
        $product=Product::all();
        $appointment = Appointment::where('status', "!=" ,"0");

        if ($request->has('dateFilter')) {
            $appointment->whereDate('created_at', $request->dateFilter);
        }

        $appointment = $appointment->get();


        $quotations = Quotation::with('appointment')->get();
        // dd($quotations);
        $user=User::all();
        return view('admin.dashboard',compact('franchise','product','appointment','user','quotations'));
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

    public function quotation_list()
    {
        // Fetch appointments with status 'Pending'
        $appointments = Appointment::where('status', '!=', "0")->get();
        
        $statusCounts = $appointments->groupBy('status')->map(function ($appointments) {
            return $appointments->count();
        });

        
        // Now you can access the counts like so:
        $pendingCount = $statusCounts->get('Appointment Booked', 0);  // Default to 0 if no 'pending' status found
        $assignedCount = $statusCounts->get('Franchise Assigned', 0);
        $completedCount = $statusCounts->get('Franchise Completed', 0);
        $rejectedCount = $statusCounts->get('Franchise Rejected', 0);

        // Fetch appointments with status 'Assigned'
        $assignedAppointments = Appointment::join('franchises','appointments.franchise_id','=','franchises.id')->join('users','users.id','=','franchises.user_id')->select('appointments.*','users.name as franchise_name')->where('appointments.status', 'Franchise Assigned')->get();
        $franchises=Franchise::orderby('id','desc')->get();
        
        return view('admin.quotations', compact('appointments','pendingCount','assignedCount','completedCount','rejectedCount', 'assignedAppointments','franchises'));
    }

    public function getQuotationsData(Request $request)
    {
        // Retrieve the 'status' input from the request, default to 'pending' if not set
        $status = $request->input('status', 'pending');

        // Use a switch-case for better readability and easier status mapping
        switch ($status) {
            case 'pending':
                $status = 'Appointment Booked';
                break;
            case 'complete':
                $status = 'Franchise Completed';
                break;
            default:
                $status = 'Appointment Booked';
                break;
        }

        // Fetch appointments based on the mapped status
        $quotations = Appointment::where('status','=', $status)->get();

        // Return the data as JSON response
        return response()->json(['data' => $quotations]);
    }

    public function calculator(){
        return view('admin.calculator');
    }
}
