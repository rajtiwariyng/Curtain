<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\ZipCode;
use App\Mail\AppointmentSuccessMail;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use App\Models\Franchise;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Unique;

class AppointmentController extends Controller
{
    public function index()
    {
        // Fetch appointments with status 'Pending'
        $appointments = Appointment::where('status', '!=', 'Query Booked')->get();
        
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
        
        return view('admin.appointments', compact('appointments','pendingCount','assignedCount','completedCount','rejectedCount', 'assignedAppointments','franchises'));
    }

   public function querybooked()
    {
        // Fetch appointments with status 'Pending'
        $appointments = Appointment::where('status', '=', 'Query Booked')->get();
        
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
        
        return view('admin.query-booked', compact('appointments','pendingCount','assignedCount','completedCount','rejectedCount', 'assignedAppointments','franchises'));
    }

    public function getAppointmentData(Request $request)
    {
        // Retrieve the 'status' input from the request, default to 'pending' if not set
        $status = $request->input('status', 'pending');

        // Use a switch-case for better readability and easier status mapping
        switch ($status) {
            case 'pending':
                $status = 'Appointment Booked';
                break;
            case 'assign':
                $status = 'Franchise Assigned';
                break;
            case 'complete':
                $status = 'Franchise Completed';
                break;
            case 'rejected':
                $status = 'Franchise Rejected';
                break;
            default:
                $status = 'Appointment Booked';
                break;
        }

        // Fetch appointments based on the mapped status
        $franchises = Appointment::where('status','=', $status)->get();

        // Return the data as JSON response
        return response()->json(['data' => $franchises]);
    }

    public function store(Request $request)
    {
        $zipCodes = ZipCode::pluck('zip_code')->toArray();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required|digits_between:10,15',
            'address' => 'required|string|max:255',
            'pincode' => 'required|digits:6',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
        ]);

        if (in_array($validatedData['pincode'], $zipCodes)) {
            $validatedData['status'] = 'Appointment Booked';
            $responseMessage = 'Appointment created successfully!';
        } else {
            $validatedData['status'] = 'Query Booked';
            $responseMessage = 'Query created successfully!';
        }
        $validatedData['uniqueid'] = 'APNT'. '_'. rand(1000, 9999);
        $validatedData['franchise_id'] = 'APNT'.rand(1000,9999);
    
        $appointment = Appointment::create($validatedData);
    
        // Send success email
        Mail::to($appointment->email)->send(new AppointmentSuccessMail($appointment));
    
        return response()->json(['message' => $responseMessage], 201);
    }

    public function assign(Request $request)
{
    // Validate the input fields
    $request->validate([
        'appointment_id' => 'required|exists:appointments,id',
        'franchise_id' => 'required|exists:franchises,id',
    ]);

    // Find the appointment by ID
    $appointment = Appointment::findOrFail($request->appointment_id);

    // Convert the date to a Carbon instance (if it's not already)
    $appointment->appointment_date = Carbon::parse($request->dateFilter); // Convert the string to Carbon

    // Update the franchise and status
    $appointment->franchise_id = $request->franchise_id;
    $appointment->status = 'Franchise Assigned';  // Update the status

    // Save the appointment
    $appointment->save();

    // Send the success email
    Mail::to($appointment->email)->send(new AppointmentSuccessMail($appointment));

    // Redirect back with success message
    return redirect()->back()->with('success', 'Franchise assigned successfully.');
}

public function getAppointmentDetails($id, $type)
{
    // Fetch the appointment by ID
    $appointment = Appointment::findOrFail($id);

    // Use a switch-case for better readability and easier status mapping
    switch ($type) {
        case 'pending':
            $status = 'Appointment Booked';
            break;
        case 'assign':
            $status = 'Franchise Assigned';
            break;
        case 'complete':
            $status = 'Franchise Completed';
            break;
        case 'reject':
            $status = 'Franchise Rejected';
            break;
        default:
            $status = 'Appointment Booked';  // Default status
            break;
    }

    // Check if the appointment's status matches the type passed
    if ($appointment && $appointment->status == $status) {
        return response()->json([
            'status' => 'success',
            'data' => $appointment,
            'message' => 'Appointment details fetched successfully.'
        ]);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'Appointment not found or status mismatch.'
        ]);
    }
}

public function reject($id)
    {
        $appointData = Appointment::findOrFail($id);

        // Update the status to 'reject'
        $appointData->status = 'Franchise Rejected';

        // Save the changes
        $appointData->save();
       

        return redirect()->back()->with('success', 'Appointment rejected successfully.');
    }


}
