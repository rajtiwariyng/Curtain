<?php

namespace App\Http\Controllers;
use App\Models\FranchiseTemp;
use Illuminate\Http\Request;
use App\Mail\FranchiseInformationMail;
use App\Mail\FranchiseRegistrationMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\MasterCity;
use App\Models\Franchise;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class FranchiseTempController extends Controller

{
    public function store(Request $request)
    {
        $rules = [
            // 'company_name' => 'required|string|max:255',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email',
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
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors());
        }

        try {
            $data = FranchiseTemp::create($request->all());
            if (!empty($request->email)) {
                // Mail::to($request->email)->send(new FranchiseInformationMail($request->all()));
            }

            return redirect()->back()->with('success', 'Franchise information saved successfully!');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Something Went Wrong!');

        }

    }


    public function store_admin(Request $request)
    {
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

        $data = FranchiseTemp::create($request->all());

        $mail = Mail::to($request->email)->send(new FranchiseInformationMail($request->all()));

        return redirect()->back()->with('success', 'Franchise created successfully.');
    }

    public function index()
    {
        $franchiseTemps = FranchiseTemp::whereIn('status', ['pending', 'reject'])
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy('status');

        $franchises = Franchise::with('user')->get();

        return view('admin.franchise.approval', [
            'franchiseTempsPending' => $franchiseTemps->get('pending', collect()),
            'franchiseTempsReject' => $franchiseTemps->get('reject', collect()),
            'franchises' => $franchises,
        ]);
    }

    public function generateSecurePassword($length = 8)
    {
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

    public function approve_old($id)
    {
        $franchiseTemp = FranchiseTemp::findOrFail($id);

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

        $data = array(

            "name" => $franchiseTemp->name,

            "username" => $franchiseTemp->email,

            "password" => $password

        );

        $mail = Mail::to($franchiseTemp->email)->send(new FranchiseRegistrationMail($data));



        return redirect()->back()->with('success', 'Franchise approved and user created successfully.');

    }



    public function approve($id)

    {

        $franchiseTemp = FranchiseTemp::findOrFail($id);
        // Check if the email already exists in the 'users' table
        $existingUser = User::where('email', $franchiseTemp->email)->first();
        if ($existingUser) {

            // If the email exists, you can either skip or handle the logic here

            // Optionally, you can return an error or update the existing user

            return redirect()->back()->with('error', 'A user with this email already exists.');

        }



        $password = $this->generateSecurePassword(8);



        // Create a new user based on the franchise temp details

        $user = User::create([

            'name' => $franchiseTemp->name,

            'email' => $franchiseTemp->email,

            'password' => Hash::make($password), // Use a secure method for passwords

        ]);



        // Assign franchise role to the user

        $user->assignRole('Franchise');



        // Save additional franchise data

        Franchise::create([

            'user_id' => $user->id,

            'franchise_id' => 'FAR0001',

            'company_name' => $franchiseTemp->company_name ?? '',

            'address' => $franchiseTemp->address,

            'pincode' => $franchiseTemp->pincode,

            'city' => $franchiseTemp->city,

            'state' => $franchiseTemp->state,

            'country' => $franchiseTemp->country,

            'mobile' => $franchiseTemp->mobile,

        ]);



        // Optionally, delete or mark the franchise temp record as approved

        $franchiseTemp->delete();



        // Send email notification

        $data = [

            "name" => $franchiseTemp->name,

            "username" => $franchiseTemp->email,

            "password" => $password

        ];

        Mail::to($franchiseTemp->email)->send(new FranchiseRegistrationMail($data));



        return redirect()->back()->with('success', 'Franchise approved and user created successfully.');

    }



    public function reject($id)

    {

        $franchiseTemp = FranchiseTemp::findOrFail($id);



        // Update the status to 'reject'

        $franchiseTemp->status = 'reject';



        // Save the changes

        $franchiseTemp->save();





        return redirect()->back()->with('success', 'Franchise rejected successfully.');

    }



    public function getFranchiseDetails($id,$type)

    {

        if($type == 'confirm'){

            $franchise = Franchise::with('user')->find($id);



        }else{



            $franchise = FranchiseTemp::find($id);

        }



        if ($franchise) {

            return response()->json([

                'status' => 'success',

                'data' => $franchise

            ]);

        } else {

            return response()->json([

                'status' => 'error',

                'message' => 'Franchise not found'

            ]);

        }

    }

public function frontend_view(){
        // Retrieve all cities from the database
        $cityStateData = MasterCity::all();

        // Group cities by state
        $groupedCityStateData = $cityStateData->groupBy('state_name'); // Assuming 'state_name' and 'city_name' are columns in the table

        return view('frontend.franchise_reg', compact('groupedCityStateData'));
    }

}

