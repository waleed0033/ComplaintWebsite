@extends('layout.app')

@section('content')
    <div class="container-md">
        <h1 class="display-4">{{$department->name}}</h1>
        <p class="lead mb-5 ">Below is list for all the services that are provided by Department</p>
        <div class="row">
            <div class="col-sm-12 col-md">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Service ID</th>
                        <th>Service Title</th>
                        <th>Service Description</th>
                        <th>Total Number Complaints</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($department->services as $service)
                        <tr scope="row">
                            <td>{{$service->id}}</td>
                            <td>{{$service->title}}</td>
                            <td>{{$service->description}}</td>
                            <td>{{$service->complaints->count()}}</td>
                            <td><a class="btn btn-dark" href="{{route('services.edit',$service)}}">Edit</a></td>
                        </tr>
                    @empty
                        <h5 class="display-5">There is no services in this department</h5>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
