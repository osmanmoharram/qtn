<?php

namespace App\Http\Controllers\Quotations;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewDispatchRequest;
use App\Http\Requests\UpdateDispatchRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Quotations\Dispatch;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DispatchController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:Super admin|Employee']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('quotations_module.dispatches.index', ['dispatches' => Dispatch::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $departments = Department::all()->pluck('name', 'id')->toArray();

        $employees = Employee::all()->pluck('user.name', 'id')->toArray();

        $products = Product::all()->pluck('name', 'id')->toArray();

        return view('quotations_module.dispatches.create', compact('departments', 'employees', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewDispatchRequest $request
     * @return RedirectResponse
     */
    public function store(NewDispatchRequest $request)
    {
        $dispatch = Dispatch::create([
            'employee_id' => $request->employee_id,
            'department_id' => $request->department_id,
            'request_date' => $request->request_date,
            'status' => $request->status,
            'rejection_reason' => $request->rejection_reason,
        ]);

        // add products if any
        foreach ($request->products as $product) {
            $dispatch->products()->attach($product['product_id'], ['quantity' => $product['quantity']]);
        }

        return redirect()->route('dispatches.index')
            ->with('flash_message', 'Dispatch Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Dispatch $dispatch
     * @return View
     */
    public function show(Dispatch $dispatch)
    {
        return view('quotations_module.dispatches.show', ['dispatch' => $dispatch]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Dispatch $dispatch
     * @return View
     */
    public function edit(Dispatch $dispatch)
    {
        $departments = Department::all()->pluck('name', 'id')->toArray();

        $employees = Employee::all()->pluck('user.name', 'id')->toArray();

        $products = Product::all()->pluck('name', 'id')->toArray();

        return view('quotations_module.dispatches.edit', compact('dispatch', 'departments', 'employees', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDispatchRequest $request
     * @param Dispatch $dispatch
     * @return RedirectResponse
     */
    public function update(UpdateDispatchRequest $request, Dispatch $dispatch)
    {
        $dispatch->fill($request->validated())->save();

        if($request->has('product_id')) {

            // remove existing products first
            $dispatch->products()->detach();

            // add product
            $dispatch->products()->attach($request->product_id, ['quantity' => $request->quantity]);
        }

        return redirect()->route('dispatches.index')
            ->with('flash_message', 'Dispatch updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Dispatch $dispatch
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Dispatch $dispatch)
    {
        $dispatch->delete();

        return redirect()->route('dispatches.index')
            ->with('flash_message', 'Dispatch deleted successfully.');
    }

    public function updateProductAjax(Request $request, Dispatch $dispatch)
    {
        if($request->action == 'add') {
            // remove product if already there
            if($dispatch->products->pluck('id')->contains($request->product_id)) {
                $dispatch->products()->detach($request->product_id);
            }

            // add product
            $dispatch->products()->attach($request->product_id, ['quantity' => $request->quantity]);

            $request->session()->flash('flash_message', 'Product added successfully.');

            return json_encode('Product added successfully');
        }

        // remove the product
        $dispatch->products()->detach($request->product_id);

        $request->session()->flash('flash_message', 'Product removed successfully.');

        return json_encode('Product removed successfully');
    }
}
