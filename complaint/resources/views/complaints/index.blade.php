@extends('layout.app')

@section('content')

    <div class="container-md">
        <h5 class="display-5">Complaints</h5>

        <div class="row">
            <p class="lead">List of complaints</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Complaint ID</th>
                        <th>Complaint Title</th>
                        <th>Last Update</th>
                        <th>Responsible By</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($complaints as $complaint)
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
                        <h5 class="display-5">There is no services in this department</h5>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-10">

            </div>
        </div>
    </div>
@endsection
