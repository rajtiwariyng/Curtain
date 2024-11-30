<?php

namespace App\Http\Controllers;

use App\Models\FranchiseTemp;
use Illuminate\Http\Request;
use App\Mail\FranchiseInformationMail;
use App\Mail\FranchiseRegistrationMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Franchise; // Ensure you have a model for the franchise table
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FranchiseTempController extends Controller
{

    public function store(Request $request)
    {
        // dd($request->all()); 
        // Define validation rules
        $rules = [
            // 'company_name' => 'required|string|max:255',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:franchise_temps,email',
            'mobile' => 'nullable|string|max:20',
            'alt_mobile' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'pincode' => 'nullable|integer',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
        ];
    
        // Define custom error messages (optional)
        $messages = [
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'pincode.integer' => 'Pincode must be a number.',
        ];
    
        // Perform validation
        $validator = Validator::make($request->all(), $rules, $messages);
        
        // dd($validator);
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors());
            // Return the validation errors in a JSON response for AJAX
        }
    
        // Proceed with storing the data if validation passes
        try {
            // dd($request->all());
            $data = FranchiseTemp::create($request->all());
    
            // Send email if a valid email is provided
            if (!empty($request->email)) {
                // Mail::to($request->email)->send(new FranchiseInformationMail($request->all()));
            }
            
            return redirect()->back()->with('success', 'Franchise information saved successfully!');
            // Return success response
        } catch (\Exception $e) {
            // Handle exceptions and log errors
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }
    

    public function store_admin(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile' => 'nullable|string|max:20',
            'alt_mobile' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'pincode' => 'nullable|integer',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
        ]);

        // Store the form data in the database
        $data=FranchiseTemp::create($request->all());
        //if($data)
        $mail=Mail::to($request->email)->send(new FranchiseInformationMail($request->all()));
        // echo json_encode($request->all());die;
        // Redirect with a success message
        //if($mail)
        return redirect()->back()->with('success', 'Franchise created successfully.');
    }
    public function index()
    {
        // Fetch franchise temp data
        $franchiseTemps = FranchiseTemp::orderBy('id', 'desc')->get();
        $franchises = Franchise::with('user')->get(); // Eager load the associated user if necessary
        return view('admin.franchise.approval', compact('franchiseTemps','franchises'));
    }
    public function generateSecurePassword($length = 8) {
        // Ensure the length is at least 8
        
    
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?';
    
        // Create the password with at least one of each type
        $password = [
            $uppercase[random_int(0, strlen($uppercase) - 1)],
            $lowercase[random_int(0, strlen($lowercase) - 1)],
            $numbers[random_int(0, strlen($numbers) - 1)],
            $specialChars[random_int(0, strlen($specialChars) - 1)],
        ];
    
        // Fill the rest of the password length with random characters
        $allChars = $uppercase . $lowercase . $numbers . $specialChars;
        for ($i = 4; $i < $length; $i++) {
            $password[] = $allChars[random_int(0, strlen($allChars) - 1)];
        }
    
        // Shuffle the password array to ensure randomness
        shuffle($password);
    
        // Convert the array to a string
        return implode('', $password);
    }
    
    // Example usage
    
    public function approve($id)
    {
        $franchiseTemp = FranchiseTemp::findOrFail($id);
        //echo $franchiseTemp->mobile;die;
        $password = $this->generateSecurePassword(8);
        // Create a new user based on the franchise temp details
        $user = User::create([
            'name' => $franchiseTemp->name,
            'email' => $franchiseTemp->email,
            'password' => Hash::make($password), // Use a secure method for passwords
            // Add any other fields as necessary
        ]);

        // Assign franchise role to the user
        $user->assignRole('Franchise'); // Ensure you have a role management system in place

        // Save additional franchise data
        Franchise::create([
            'user_id' => $user->id,
            'company_name' => $franchiseTemp->company_name,
            'address' => $franchiseTemp->address,
            'pincode' => $franchiseTemp->pincode,
            'city' => $franchiseTemp->city,
            'state' => $franchiseTemp->state,
            'country' => $franchiseTemp->country,
            'mobile' => $franchiseTemp->mobile,
            // Add any other fields as necessary
        ]);

        // Optionally, delete or mark the franchise temp record as approved
        $franchiseTemp->delete();
        $data=array(
            "name"=>$franchiseTemp->name,
            "username"=>$franchiseTemp->email,
            "password"=>$password
        );
        $mail=Mail::to($franchiseTemp->email)->send(new FranchiseRegistrationMail($data));

        return redirect()->back()->with('success', 'Franchise approved and user created successfully.');
    }
}
