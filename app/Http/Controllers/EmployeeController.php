<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use App\Models\Skill;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('company')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        $skills = Skill::all();
        return view('employees.create', compact('companies', 'skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);
    
        $employee = Employee::create($request->only('name', 'company_id'));
    
        // Attach selected skills
        $employee->skills()->attach($request->input('skills', []));
    
        return redirect()->route('employees.index')->with('success', 'Sucesfully creating an Employee.');
    }
    

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        $skills = Skill::all();
        return view('employees.edit', compact('employee', 'companies', 'skills'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        $employee->update($request->all());

        // Sync skills
        $employee->skills()->sync($request->input('skills', [])); // default [] jika tidak ada skill terpilih
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
