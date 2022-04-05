@extends('layout.app')

@section('content')
    <div class="container-md">
        <h5 class="display-5">Services</h5>
        <p class="lead">List of Services</p>
        <div class="row m-2 justify-content-center">
            @forelse($services as $service)
                <div class=" col-md-4 col-lg-3 my-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a
                                    class="link-secondary"
                                    href="{{route('services.show',$service)}}">{{$service->title}}
                                </a>
                            </h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Title : {{$service->title}}</li>
                                <li class="list-group-item">Description : {{$service->description}}</li>
                                <li class="list-group-item">Manage by {{$service->responsibleBy->name}}</li>
                                <li class="list-group-item">Created at {{$service->created_at->format('m/d H:i')}}</li>
                                <li class="list-group-item">Last update {{$service->updated_at->format('m/d H:i')}}</li>
                                <div class="card-body">
                                    <a href="{{route('services.edit',$service)}}"
                                       class="card-link link-secondary">Edit</a>
                                </div>
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
                        <h5 class="card-title">
                            <a class="link-secondary" href="{{route('services.create')}}">Create a new service</a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
