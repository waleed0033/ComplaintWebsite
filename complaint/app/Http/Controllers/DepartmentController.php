<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with('mangeBy','services','employees')->get();

        return view('departments.index', [
            'departments' => $departments
        ]);
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'manager_id' => ['numeric', 'exists:users,id'],
        ]);

        Department::create($request->only(['name', 'manager_id']));

        return redirect()->route('departments.index');

    }

    public function show(Department $department)
    {
        return view('departments.show', [
            'department' => $department
        ]);
    }

    public function edit(Department $department)
    {
        return view('departments.edit', [
            'department' => $department
        ]);
    }

    public function update(Department $department, Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'manager_id' => ['numeric', 'exists:users,id'],
        ]);

        $department->update($request->only(['name', 'manager_id']));

        return redirect()->route('departments.show', $department);
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index');
    }

    public function servicesApi(Department $department)
    {
        $services = $department->services;

        return $services;
    }
}
