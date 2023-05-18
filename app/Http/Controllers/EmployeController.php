<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employe::paginate(10);

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::pluck('name', 'id');

        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $employee = new Employe();
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->company_id = $request->input('company_id');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->save();

        return redirect()->route('employees.index')->with('success', trans('messages.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Employe $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employe $employee)
    {
        $companies = Company::pluck('name', 'id');

        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employe $employee)
    {
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->company_id = $request->input('company_id');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->save();

        return redirect()->route('employees.index')->with('success', trans('messages.Update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employe $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', trans('messages.Delete'));
    }
}
