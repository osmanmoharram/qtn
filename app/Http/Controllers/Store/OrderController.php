<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Store\Order;
use App\Models\Store\Supplier;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('store_module.orders.index', ['orders' => Order::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $suppliers = Supplier::all()->pluck('name', 'id')->toArray();

        $employees = Employee::all()->pluck('user.name', 'id')->toArray();

        $products = Product::all()->pluck('name', 'id')->toArray();

        return view('store_module.orders.create', compact('suppliers', 'employees', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewOrderRequest $request
     * @return RedirectResponse
     */
    public function store(NewOrderRequest $request)
    {
        $order = Order::create([
            'supplier_id' => $request->supplier_id,
            'employee_id' => $request->employee_id,
            'issued_at' => $request->issued_at,
            'status' => $request->status,
            'payment_receipt' => $request->payment_receipt,
            'tax' => $request->tax
        ]);

        // add products if any
        foreach ($request->products as $product) {
            $order->products()->attach($product['product_id'], ['quantity' => $product['quantity'], 'unit_price' => $product['unit_price']]);
        }

        // upload receipt copy if any
        if($request->hasFile('payment_receipt')) {
            $path = $request->file('payment_receipt')->store('public/img/receipts');

            $order->payment_receipt = $request->file('payment_receipt')->hashName();
            $order->save();
        }

        return redirect()->route('orders.show', [$order])
            ->with('flash_message', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return View
     */
    public function show(Order $order)
    {
        return view('store_module.orders.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return View
     */
    public function edit(Order $order)
    {
        $suppliers = Supplier::all()->pluck('name', 'id')->toArray();

        $employees = Employee::all()->pluck('user.name', 'id')->toArray();

        $products = Product::all()->pluck('name', 'id')->toArray();

        return view('store_module.orders.edit', ['order' => $order, 'suppliers' => $suppliers, 'employees' => $employees, 'products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOrderRequest $request
     * @param Order $order
     * @return RedirectResponse
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->fill($request->validated())->save();

        if($request->has('product_id')) {

            // remove existing products first
            $order->products()->detach();

            // add product
            $order->products()->attach($request->product_id, ['quantity' => $request->quantity, 'unit_price' => $request->unit_price]);
        }

        // upload receipt copy if any
        if($request->hasFile('payment_receipt')) {
            $path = $request->file('payment_receipt')->store('public/img/receipts');

            $order->payment_receipt = $request->file('payment_receipt')->hashName();
            $order->save();
        }

        return redirect()->route('orders.index')
            ->with('flash_message', 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('flash_message', 'Order deleted successfully.');
    }

    public function updateProductAjax(Request $request, Order $order)
    {
        if($request->action == 'add') {
            // remove product if already there
            if($order->products->pluck('id')->contains($request->product_id)) {
                $order->products()->detach($request->product_id);
            }

            // add product
            $order->products()->attach($request->product_id, ['quantity' => $request->quantity, 'unit_price' => $request->unit_price]);

            $request->session()->flash('flash_message', 'Product added successfully.');

            return json_encode('Product added successfully');
        }

        // remove the product
        $order->products()->detach($request->product_id);

        $request->session()->flash('flash_message', 'Product removed successfully.');

        return json_encode('Product removed successfully');
    }
}
