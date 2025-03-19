<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('customer.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('customer.orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'total_amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        Order::create([
            'order_number' => 'ORD-' . Str::random(8),
            'total_amount' => $request->total_amount,
            'status' => 'pending',
            'notes' => $request->notes,
        ]);

        return redirect()->route('customer.orders.index')
            ->with('success', 'Order created successfully');
    }

    public function show(Order $order)
    {
        return view('customer.orders.show', compact('order'));
    }
}
