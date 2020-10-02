<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Store\Order;
use App\Models\Store\Supplier;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
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
        $suppliers = [];

        foreach (Supplier::all() as $supplier) {
            $suppliers[$supplier->id] = $supplier->name;
        }

        $employees = [];

        foreach (Employee::all() as $employee) {
            $employees[$employee->id] = $employee->user->name;
        }

        return view('store_module.orders.create', compact('suppliers', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'supplier_id' => 'required|numeric',
            'employee_id' => 'required|numeric',
            'issued_at' => 'required|date',
            'status' => 'required|in:awaiting,online,received,stored',
            'payment_receipt' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'tax' => 'nullable|numeric'
        ]);

        $order = Order::create([
            'supplier_id' => $request->supplier_id,
            'employee_id' => $request->employee_id,
            'issued_at' => $request->issued_at,
            'status' => $request->status,
            //'payment_receipt' => $request->payment_receipt,
            'tax' => $request->tax
        ]);

        // upload receipt copy if any
        if($request->hasFile('payment_receipt')) {
            $path = $request->file('payment_receipt')->store('public/img/receipts');

            $order->payment_receipt = $request->file('payment_receipt')->hashName();
            $order->save();
        }

        return redirect()->route('orders.index')
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
        $suppliers = [];

        foreach (Supplier::all() as $supplier) {
            $suppliers[$supplier->id] = $supplier->name;
        }

        $employees = [];

        foreach (Employee::all() as $employee) {
            $employees[$employee->id] = $employee->user->name;
        }

        return view('store_module.orders.edit', ['order' => $order, 'suppliers' => $suppliers, 'employees' => $employees]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Order $order
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Order $order)
    {
        $validated_fields = $this->validate($request, [
            'supplier_id' => 'required|numeric',
            'employee_id' => 'required|numeric',
            'issued_at' => 'required|date',
            'status' => 'required|in:awaiting,online,received,stored',
            'payment_receipt' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'tax' => 'nullable|numeric'
        ]);

        $order->fill($validated_fields)->save();

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
}
