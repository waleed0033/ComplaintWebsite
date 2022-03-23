@extends('layout.app')

@section('content')
    <a href="{{ route('departments.create') }}" class="btn btn-primary">Create new department</a>

    <div class="row m-1 justify-content-center">
        @forelse($departments as $department)
            <div class=" col-md-4 col-lg-3 m-1">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('departments.edit',$department)}}">{{$department->name}}</a></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Has 10 employees</li>
                            <li class="list-group-item">Provide 10 servises</li>
                            <li class="list-group-item">A third item</li>
                        </ul>
                    </div>
                </div>
            </div>
        @empty
            <p>There is no department</p>
        @endforelse
    </div>

@endsection
