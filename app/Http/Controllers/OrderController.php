<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->get();
        $customers = Customer::latest()->get();

        return view('Backend.order.order_page', [
            'orders' => $orders,
            'customers' => $customers,
            'products' => Product::latest()->get()
        ]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::latest()->get();
        $customers = Customer::latest()->get();
        return view('Backend.order.order_add', [
            'orders' => $orders,
            'customers' => $customers,
            'products' => Product::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'customer_id' => 'required',
            'product_id' => 'required',
            'qty' => 'required'
        ]);

        Order::create($validateData);

        return redirect('/order')->with('success', 'Order succesfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = Order::find($id);
        $customers = Customer::latest()->get();
        return view('Backend.order.order_update', [
            'orders' => $orders,
            'customers' => $customers,
            'products' => Product::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'qty' => 'required',
        ]);

        Order::where('id', $id)->update($validateData);

        return redirect('/order')->with('success', 'Order berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect('/order')->with('success', 'Order berhasil dihapus!');
    }
}
