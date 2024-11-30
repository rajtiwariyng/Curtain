<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Mail\AppointmentSuccessMail;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use App\Models\Franchise;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function index()
{
    // Fetch appointments with status 'Pending'
    $pendingAppointments = Appointment::where('status', 'Appointment Booked')->get();
    
    // Fetch appointments with status 'Assigned'
    $assignedAppointments = Appointment::join('franchises','appointments.franchise_id','=','franchises.id')->join('users','users.id','=','franchises.user_id')->select('appointments.*','users.name as franchise_name')->where('appointments.status', 'Franchise Assigned')->get();
    $franchises=Franchise::orderby('id','desc')->get();
    
    return view('admin.appointments', compact('pendingAppointments', 'assignedAppointments','franchises'));
}
    public function store(Request $request)
    {
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


        $validatedData['status'] = 'Appointment Booked';
        $validatedData['status'] = 'Appointment Booked';
    
        $appointment = Appointment::create($validatedData);
    
        // Send success email
        Mail::to($appointment->email)->send(new AppointmentSuccessMail($appointment));
    
        return response()->json(['message' => 'Appointment created successfully!'], 201);
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


}
