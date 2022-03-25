@extends('layout.app')

@section('content')
    <h5 class="display-5 mx-3">Departments</h5>
    <div class="row m-2 justify-content-center">
        @forelse($departments as $department)
            <div class=" col-md-4 col-lg-3 m-1">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('departments.edit',$department)}}">{{$department->name}}</a></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Has 10 employees</li>
                            <li class="list-group-item"><a href="{{route('departments.services',$department)}}">Provide {{$department->services->count()}} servises</a> </li>
                            <li class="list-group-item">Manage by {{$department->mangeBy->name}}</li>
                            <li class="list-group-item">Created at {{$department->created_at}}</li>
                            <li class="list-group-item">Last update {{$department->updated_at}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        @empty
            <p>There is no department</p>
        @endforelse
            <div class=" col-md-4 col-lg-3 m-1">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('departments.create')}}">Create a new Department</a></h5>
                    </div>
                </div>
            </div>
    </div>

@endsection
