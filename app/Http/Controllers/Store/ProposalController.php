<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewProposalRequest;
use App\Http\Requests\UpdateProposalRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Store\Proposal;
use App\Models\Store\Supplier;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProposalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:Super admin|Procurement manager']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('store_module.proposals.index', ['proposals' => Proposal::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $suppliers = Supplier::all()->pluck('name', 'id')->toArray();

        $departments = Department::all()->pluck('name', 'id')->toArray();

        $employees = Employee::all()->pluck('user.name', 'id')->toArray();

        $products = Product::all()->pluck('name', 'id')->toArray();

        return view('store_module.proposals.create', compact('suppliers', 'departments', 'employees', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewProposalRequest $request
     * @return RedirectResponse
     */
    public function store(NewProposalRequest $request)
    {
        $proposal = Proposal::create([
            'supplier_id' => $request->supplier_id,
            'department_id' => $request->department_id,
            'employee_id' => $request->employee_id,
            'quotation_date' => $request->quotation_date,
            'status' => $request->status,
            'rejection_reason' => $request->rejection_reason,
            'tax' => $request->tax,
        ]);

        // add products if any
        foreach ($request->products as $product) {
            $proposal->products()->attach($product['product_id'], ['quantity' => $product['quantity'], 'unit_price' => $product['unit_price']]);
        }

        return redirect()->route('proposals.index')
            ->with('flash_message', 'Proposal created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Proposal $proposal
     * @return View
     */
    public function show(Proposal $proposal)
    {
        return view('store_module.proposals.show', ['proposal' => $proposal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Proposal $proposal
     * @return View
     */
    public function edit(Proposal $proposal)
    {
        $suppliers = Supplier::all()->pluck('name', 'id')->toArray();

        $departments = Department::all()->pluck('name', 'id')->toArray();

        $employees = Employee::all()->pluck('user.name', 'id')->toArray();

        $products = Product::all()->pluck('name', 'id')->toArray();

        return view('store_module.proposals.edit', compact('proposal', 'suppliers', 'departments', 'employees', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProposalRequest $request
     * @param Proposal $proposal
     * @return RedirectResponse
     */
    public function update(UpdateProposalRequest $request, Proposal $proposal)
    {
        $proposal->fill($request->validated())->save();

        if($request->has('product_id')) {

            // remove existing products first
            $proposal->products()->detach();

            // add product
            $proposal->products()->attach($request->product_id, ['quantity' => $request->quantity, 'unit_price' => $request->unit_price]);
        }

        return redirect()->route('proposals.index')
            ->with('flash_message', 'Proposal updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Proposal $proposal
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Proposal $proposal)
    {
        $proposal->delete();

        return redirect()->route('proposals.index')
            ->with('flash_message', 'Proposal deleted successfully.');
    }

    public function updateProductAjax(Request $request, Proposal $proposal)
    {
        if($request->action == 'add') {
            // remove product if already there
            if($proposal->products->pluck('id')->contains($request->product_id)) {
                $proposal->products()->detach($request->product_id);
            }

            // add product
            $proposal->products()->attach($request->product_id, ['quantity' => $request->quantity, 'unit_price' => $request->unit_price]);

            $request->session()->flash('flash_message', 'Product added successfully.');

            return json_encode('Product added successfully');
        }

        // remove the product
        $proposal->products()->detach($request->product_id);

        $request->session()->flash('flash_message', 'Product removed successfully.');

        return json_encode('Product removed successfully');
    }
}
