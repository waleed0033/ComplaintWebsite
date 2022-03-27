@extends('layout.app')

@section('content')

    <div class="container-md">
        <h2 class="display-4">Create a new Department</h2>
        <p class="lead mb-5">Please fill all the information that are required blow</p>

        <div class="row">
            <div class="col-md-5">
                <form action="{{ route('departments.store') }}" method="post">
                    @csrf
                    <div class="my-3">
                        <label for="name" class="form-label">Name of the Department</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" placeholder="Please enter clear name for the department"
                               required>
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
                               value="{{old('manager_id')}}" required>
                        @error('manager_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark">Create a new Department</button>
                </form>
            </div>
        </div>
    </div>

@endsection
