<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
   /**
     * Display a listing of the resource.
     * Paginate 10 Company
     * uri: companies
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new company.
     * Creata New Company
     * uri: companies/create
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('storage','public');

            // return $logoPath;
            $validatedData['logo'] = $logoPath;
        }

        Company::create($validatedData);

        return redirect()->route('companies.index')->with('success', trans('messages.Update'));
    }

    /**
     * Display the specified company.
     * uri : companies/id
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     * uri : companies/id/edit
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('storage','public');
            $validatedData['logo'] = $logoPath;
        }

        $company->update($validatedData);

        return redirect()->route('companies.index')->with('success', trans('messages.Update'));
    }

    /**
     * Remove the specified company from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', trans('messages.Delete'));
    }
}
