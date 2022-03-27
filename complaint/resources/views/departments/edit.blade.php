@extends('layout.app')

@section('content')


    <div class="container-md">
        <h2 class="display-5">Edit {{$department->name}} Department </h2>
        <p class="lead my-4">Please fill all the information that are required blow</p>
        <div class="row">
            <div class="col-md-5">
                <form action="{{ route('departments.update',$department) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="my-3">
                        <label for="name" class="form-label">Name of the Department</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ $department->name }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <label for="manager_id" class="form-label">Manger ID</label>
                        <input type="number" name="manager_id"
                               class="form-control @error('manager_id') is-invalid @enderror" id="manager_id"
                               value="{{ $department->manager_id }}">
                        @error('manager_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark">Update Department</button>
                </form>
            </div>
            <div class="row my-5">
                <div class="col-md-7">
                    <p class="lead">If you want to delete the department please click on delete</p>
                    <form action="{{route('departments.destroy',$department)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
