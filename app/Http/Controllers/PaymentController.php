<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PaymentOrder;
use App\Models\Order;

class PaymentController extends Controller
{
    public function create($orderId) {  
        // payment check
        $payment = PaymentOrder::where('Order-ID', $orderId)->first();
        if (isset($payment)) {
            return redirect()->route('payment.notification', ['paymentId' => $payment->{'Payment-ID'}]);
        }

        $order = Order::with(['orderDetails.menu'])->findOrFail($orderId);

        return view('payments.create', compact('order'));
    }

    public function store(Request $request, $orderId) {
        $request->validate([
            'payment_method' => 'in:Cash,Debit,ShopeePay,OVO'
        ]);

        $order = Order::findOrFail($orderId);

        $latestPayment = PaymentOrder::orderBy('Payment-ID', 'DESC')->first('Payment-ID');
        $insertId = $this->getLatestInsertableId(isset($latestPayment) ? $latestPayment->{'Payment-ID'} : null, 'PY');

        $insertData = [
            'Order-ID' => $order->{'Order-ID'},
            'Payment-ID' => $insertId,
            'Customer-ID' => $order->{'Customer-ID'},
            'User-ID' => Auth::user()->{'User-ID'}
        ];

        switch ($request->payment_method) {
            case 'Cash' :
                $insertData['Cash-Payment'] = 'Cash';
                break;
            case 'Debit' :
                $insertData['Debit-Card'] = 'Debit';
                break;
            case 'ShopeePay' :
                $insertData['ShopeePay-OVO'] = 'ShopeePay';
                break;
            case 'OVO' :
                $insertData['ShopeePay-OVO'] = 'OVO';
                break;
        }

        $payment = PaymentOrder::create($insertData);

        return redirect()->route('payment.notification', ['paymentId' => $payment->{'Payment-ID'}]);
    }

    public function notify($paymentId) {  
        $payment = PaymentOrder::with(['order.orderDetails.menu'])->findOrFail($paymentId);

        return view('payments.notification', compact('payment'));
    }
}
