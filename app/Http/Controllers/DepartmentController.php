<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:Super admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('departments.index', ['departments' => Department::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewDepartmentRequest $request
     * @return RedirectResponse
     */
    public function store(NewDepartmentRequest $request)
    {
        $newDepartment = Department::create($request->validated());

        return Redirect::route('departments.index')->with('flash_message', 'Department Added !');
    }

    /**
     * Display the specified resource.
     *
     * @param Department $department
     * @return View
     */
    public function show(Department $department)
    {
        return view('departments.show', ['department' => $department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return View
     */
    public function edit(Department $department)
    {
        return view('departments.edit', ['department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDepartmentRequest $request
     * @param Department $department
     * @return RedirectResponse
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());

        return Redirect::route('departments.index')->with('flash_message', 'Department Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return Redirect::route('departments.index')->with('flash_message', 'Department Deleted !');
    }
}
