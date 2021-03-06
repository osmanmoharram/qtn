<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewRequestRequest;
use App\Http\Requests\UpdateRequestRequest;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Store\Request;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\View\View;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:Super admin|Store manager']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('store_module.requests.index', ['requests' => Request::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $employees = Employee::all()->pluck('user.name', 'id')->toArray();

        $products = Product::all()->pluck('name', 'id')->toArray();

        return view('store_module.requests.create', ['employees' => $employees, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewRequestRequest $http_request
     * @return RedirectResponse
     */
    public function store(NewRequestRequest $http_request)
    {
        $rfp = Request::create([
            'employee_id' => $http_request->employee_id,
            'request_date' => $http_request->request_date,
            'status' => $http_request->status,
            'rejection_reason' => $http_request->rejection_reason,
        ]);

        // add products if any
        foreach ($http_request->products as $product) {
            $rfp->products()->attach($product['product_id'], ['quantity' => $product['quantity']]);
        }

        return redirect()->route('requests.index')
            ->with('flash_message', 'RFP added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return View
     */
    public function show(Request $request)
    {
        return view('store_module.requests.show', ['request' => $request]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return View
     */
    public function edit(Request $request)
    {
        $employees = Employee::all()->pluck('user.name', 'id')->toArray();

        $products = Product::all()->pluck('name', 'id')->toArray();

        return view('store_module.requests.edit', ['request' => $request, 'employees' => $employees, 'products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequestRequest $http_request
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(UpdateRequestRequest $http_request, Request $request)
    {
        $request->fill($http_request->validated())->save();

        if($http_request->has('product_id')) {

            // remove existing products first
            $request->products()->detach();

            // add product
            $request->products()->attach($http_request->product_id, ['quantity' => $http_request->quantity]);
        }

        return redirect()->route('requests.index')
            ->with('flash_message', 'RFP updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Request $request)
    {
        $request->delete();

        return redirect()->route('requests.index')
            ->with('flash_message', 'RFP deleted successfully.');
    }

    public function updateProductAjax(HttpRequest $http_request, Request $request)
    {
        if($http_request->action == 'add') {
            // remove product if already there
            if($request->products->pluck('id')->contains($http_request->product_id)) {
                $request->products()->detach($http_request->product_id);
            }

            // add product
            $request->products()->attach($http_request->product_id, ['quantity' => $http_request->quantity]);

            $http_request->session()->flash('flash_message', 'Product added successfully.');

            return json_encode('Product added successfully');
        }

        // remove the product
        $request->products()->detach($http_request->product_id);

        $http_request->session()->flash('flash_message', 'Product removed successfully.');

        return json_encode('Product removed successfully');
    }
}
