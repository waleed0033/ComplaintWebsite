<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::get();

        return view('departments.index',[
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
            'name' => ['required'],
            'manager_id' => ['required','numeric','exists:users,id'],
        ]);

        Department::create([
            'name' => $request->name,
            'manager_id' => $request->manager_id,
        ]);

        return redirect()->route('departments.index');

    }

    public function show(Department $department)
    {
        $department1 = ($department);

        return view('departments.show',[
            'department1' => $department1
        ]);
    }

    public function edit(Department $department)
    {
        return view('departments.edit',[
            'department' => $department
        ]);
    }

    public function update(Department $department,Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'manager_id' => ['numeric','exists:users,id'],
        ]);

        $department->update($request->only(['name','manager_id']));

        return redirect()->route('departments.show',$department);
    }
}
