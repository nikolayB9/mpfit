<?php

namespace App\Http\Controllers;

use App\Enums\Order\StatusEnum;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateStatusRequest;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('order.index', [
            'orders' => Order::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order.create', [
            'products' => Product::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $product = Product::find($data['product_id']);

        $order = Order::create([
            'full_user_name' => $data['full_user_name'],
            'product_id' => $data['product_id'],
            'qty' => $data['qty'],
            'comment' => $data['comment'],
            'product_price' => $product->price,
            'total_price' => $data['qty'] * $product->price,
        ]);
        return redirect()->route('orders.edit', $order->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('order.edit', [
            'order' => $order,
            'statuses' => StatusEnum::asSelectArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(UpdateStatusRequest $request, Order $order)
    {
        $order->update([
           'status' => $request->validated('status'),
        ]);
        return redirect()->route('orders.edit', $order->id)->with('status', 'Статус обновлен');
    }
}
