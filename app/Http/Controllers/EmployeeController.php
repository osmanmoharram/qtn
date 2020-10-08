<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:Super admin|Branch manager']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('employees.index', ['employees' => Employee::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $branches = Branch::all()->pluck('name', 'id')->toArray();
        $departments = Department::all()->pluck('name', 'id')->toArray();

        return view('employees.create', ['branches' => $branches, 'departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewEmployeeRequest $request
     * @return RedirectResponse
     */
    public function store(NewEmployeeRequest $request)
    {
        $newEmployee = Employee::createWith($request->validated());

        return Redirect::route('employees.index')->with('flash_message', 'Employee Added !');
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return View
     */
    public function show(Employee $employee)
    {
        return view('employees.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return View
     */
    public function edit(Employee $employee)
    {
        $branches = Branch::all()->pluck('name', 'id')->toArray();
        $departments = Department::all()->pluck('name', 'id')->toArray();

        return view('employees.edit', ['employee' => $employee, 'branches' => $branches, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEmployeeRequest $request
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->updateWith($request->validated());

        return Redirect::route('employees.index')->with('flash_message', 'Employee Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function destroy(Employee $employee)
    {
        $employee->user->delete();

        return Redirect::route('employees.index')->with('flash_message', 'Employee Deleted !');
    }
}
