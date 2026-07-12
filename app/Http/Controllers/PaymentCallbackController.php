<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentCallbackController extends Controller
{
    public function receive(Request $request)
    {
        $serverKey = config('services.midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // Extract real order_id since we appended time (e.g., PG-1-163234234)
        $orderIdParts = explode('-', $request->order_id);
        $realOrderId = $orderIdParts[1];

        $order = Order::find($realOrderId);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
            $order->update(['status' => 'processing']);
        } elseif ($request->transaction_status == 'cancel' || $request->transaction_status == 'deny' || $request->transaction_status == 'expire') {
            $order->update(['status' => 'cancelled']);
        }

        return response()->json(['message' => 'Callback handled']);
    }
}
