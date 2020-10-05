<?php

namespace App\Http\Controllers\Quotations;

use App\Http\Controllers\Controller;
use App\Models\Quotations\{Customer,Quotation};
use App\Models\{Department, Product};
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('quotations_module.quotations.index', ['quotations' => Quotation::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *@include('partials.errors.permission-failure')
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all()->pluck('name')->toArray();

        $departments = Department::all()->pluck('name')->toArray();

        $products = Product::all()->pluck('name')->toArray();

        return view('quotations_module.quotations.create', compact('customers', 'departments', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quotation_request = $request->validate([
            'customer_id' => ['required', 'numeric'],
            'department_id' => ['required', 'numeric'],
            'issued_at' => ['required', 'date', 'before_or_equal:today']
        ]);

        $quotation = Quotation::create([
            'customer_id' => $quotation_request['customer_id'],
            'department_id' => $quotation_request['department_id'],
            'request_date' => $quotation_request['issued_at'],
            'status' => 'new', 
        ]);

        return redirect()->route('quotations.index')
            ->with('flash_message', 'quotation created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        return view('quotations_module.quotations.show', ['quotation' => $quotation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation)
    {
        return view('quotations_module.quotations.edit', ['quotation' => $quotation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation)
    {
        $quotation_request = $request->validate([
            'customer_id' => ['required', 'numeric'],
            'department_id' => ['required', 'numeric'],
            'issued_at' => ['required', 'date', 'before_or_equal:today'],
            'status' => ['required', 'in:approved,rejected'],
            'tax' => ['numeric'],
            'total' => ['numeric'],
            'validity' => ['numeric']
        ]);

        $quotation->update([
            'customer_id' => $quotation_request['customer_id'],
            'department_id' => $quotation_request['department_id'],
            'request_date' => $quotation_request['issued_at'],
            'status' => $quotation_request['status'],
        ]);

        return redirect()->route('quotations.index')
            ->with('flash_message', 'quotation created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation)
    {
        $quotation->delete();

        return redirect()->route('quotations.index')
            ->with('flash_message', 'quotation deleted successfully');
    }
}
