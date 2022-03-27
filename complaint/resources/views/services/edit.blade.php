@extends('layout.app')

@section('content')

    <div class="container-md">
        <h2 class="display-5">Edit {{$service->title}} Service </h2>
        <p class="lead my-4">Please fill all the information that are required blow</p>
        <div class="row">
            <div class="col-md-5">
                <form action="{{ route('services.update',$service) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="my-3">
                        <label for="title" class="form-label">Title of the service</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ $service->title }}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description"
                               class="form-control @error('description') is-invalid @enderror" id="description"
                               value="{{ $service->description }}">
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="department_id" class="form-label">Department Name</label>
                        <select class="form-select" id="department_id" name="department_id" onchange="fetchDate()"
                                required>
                            <option disabled selected hidden>Please select the department</option>
                            @foreach($departments as $department)
                                <option @if($service->department_id == $department->id)
                                        selected
                                        @endif
                                        value="{{$department->id}}">{{$department->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="responsible_id" class="form-label">ID of employee is Responsible for this
                            service</label>
                        <input type="text" name="responsible_id"
                               class="form-control @error('responsible_id') is-invalid @enderror" id="responsible_id"
                               value="{{ $service->responsible_id }}">
                        @error('responsible_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark">Update Service</button>
                </form>
            </div>
            <div class="row my-5">
                <div class="col-md-7">
                    <p class="lead">If you want to delete the service please click on delete</p>
                    <form action="{{route('services.destroy',$service)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
