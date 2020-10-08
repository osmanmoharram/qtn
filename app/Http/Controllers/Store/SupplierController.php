<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Store\Supplier;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SupplierController extends Controller
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
        return view('store_module.suppliers.index', ['suppliers' => Supplier::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('store_module.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewSupplierRequest $request
     * @return RedirectResponse
     */
    public function store(NewSupplierRequest $request)
    {
        $supplier = Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('suppliers.index')
            ->with('flash_message', 'Supplier added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Supplier $supplier
     * @return View
     */
    public function show(Supplier $supplier)
    {
        return view('store_module.suppliers.show', ['supplier' => $supplier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Supplier $supplier
     * @return View
     */
    public function edit(Supplier $supplier)
    {
        return view('store_module.suppliers.edit', ['supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSupplierRequest $request
     * @param Supplier $supplier
     * @return RedirectResponse
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $supplier->fill($request->validated())->save();

        return redirect()->route('suppliers.index')
            ->with('flash_message', 'Supplier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Supplier $supplier
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')
            ->with('flash_message', 'Supplier successfully deleted.');
    }
}
