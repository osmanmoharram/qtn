<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Store\Supplier;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SupplierController extends Controller
{
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
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:128',
            'email' => 'required|email|unique:suppliers',
            'phone' => 'required|min:10|max:15',
            'address' => 'max:128',
        ]);

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
     * @param Request $request
     * @param Supplier $supplier
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validated_fields = $this->validate($request, [
            'name' => 'required|min:2|max:128',
            'email' => 'required|email|unique:suppliers,email,' . $supplier->id,
            'phone' => 'required|min:10|max:15',
            'address' => 'max:128',
        ]);

        $supplier->fill($validated_fields)->save();

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
