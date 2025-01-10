<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userRole = Auth::user()->getRoleNames()[0];
        $user = Auth::user();
       
        $orders = collect(); 
        $ordersQuery = new Order;
        $orders = $ordersQuery->get();

        // dd($orders);
        $statusCounts = $orders->groupBy("status")->map->count();

        // Access counts for all statuses
        $pendingCount = $statusCounts->get("0", 0);
        $completedCount = $statusCounts->get("1", 0);
        


        $franchises = Order::orderBy("id", "desc")->get();

        return view(
            "admin.order.index",
            compact(
                "orders",
                "pendingCount",
                "completedCount"
            )
        );
    }

    public function getOrdersData(Request $request)
    {
        // Define status mapping
        $statusMap = [
            "pending" => "0",
            "complete" => "1"
        ];

        // Retrieve the 'status' input from the request, default to 'pending' if not set
        $status = $request->input("status", "0");

        // Get the mapped status from the $statusMap array or fallback to 1
        $status = $statusMap[$status] ?? "0";
        
        $userRole = Auth::user()->getRoleNames()[0];

            // Fetch Franchise-specific appointments
            $statusMap = [
                "pending" => "0",
                "complete" => "1"
            ];

            $status = $request->input("status");

            $status = $statusMap[$status] ?? "0";


            $orders = Order::with('appointment','franchise','quotation_data')
                ->where("status", $status)
                ->orderBy('created_at','desc')
                ->get()
                ->toArray();


            // Return the data as a JSON response
            return response()->json([
                "data" => $orders,
                "role" => Auth::user()->getRoleNames()[0] ?? "",
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return a view for creating an order (if applicable)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            // 'company_name' => 'required|string|max:255',
            "payment_mode" => "required",
            "paid_amount" => "required",
            "payment_type" => "required"
        ];

        $messages = [
            "payment_mode.required" => "Please Select Payment Mode",
            "paid_amount.required" => "Please Enter Paid Amount",
            "payment_type.required" => "Please Select Payment Type"
        ];

        // Perform validation
        $validator = Validator::make($request->all(), $rules, $messages);
        // dd($request->all());
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with("errors", $validator->errors());
        }

        try {
            $data = Order::create($request->all());

            if ($data) {
                $update_array = ['status' => "4"];

                $appointment = Appointment::findOrFail($data['appointment_id']);
                $appointment->update($update_array);
            }
            // if (!empty($request->email)) {
            //      Mail::to($request->email)->send(new Order($request->all()));
            // }

            return redirect()
                ->back()
                ->with("success", "Order Saved Successfully!");
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with("errors", "Something Went Wrong!");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return response()->json($order);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        // Return a view for editing the order (if applicable)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'appointment_id' => 'nullable|integer',
            'franchise_id' => 'nullable|integer',
            'quotation_id' => 'nullable|integer',
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'pincode' => 'required|string|max:10',
            'installation_date' => 'nullable|date',
        ]);

        $order->update($validatedData);

        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully.']);
    }


    public function getOrdersDetails($id, $type)
    {
        // Fetch the appointment by ID
        $order_data = Order::findOrFail($id);

        // Use a switch-case for better readability and easier status mapping
        switch ($type) {
            case "pending":
                $status = 0;
                break;
            case "complete":
                $status = 1;
                break;
            default:
                $status = 0; // Default status
                break;
        }

        // Check if the appointment's status matches the type passed
        if ($order_data && $order_data->status == $status) {
            return response()->json([
                "status" => "success",
                "data" => $order_data,
                "message" => "Orders details fetched successfully.",
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Orders not found or status mismatch.",
            ]);
        }
    }

}
