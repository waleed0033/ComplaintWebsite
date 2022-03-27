@extends('layout.app')

@section('content')

    <div class="container-md">
        <div class="row">
            <p class="lead">List of complaints that are created by you</p>
            <div class="col-10">
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
                    @forelse($conplaints as $conplaint)
                        <tr scope="row">
                            <td>{{$conplaint->id}}</td>
                            <td>{{$conplaint->title}}</td>
                            <td>{{$conplaint->updated_at->format('m/d H:i')}}</td>
                            <td>{{$conplaint->responsible_id}}</td>
                            <td>{{$conplaint->status}}</td>
                            <td>{{$conplaint->priority}}</td>
                            <td><a class="btn btn-dark" href="#">Details</a></td>
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
