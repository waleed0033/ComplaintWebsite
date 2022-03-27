<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Department;
use App\Models\Service;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $conplaints = Complaint::paginate(20);

        return view('complaints.index',[
        'conplaints' => $conplaints,
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


        return redirect()->route('complaints.show',$complaint);
    }

    public function show(Complaint $complaint)
    {
        return dd($complaint->complaintRecords);
    }
}
