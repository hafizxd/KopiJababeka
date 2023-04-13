<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::orderBy('created_at', 'desc')->paginate(10);

        return view('customers.index', compact('customers'));
    }

    public function store(Request $request) {
        $request->validate([
            'customer_id' => 'required',
            'customer_name' => 'required',
            'customer_phone' => 'nullable|numeric'
        ]);

        $custExists = Customer::where('Customer-ID', $request->customer_id)->exists();
        if ($custExists) {
            throw ValidationException::withMessages([
                'customer_id' => 'Customer ID sudah ada',
            ]);
        }

        Customer::create([
            'Customer-ID' => $request->customer_id,
            'Customer-Name' => $request->customer_name,
            'Customer-Address' => $request->customer_address,
            'Customer-Phone' => $request->customer_phone,
        ]);

        return redirect()->back();
    }

    public function edit($id) {
        $custDetail = Customer::findOrFail($id);
        $customers = Customer::orderBy('created_at', 'desc')->paginate(10);

        return view('customers.edit', compact('custDetail', 'customers'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'nullable|numeric'
        ]);

        $customer = Customer::findOrFail($id);

        $customer->update([
            'Customer-Name' => $request->customer_name,
            'Customer-Address' => $request->customer_address,
            'Customer-Phone' => $request->customer_phone,
        ]);

        return redirect()->back();
    }

    public function delete($id) {
        Customer::findOrFail($id)->delete();

        return redirect()->route('customer.index');
    }
}
