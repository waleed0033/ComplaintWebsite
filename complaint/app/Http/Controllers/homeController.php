<?php

namespace App\Http\Controllers;

use App\Mail\testmail;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Utils;

class homeController extends Controller
{
    public function index()
    {

        $issueredComplaints = auth()->user()->issueredComplaints()->with('responsibleBy')->get();
        $responsibleComplaints = auth()->user()->responsibleComplaints()->with('issuerBy')->get();

        //Mail::to(auth()->user())->queue(new testmail(''));

        return view('home.index',[
            'issueredComplaints' => $issueredComplaints,
            'responsibleComplaints' => $responsibleComplaints
        ]);
    }
}
