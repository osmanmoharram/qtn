<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Store\Proposal;
use App\Models\Store\Supplier;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProposalController extends Controller
{
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
        $suppliers = [];

        foreach (Supplier::all() as $supplier) {
            $suppliers[$supplier->id] = $supplier->name;
        }

        $departments = [];

        foreach (Department::all() as $department) {
            $departments[$department->id] = $department->name;
        }

        $employees = [];

        foreach (Employee::all() as $employee) {
            $employees[$employee->id] = $employee->user->name;
        }

        return view('store_module.proposals.create', compact('suppliers', 'departments', 'employees'));
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
        $validated_fields = $this->validate($request, [
            'supplier_id' => 'required|numeric',
            'department_id' => 'required|numeric',
            'employee_id' => 'required|numeric',
            'quotation_date' => 'required|date',
            'status' => 'required|in:pending_approval,approved,rejected',
            'rejection_reason' => 'nullable|max:128',
            'tax' => 'nullable|numeric'
        ]);

        $proposal = Proposal::create($validated_fields);

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
        $suppliers = [];

        foreach (Supplier::all() as $supplier) {
            $suppliers[$supplier->id] = $supplier->name;
        }

        $departments = [];

        foreach (Department::all() as $department) {
            $departments[$department->id] = $department->name;
        }

        $employees = [];

        foreach (Employee::all() as $employee) {
            $employees[$employee->id] = $employee->user->name;
        }

        return view('store_module.proposals.edit', compact('proposal', 'suppliers', 'departments', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Proposal $proposal
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Proposal $proposal)
    {
        $validated_fields = $this->validate($request, [
            'supplier_id' => 'required|numeric',
            'department_id' => 'required|numeric',
            'employee_id' => 'required|numeric',
            'quotation_date' => 'required|date',
            'status' => 'required|in:pending_approval,approved,rejected',
            'rejection_reason' => 'nullable|max:128',
            'tax' => 'nullable|numeric'
        ]);

        $proposal->fill($validated_fields)->save();

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
}
