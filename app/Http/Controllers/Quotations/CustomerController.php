<?php

namespace App\Http\Controllers\Quotations;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Quotations\Customer;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController extends Controller
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
        return view('quotations_module.customers.index', ['customers' => Customer::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('quotations_module.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewCustomerRequest $request
     * @return RedirectResponse
     */
    public function store(NewCustomerRequest $request)
    {
        $customer = Customer::create($request->validated());

        return redirect()->route('customers.index')
            ->with('flash_message', 'Customer added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @return View
     */
    public function show(Customer $customer)
    {
        return view('quotations_module.customers.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @return View
     */
    public function edit(Customer $customer)
    {
        return view('quotations_module.customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCustomerRequest $request
     * @param Customer $customer
     * @return RedirectResponse
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->fill($request->validated())->save();

        return redirect()->route('customers.index')
            ->with('flash_message', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('flash_message', 'Customer deleted successfully.');
    }
}
