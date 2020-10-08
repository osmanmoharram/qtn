<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Branch;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BranchController extends Controller
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
        return view('branches.index', ['branches' => Branch::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('branches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewBranchRequest $request
     * @return RedirectResponse
     */
    public function store(NewBranchRequest $request)
    {
        $newBranch = Branch::create($request->validated());

        return Redirect::route('branches.index')->with('flash_message', 'Branch Added !');
    }

    /**
     * Display the specified resource.
     *
     * @param Branch $branch
     * @return View
     */
    public function show(Branch $branch)
    {
        return view('branches.show', ['branch' => $branch]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Branch $branch
     * @return View
     */
    public function edit(Branch $branch)
    {
        return view('branches.edit', ['branch' => $branch]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBranchRequest $request
     * @param Branch $branch
     * @return RedirectResponse
     */
    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $branch->update($request->validated());

        return Redirect::route('branches.index')->with('flash_message', 'Branch Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Branch $branch
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return Redirect::route('branches.index')->with('flash_message', 'Branch Deleted !');
    }
}
