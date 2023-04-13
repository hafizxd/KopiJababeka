<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Menu;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function create() {
        $menus = Menu::orderBy('Menu-ID', 'ASC')->get();
        $customers = Customer::orderBy('created_at', 'desc')->get();

        return view('orders.create', compact('menus', 'customers'));
    }

    public function store(Request $request) {
        // dd($request->toArray());
        if (!isset($request->selectedIds)) {
            throw ValidationException::withMessages([
                'global' => 'Harap isikan minimal 1 data order',
            ]);
        }

        $latestOrder = Order::orderBy('Order-ID', 'DESC')->first('Order-ID');

        $insertId = $this->getLatestInsertableId(isset($latestOrder) ? $latestOrder->{'Order-ID'} : null, 'OD');

        // Map data
        $latestOrderDetail = OrderDetail::orderBy('Order-Detail-ID', 'DESC')->first('Order-Detail-ID');
        $latestOrderId = isset($latestOrderDetail) ? $latestOrderDetail->{'Order-Detail-ID'} : null;

        $insertDetails = [];
        foreach ($request->selectedIds as $key => $id) {
            $menu = Menu::findOrFail($id);

            $detailInsertId = $this->getLatestInsertableId($latestOrderId, 'ODD');
            $latestOrderId = $detailInsertId;

            $insertDetails[$key] = [
                'Order-Detail-ID' => $detailInsertId,
                'Menu-ID' => $id,
                'Quantity' => $request->qtys[$key]
            ];

            if ($menu->{'Product-Type'} == 'Drink') {
                $insertDetails[$key]['Ice-Level'] = $request->ice_level[$key];
                $insertDetails[$key]['Sugar-Level'] = $request->sugar_level[$key];
            }
        }


        $order = Order::create([
            'Order-ID' => $insertId,
            'Customer-ID' => $request->customerId,
            'Date' => date('Y-m-d')
        ]);

        $order->orderDetails()->createMany($insertDetails);

        
        if ($request->payment == 'true') {
            return redirect()->route('payment.create', ['orderId' => $order->{'Order-ID'}]);
        } else {
            return redirect()->back();
        }
    }

    public function productReport() {
        $products = OrderDetail::select('Menu-ID', DB::raw('SUM(Quantity) as SUM_QTY'))->with('menu')->groupBy('Menu-ID')->paginate(10);

        return view('report-products.index', compact('products'));
    }
}
