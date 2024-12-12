<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Franchise;
use App\Models\Quotation;
use App\Models\QuotationItem;
use Illuminate\Http\Request;

class QuotationController extends Controller
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
        
        return view('admin.quotation.index', compact('appointments','pendingCount','assignedCount','completedCount','rejectedCount', 'assignedAppointments','franchises'));
    }

    public function create()
    {   
        return view("admin.quotation.create");
    }

    public function store(Request $request)
    {
        // $lastTallyCode = Product::max("tally_code");
        // $lastDesignSKU = Product::max("design_sku");
        // $nextTallyCode = $this->generateNextCode($lastTallyCode, "CAB");
        // $nextDesignSKU = $this->generateNextCode($lastDesignSKU, "SKU");
        // Validate the incoming request data

        // $request->validate([
        //     "product_name" => "required|string|max:255",
        //     "file_number" => "required|string|unique:products,file_number",
        //     "supplier_name" => "required|integer",
        //     "supplier_collection" => "required|integer",
        //     "supplier_collection_design" => "required|integer",
        //     "rubs_martendale" => "nullable|string|max:255",
        //     "width" => "nullable|string|max:255",
        //     "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        //     "image_alt" => "required|string|max:255",
        //     "colour" => "required|array|min:1",
        //     "colour.*" => "string|max:255",
        //     "composition" => "required|array|min:1",
        //     "composition.*" => "string|max:255",
        //     "design_type" => "required|array|min:1",
        //     "design_type.*" => "string|max:255",
        //     "usage" => "required|array|min:1",
        //     "usage.*" => "string|max:255",
        //     "type" => "required|array|min:1",
        //     "type.*" => "string|max:255",
        //     "note" => "nullable|string|max:255",
        //     "supplier_price" => "required|numeric|min:0",
        //     "freight" => "required|numeric|min:0",
        //     "profit_percentage" => "required|numeric|min:0",
        //     "gst_percentage" => "required|numeric|min:0",
        //     "mrp" => "required|numeric|min:0",
        // ]);

        // Handle the image upload

        // $imagePath = null;

        // if ($request->hasFile("image")) {
        //     $imagePath = $request->file("image")->store("products", "public");
        // }

        // Prepare the data for insertion

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'number' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'quot_for' => 'nullable|string',
            'cartage' => 'nullable|string',
            'section_name' => 'nullable|string',
            'item_height' => 'required|array',
            'item_width' => 'required|array',
            'item_qty' => 'required|array',
            'item_unit' => 'required|array',
            'item_price' => 'required|array',
            'item_discount' => 'required|array',
        ]);
    
        // Prepare the quotation data
        $arrayForInsert = [
            'name' => $request->name ?? '',
            'email' => $request->email ?? '',
            'number' => $request->number ?? '',
            'address' => $request->address ?? '',
            'quot_for' => $request->quot_for ?? '',
            'cartage' => $request->cartage ?? '',
            'section_name' => $request->section_name ?? '',
            'date' => date('Y-m-d'),  // using Y-m-d format
            'created_at' => now(),
            'updated_at' => now(),
        ];
    
        // Create the quotation and get the quotation ID
        $quotation = Quotation::create($arrayForInsert);
    
        // Prepare the item data based on the arrays from the form
        $items = [];
        $itemCount = count($request->item_height); // Assuming all arrays have the same count
    
        for ($i = 0; $i < $itemCount; $i++) {
            $items[] = [
                'quotation_id' => $quotation->id,  // Associate with the created quotation
                'height' => $request->item_height[$i],
                'width' => $request->item_width[$i],
                'qty' => $request->item_qty[$i],
                'unit' => $request->item_unit[$i],
                'price' => $request->item_price[$i],
                'discount' => $request->item_discount[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
    
        // Insert all items into the database at once
        QuotationItem::insert($items);
        return redirect()
            ->route("products.index")
            ->with("success", "Quotation created successfully!");
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
}
