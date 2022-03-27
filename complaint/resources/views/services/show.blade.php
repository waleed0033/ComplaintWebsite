@extends('layout.app')

@section('content')
    <div class="container-md">
        <h1 class="display-4">{{$service->title}}</h1>
        <p class="lead mb-5 ">Below is list for all the Complaints that are created under this service</p>
        <div class="row">
            <div class="col-sm-12 col-md">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Complaint ID</th>
                        <th>Complaint Title</th>
                        <th>Complaint Description</th>
                        <th>Total Number Complaints</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($service->complaints as $Complaint)
                        <tr scope="row">
                            <td>{{$Complaint->id}}</td>
                            <td>{{$Complaint->description}}</td>
                            <td>{{$Complaint->title}}</td>
                            <td>{{$Complaint->create_date}}</td>
                            <td><a class="btn btn-dark" href="{{route('services.edit',$service)}}">Edit</a></td>
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
