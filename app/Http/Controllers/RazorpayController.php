<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceGeneratedMail;
use App\Models\Appointment;
use App\Models\Order;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Validator;

class RazorpayController extends Controller
{
    private function generateNextCode($lastCode, $prefix)
    {
        if (!$lastCode) {
            return $prefix . "00001";
        }
        $numberPart = (int) substr($lastCode, strlen($prefix));
        $nextNumber = str_pad($numberPart + 1, 6, "0", STR_PAD_LEFT);
        return $prefix . $nextNumber;
    }

    public function createOrder(Request $request,$appointment_id=NULL)
    {
        //print_r($request->all()); exit;
        
        //$api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
        $api = new Api('rzp_test_IX6EFCqGoyCt59', 'DlyvBZWmJuigIHM81VpCwKvw'); // Static test credentials

		 
        $rules = [
            // 'company_name' => 'required|string|max:255',
            "payment_mode" => "required",
            //"paid_amount" => "required",
            "payment_type" => "required"
        ];

        $messages = [
            "payment_mode.required" => "Please Select Payment Mode",
            //"paid_amount.required"  => "Please Enter Paid Amount",
            "payment_type.required" => "Please Select Payment Type"
        ];

        // Perform validation
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with("errors", $validator->errors());
        }

        $orderData = [
            'receipt'         => '123',
            'amount'          => $request['order_value'], // Razorpay takes amount in paise (1 INR = 100 paise)
            'currency'        => 'INR',
            'payment_capture' => 1, // Automatically capture payment
        ];

    
        try {
            // Create the order
			
            $order = $api->order->create($orderData);
            // print_r($order);die;  
            $lastAppointmentId = Order::max("txn_id");
            $nextAppointmentId = $this->generateNextCode($lastAppointmentId, "TXN");
            $request["txn_id"] = $nextAppointmentId;

            $data = Order::create($request->all());

            if ($data) {
                $update_array = ['status' => "4"];

                $update_quotation = ['status' => '1'];

                $appointment = Appointment::findOrFail($data['appointment_id']);
                //dd($appointment);
                $appointment->update($update_array);

                $quotations = Quotation::where('appointment_id', $data['appointment_id'])->where('id',$request->quotation_id);
                $quotations->update($update_quotation);
            }
           Mail::to($appointment->email)->send(
                new InvoiceGeneratedMail($appointment)
            ); 

            return response()->json(['order' => $order]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    // Handle the payment success
    public function paymentSuccess(Request $request)
    {
        // Verify the payment signature
        $attributes = [
            'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature' => $request->razorpay_signature
        ];

        //$api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
        $api = new Api('rzp_test_IX6EFCqGoyCt59', 'DlyvBZWmJuigIHM81VpCwKvw'); // Static test credentials

        $order = $api->order->fetch($request->razorpay_order_id);

        try {
            $api->utility->verifyPaymentSignature($attributes);
            // return redirect()
            //     ->back()
            //     ->with("success", "Order Placed Successfully!");
            return response()->json(['status' => 'Payment successful']);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with("success", "Payment verification failed!");
            // return response()->json(['error' => 'Payment verification failed']);
        }
    }

    // Handle the payment failure
    public function paymentFail()
    {
        return response()->json(['status' => 'Payment failed']);
    }
}
