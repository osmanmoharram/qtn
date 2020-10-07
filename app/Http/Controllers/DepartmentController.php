<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('departments.index', ['departments' => Department::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
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
     * @param  \App\Models\Department  $department
     * @return \Illuminate\View\View
     */
    public function show(Department $department)
    {
        return view('departments.show', ['department' => $department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\View\View
     */
    public function edit(Department $department)
    {
        return view('departments.edit', ['department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDepartmentRequest $request
     * @param \App\Models\Department $department
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
     * @param  \App\Models\Department  $department
     * @return RedirectResponse
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return Redirect::route('departments.index')->with('flash_message', 'Department Deleted !');
    }
}
