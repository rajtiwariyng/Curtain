<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
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

        $inser_data = [
            'appointment_id' => $request->orderappointmentId,
            'franchise_id' => $request->orderfranchisetId,
            'quotation_id' => $request->orderquotationId,
            'payment_mode' => $request->payment_mode,
            'payment_mode_by' => $request->modeofpayment ?? '',
            'paid_amount' => $request->amountpaid,
            'payment_type' => $request->paymenttype,
            'remarks' => $request->paymentnote
        ];

        $order = Order::create($inser_data);

        return response()->json($order, 201);
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
}
