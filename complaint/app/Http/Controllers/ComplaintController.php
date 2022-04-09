<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Department;
use App\Models\Service;
use App\Notifications\ComplaintCreated;
use App\Notifications\ComplaintUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::with('responsibleBy')->get();

        return view('complaints.index', [
            'complaints' => $complaints,
        ]);
    }

    public function create()
    {
        $departments = Department::get();

        return view('complaints.create', [
            'departments' => $departments
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string', 'min:3', 'max:1023'],
            'department_id' => ['required', 'numeric', 'exists:departments,id'],
            'service_id' => ['required', 'numeric', 'exists:services,id'],
            'priority' => ['required', 'numeric', 'min:1', 'max:5'],
        ]);

        $service = Service::find($request->service_id);
        $issuer_id = auth()->user()->id;

        $complaint = $service->complaints()->create(
            array_merge(
                $request->only('title',
                    'priority'),
                [
                    'issuer_id' => $issuer_id,
                    'responsible_id' => $service->responsible_id,
                ]
            )
        );

        $complaint->complaintRecords()->create([
            'issuer_id' => $issuer_id,
            'description' => $request->description
        ]);

        $complaint->issuerBy->notify(new ComplaintCreated($complaint));
        //$complaint->responsibleBy->notify(new ComplaintCreated($complaint));

        return redirect()->route('home');
    }

    public function show(Complaint $complaint)
    {
        return dd($complaint->complaintRecords);
    }

    public function edit(Complaint $complaint)
    {
        $complaintRecords = $complaint->complaintRecords()->with('issueredBy')->get();

        return view('complaints.edit', [
            'complaint' => $complaint,
            'complaintRecords' => $complaintRecords,
        ]);
    }

    public function update(Complaint $complaint, Request $request)
    {
        $request->validate([
            'description' => ['required', 'string', 'min:3', 'max:1023'],
        ]);

        $complaint->complaintRecords()->create([
            'issuer_id' => auth()->user()->id,
            'description' => $request->description
        ]);

        //to update the model's update timestamp.
        $complaint->touch();

        $complaint->issuerBy->notify(new ComplaintUpdated($complaint));
        //$complaint->responsibleBy->notify(new ComplaintUpdated($complaint));

        return redirect()->route('home');
    }

    public function close(Complaint $complaint)
    {
        $complaint->update(['status' => 1]);

        return redirect()->route('complaints.index');
    }
}
