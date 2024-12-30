<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Franchise;
use App\Models\ProductType;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Mail\QuotationGeneratedMail;
use App\Models\QuotationSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class QuotationController extends Controller
{
        public function index()
        {
            $user = Auth::user();
            $userRole = $user->getRoleNames()->first();  // Get first role if there are multiple
        
            // Constants for status values
            $statusPending = "0";
            $statusComplete = "1";
        
            // Initialize default query builder for all quotations
            $quotationQuery = Quotation::query();
        
            // If the user is a "Franchise", filter the quotations by franchise_id
            if ($userRole == 'Franchise') {
                $quotationQuery->where('franchise_id', $user->id);
            }
        
            // Retrieve the quotations for the given query
            $quotationList = $quotationQuery->get();
        
            // Initialize new queries for each status count to avoid interference with the main query
            $quotationListPending = Quotation::query()
                ->where('status', $statusPending)
                ->when($userRole == 'Franchise', function ($query) use ($user) {
                    return $query->where('franchise_id', $user->id);
                })
                ->count();
        
            $quotationListComplete = Quotation::query()
                ->where('status', $statusComplete)
                ->when($userRole == 'Franchise', function ($query) use ($user) {
                    return $query->where('franchise_id', $user->id);
                })
                ->count();
        
            // Return view with compacted data
            return view('admin.quotation.index', compact('quotationList', 'quotationListPending', 'quotationListComplete'));
        }

    public function create($appointment_id)
    {   
        $data['appointment_id'] = $appointment_id;
        $data['appointment_data'] = Appointment::where('id',$appointment_id)->first();
        $data['product_type'] = ProductType::distinct('product_type')->get();

        // dd($data['appointment_data']);
        return view("admin.quotation.create", $data);
    }

    public function store(Request $request)
    {
       
        // dd($request->all());
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email',
            'number' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'quot_for' => 'nullable|string',
            'cartage' => 'nullable|string',
            // 'section_name' => 'nullable|string',
            // 'item_height' => 'required|array',
            // 'item_width' => 'required|array',
            // 'item_qty' => 'required|array',
            // 'item_unit' => 'required|array',
            // 'item_price' => 'required|array',
            // 'item_discount' => 'required|array',
        ]);
    
        // Prepare the quotation data
        $arrayForInsert = [
            'appointment_id' => $request->appoint_id ?? '',
            'franchise_id' =>$request->franchise_id,
            'name' => $request->name ?? '',
            'email' => $request->email ?? '',
            'number' => $request->number ?? '',
            'address' => $request->address ?? '',
            'quot_for' => $request->quot_for ?? '',
            'cartage' => $request->cartage ?? '',
            // 'section_name' => $request->section_name ?? '',
            'date' => date('Y-m-d'),  // using Y-m-d format
            'created_at' => now(),
            'updated_at' => now(),
        ];
    
        // Create the quotation and get the quotation ID
        $quotation = Quotation::create($arrayForInsert);
        $newQuotationId = $quotation->id;
    
        // Prepare the item data based on the arrays from the form
        $sections = [];
        $items = [];
        $sectionID = [];

        // Iterate over both section_name and product_item arrays together
        foreach ($request->section_name as $index => $section_name) {
            // Ensure section_name exists
            if (isset($section_name)) {
                // Create section data
                $sections[] = [
                    'quotation_id' => $newQuotationId,  // Associate with the created quotation
                    'section_name' => $section_name,    // Access correct section_name
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                // Loop through the associated product items for this section
                if (isset($request->product_item[$index])) {
                    // Loop through each item in the current section
                    foreach ($request->product_item[$index] as $j => $product_item) {
                        if (isset($request->item_name[$index][$j])) {
                            // Add item data to the items array
                            $items[] = [
                                'quotation_id' => $newQuotationId, // Associate with the created quotation
                                'appointment_id' => $request->appoint_id ?? '',
                                'franchise_id' => $request->franchise_id,
                                'section_order' => $section_name, // Set section ID as the quotation ID temporarily (we'll fix it later)
                                'item_order' => $j + 1,  // Item order (starting from 1)
                                'name' => $request->item_name[$index][$j] ?? '', // Access item name correctly
                                'item' => $product_item ?? '',
                                'height' => $request->item_height[$index][$j] ?? '',
                                'width' => $request->item_width[$index][$j] ?? '',
                                'qty' => $request->item_qty[$index][$j] ?? '',
                                'unit' => $request->item_unit[$index][$j] ?? '',
                                'price' => $request->item_price[$index][$j] ?? '',
                                'discount' => $request->item_discount[$index][$j] ?? '',
                                'created_at' => now(),
                                'updated_at' => now(),
                            ];
                        }
                    }
                }
            }
        }

        // Insert sections first
        $insertedSections = QuotationSection::insert($sections);

        // Now retrieve the section IDs from the inserted sections
        if ($insertedSections) {
            // Retrieve section IDs after inserting
            $sectionID = QuotationSection::where('quotation_id', $newQuotationId)->get(['id', 'section_name']);
            
            // Map the section names to their corresponding IDs
            $sectionIDMap = $sectionID->pluck('id', 'section_name')->toArray();

            // dd($sectionIDMap);
            // Update the section_order for each item based on the correct section ID
            foreach ($items as &$item) {
                $item['section_order'] = $sectionIDMap[$item['section_order']] ?? null; // Set section_order based on section name
            }
        }

        // Insert items in bulk
        if (!empty($items)) {
            QuotationItem::insert($items);
        }

        // Insert all items into the database at once
        

        $appointment = Appointment::findOrFail($request->appoint_id);
        $appointment->status = "3"; // Set the new status value
        $appointment->save(); // Save the changes
        Mail::to($appointment->email)->send(
            new QuotationGeneratedMail($appointment)
        );
        return redirect()
            ->route("quotations.list")
            ->with("success", "Quotation created successfully!");
    }

    public function getQuotationsData(Request $request)
    {
        // Retrieve the 'status' input from the request, default to 'pending' if not set
        $status = $request->input('status', 'pending');

        // Use a switch-case for better readability and easier status mapping
        switch ($status) {
            case 'pending':
                $status = '0';
                break;
            case 'complete':
                $status = '1';
                break;
        }


        // Fetch appointments based on the mapped status
        // $quotations = Quotation::with('franchise')->where('status','=', $status)->get();

        $user = Auth::user();
        $userRole = $user->getRoleNames()->first();  // Get first role if there are multiple
    
        // // Constants for status values
        // $statusPending = "0";
        // $statusComplete = "1";
    
        // Initialize default query builder for all quotations
        $quotationQuery = Quotation::query();
    
        // If the user is a "Franchise", filter the quotations by franchise_id
        if ($userRole == 'Franchise') {
            $quotationQuery->where('franchise_id', $user->id);
        }

        $quotationList = $quotationQuery->with('franchise')->where('status','=', $status)->get();

        // Return the data as JSON response
        return response()->json(['data' => $quotationList]);
    }

    public function getAppointmentDetails($id, $type)
    {
        // Fetch the appointment by ID
        $quotation = Quotation::with('quotaitonItem')->findOrFail($id);

        // Use a switch-case for better readability and easier status mapping
        switch ($type) {
            case 'pending':
                $status = 0;
                break;
            case 'complete':
                $status = 1;
                break;
            default:
                $status = 0;  // Default status
                break;
        }
        
        // Check if the appointment's status matches the type passed
        if ($quotation && $quotation->status == $status) {
            return response()->json([
                'status' => 'success',
                'data' => $quotation,
                'message' => 'Quotations details fetched successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Quotations not found or status mismatch.'
            ]);
        }
    }

    public function deleteQuotationsData($id){
        $appointData = Quotation::findOrFail($id);
    
        // Delete the record
        $appointData->delete();
       

        return redirect()->back()->with('success', 'Quotation deleted successfully.');
    }

    public function downloadQuotationView($appointment_id){
        $qutationsData = QuotationItem::with('franchise','appointment','quotation')->where('quotation_id',$appointment_id)->get();
        // dd($qutationsData);

        return view('admin.quotation.download_quote',compact('qutationsData'));
    }
}
