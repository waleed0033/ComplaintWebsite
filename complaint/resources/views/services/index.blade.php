@extends('layout.app')

@section('content')
    <h5 class="display-5 mx-3">Services</h5>
    <div class="row m-2 justify-content-center">
        @forelse($services as $service)
            <div class=" col-md-4 col-lg-3 m-1">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('services.edit',$service)}}">{{$service->title}}</a>
                        </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Title : {{$service->title}}</li>
                            <li class="list-group-item">Description : {{$service->description}}</li>
                            <li class="list-group-item">Responsible By {{$service->responsibleBy->name}}</li>
                            <li class="list-group-item">Created at {{$service->created_at}}</li>
                            <li class="list-group-item">Last update {{$service->updated_at}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        @empty
            <p>There is no service</p>
        @endforelse
        <div class=" col-md-4 col-lg-3 m-1">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{route('services.create')}}">Create a new service</a></h5>
                </div>
            </div>
        </div>
    </div>

@endsection
