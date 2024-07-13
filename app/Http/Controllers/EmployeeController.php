<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'hire_date' => 'required|date',
            'address' => 'required|string|max:255',
            'siret' => 'required|string|max:14',
            'ape_code' => 'required|string|max:5',
            'collective_agreement' => 'required|string|max:255',
            'social_security_payment_location' => 'required|string|max:255',
        ]);

        $employee = Employee::create($request->all());
        return response()->json($employee, 201);
    }

    public function show($id)
    {
        return Employee::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
           'name' => 'sometimes|required|string|max:255',
        'email' => 'sometimes|required|string|email|max:255|unique:employees,email,'.$id,
        'position' => 'sometimes|required|string|max:255',
        'department' => 'sometimes|required|string|max:255',
        'hire_date' => 'sometimes|required|date',
        'address' => 'sometimes|required|string|max:255',
        'siret' => 'sometimes|required|string|max:14',
        'ape_code' => 'sometimes|required|string|max:5',
        'collective_agreement' => 'sometimes|required|string|max:255',
        'social_security_payment_location' => 'sometimes|required|string|max:255',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return response()->json($employee, 200);
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return response()->json(null, 204);
    }
}
