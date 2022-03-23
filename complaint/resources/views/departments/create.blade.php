@extends('layout.app')

@section('content')

    <div class="container">
        <div class="col-lg-6">
                <div class="container my-5 py-3 bg-light border border-secondary rounded-3">
                    <form action="{{ route('departments.store') }}" method="post">
                        @csrf
                        <div class="my-3">
                            <label for="name" class="form-label">Name of the Department</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="my-3">
                            <label for="manager_id" class="form-label">Manger ID</label>
                            <input type="number" name="manager_id" class="form-control @error('manager_id') is-invalid @enderror" id="manager_id" value="{{old('manager_id')}}">
                            @error('manager_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Create a new Department</button>
                    </form>
                </div>
            </div>
    </div>

@endsection
