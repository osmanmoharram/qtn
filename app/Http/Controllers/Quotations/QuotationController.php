<?php

namespace App\Http\Controllers\Quotations;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewQuotationRequest;
use App\Http\Requests\UpdateQuotationRequest;
use App\Models\Department;
use App\Models\Product;
use App\Models\Quotations\Customer;
use App\Models\Quotations\Quotation;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuotationController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role:Super admin|Branch manager|Employee']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('quotations_module.quotations.index', ['quotations' => Quotation::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $customers = Customer::all()->pluck('name', 'id')->toArray();

        $departments = Department::all()->pluck('name', 'id')->toArray();

        $products = Product::all()->pluck('name', 'id')->toArray();

        return view('quotations_module.quotations.create', compact('customers', 'departments', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewQuotationRequest $request
     * @return RedirectResponse
     */
    public function store(NewQuotationRequest $request)
    {
        $quotation = Quotation::create($request->validated());

        // add products if any
        foreach ($request->products as $product) {
            $quotation->products()->attach($product['product_id'], ['quantity' => $product['quantity'], 'unit_price' => $product['unit_price']]);
        }

        return redirect()->route('quotations.index')
            ->with('flash_message', 'Quotation added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Quotation $quotation
     * @return View
     */
    public function show(Quotation $quotation)
    {
        return view('quotations_module.quotations.show', ['quotation' => $quotation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Quotation $quotation
     * @return View
     */
    public function edit(Quotation $quotation)
    {
        $customers = Customer::all()->pluck('name', 'id')->toArray();

        $departments = Department::all()->pluck('name', 'id')->toArray();

        $products = Product::all()->pluck('name', 'id')->toArray();

        return view('quotations_module.quotations.edit', compact('quotation', 'customers', 'departments', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateQuotationRequest $request
     * @param Quotation $quotation
     * @return RedirectResponse
     */
    public function update(UpdateQuotationRequest $request, Quotation $quotation)
    {
        $quotation->fill($request->validated())->save();

        if($request->has('product_id')) {

            // remove existing products first
            $quotation->products()->detach();

            // add product
            $quotation->products()->attach($request->product_id, ['quantity' => $request->quantity, 'unit_price' => $request->unit_price]);
        }

        return redirect()->route('quotations.index')
            ->with('flash_message', 'Quotation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Quotation $quotation
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Quotation $quotation)
    {
        $quotation->delete();

        return redirect()->route('quotations.index')
            ->with('flash_message', 'Quotation deleted successfully.');
    }

    public function updateProductAjax(Request $request, Quotation $quotation)
    {
        if($request->action == 'add') {
            // remove product if already there
            if($quotation->products->pluck('id')->contains($request->product_id)) {
                $quotation->products()->detach($request->product_id);
            }

            // add product
            $quotation->products()->attach($request->product_id, ['quantity' => $request->quantity, 'unit_price' => $request->unit_price]);

            $request->session()->flash('flash_message', 'Product added successfully.');

            return json_encode('Product added successfully');
        }

        // remove the product
        $quotation->products()->detach($request->product_id);

        $request->session()->flash('flash_message', 'Product removed successfully.');

        return json_encode('Product removed successfully');
    }
}
