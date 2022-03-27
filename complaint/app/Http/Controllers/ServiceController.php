<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::get();

        return view('services.index', [
            'services' => $services
        ]);
    }

    public function create()
    {
        $departments = Department::get();

        return view('services.create', [
            'departments' => $departments,
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'department_id' => ['required', 'numeric', 'exists:departments,id'],
            'responsible_id' => ['required', 'numeric', 'exists:users,id']
        ]);

        Service::create($request->only([
            'title',
            'description',
            'department_id',
            'responsible_id'
        ]));

        return redirect()->route('services.index');
    }

    public function show(Service $service)
    {
        return view('services.show', [
            'service' => $service
        ]);
    }

    public function edit(Service $service)
    {
        $departments = Department::get();

        return view('services.edit', [
            'service' => $service,
            'departments' => $departments,
        ]);
    }

    public function update(Service $service, Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'department_id' => ['required', 'numeric', 'exists:departments,id'],
            'responsible_id' => ['required', 'numeric', 'exists:users,id']
        ]);

        $service->update($request->only([
            'title',
            'description',
            'department_id',
            'responsible_id'
        ]));

        return redirect()->route('departments.show', $service);
    }
}
