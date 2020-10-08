<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class EmployeeUploadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:Super admin|Branch manager']);
    }

    /**
     * Errors validation array
     *
     * @var array
     */
    protected $errors = [];

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('employees.upload');
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
            'employees' => 'required|file|mimes:csv,txt|mimetypes:application/vnd.ms-excel,text/plain,text/csv,text/tsv'
        ]);

        $uploaded_file = $request->file('employees');
        $new_name = 'employees-' . time() . '.csv';
        $employees = [];

        // make sure the file uploaded successfully.
        if($uploaded_file->isValid()) {
            $path = $uploaded_file->storeAs('public/uploads', $new_name);

            if (($handle = fopen(storage_path('app/' . $path), 'r')) !== false)
            {
                $header = null;

                while (($row = fgetcsv($handle, 1000, ',')) !== false)
                {
                    if (! $header) {
                        $header = $row;
                    } else {
                        $data = array_combine($header, $row);
                        $employees[] = Employee::createWith($data);
                    }
                }

                fclose($handle);
            }

            // delete the uploaded file after importing employees.
            Storage::delete($path);
        }

        $count = count($employees);
        $flash_message = "{$count} Employees were added successfully!";

        return Redirect::route('employees.index')->with('flash_message', $flash_message);
    }
}
