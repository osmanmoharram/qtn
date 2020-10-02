<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Store\Request;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('store_module.requests.index', ['requests' => Request::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $employees = [];

        foreach (Employee::all() as $employee) {
            $employees[$employee->id] = $employee->user->name;
        }

        return view('store_module.requests.create', ['employees' => $employees]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HttpRequest $http_request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(HttpRequest $http_request)
    {
        $validated_fields = $this->validate($http_request, [
            'employee_id' => 'required|numeric',
            'request_date' => 'required|date',
            'status' => 'required|in:new,approved,rejected',
            'rejection_reason' => 'nullable|max:128'
        ]);

        $rfp = Request::create($validated_fields);

        return redirect()->route('requests.index')
            ->with('flash_message', 'RFP added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return View
     */
    public function show(Request $request)
    {
        return view('store_module.requests.show', ['request' => $request]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return View
     */
    public function edit(Request $request)
    {
        $employees = [];

        foreach (Employee::all() as $employee) {
            $employees[$employee->id] = $employee->user->name;
        }

        return view('store_module.requests.edit', ['request' => $request, 'employees' => $employees]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HttpRequest $http_request
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(HttpRequest $http_request, Request $request)
    {
        $validated_fields = $this->validate($http_request, [
            'employee_id' => 'required|numeric',
            'request_date' => 'required|date',
            'status' => 'required|in:new,approved,rejected',
            'rejection_reason' => 'nullable|max:128'
        ]);

        $request->fill($validated_fields)->save();

        return redirect()->route('requests.index')
            ->with('flash_message', 'RFP updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Request $request)
    {
        $request->delete();

        return redirect()->route('requests.index')
            ->with('flash_message', 'RFP deleted successfully.');
    }
}
