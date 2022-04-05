@extends('layout.app')

@section('content')

    <div class="container-md">
        <h1 class="display-5">Responsible Complaint</h1>
        <p class="lead mb-5 ">List of Complaints that you are responsible about</p>
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Last Update</th>
                        <th>Issuered By</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($responsibleComplaints as $complaint)
                        <tr scope="row">
                            <td>{{$complaint->id}}</td>
                            <td>{{$complaint->title}}</td>
                            <td>{{$complaint->updated_at->format('m/d H:i')}}</td>
                            <td>{{$complaint->issuerBy->name}}</td>
                            <td>{{$complaint->getStatus()}}</td>
                            <td>{{$complaint->getPriority()}}</td>
                            <td><a class="btn btn-dark" href="{{route('complaints.edit',$complaint)}}">Details</a></td>
                        </tr>
                    @empty
                        <h5 class="display-5">There is no Complaint</h5>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container-md my-5">
        <h1 class="display-5">Created Complaints</h1>
        <p class="lead mb-5 ">List of all the Complaints that are created By you</p>
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Last Update</th>
                        <th>Responsible By</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($issueredComplaints as $complaint)
                        <tr scope="row">
                            <td>{{$complaint->id}}</td>
                            <td>{{$complaint->title}}</td>
                            <td>{{$complaint->updated_at->format('m/d H:i')}}</td>
                            <td>{{$complaint->responsibleBy->name}}</td>
                            <td>{{$complaint->getStatus()}}</td>
                            <td>{{$complaint->getPriority()}}</td>
                            <td><a class="btn btn-dark" href="{{route('complaints.edit',$complaint)}}">Details</a></td>
                        </tr>
                    @empty
                        <h5 class="display-5">There is no Complaint</h5>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
