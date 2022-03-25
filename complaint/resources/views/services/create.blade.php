@extends('layout.app')

@section('content')

    <div class="container">
        <div class="col-lg-6">
            <div class="container my-5 py-3 bg-light border border-secondary rounded-3">
                <form action="{{ route('services.store') }}" method="post">
                    @csrf

                    <div class="my-3">
                        <label for="title" class="form-label">Title of the Service</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}" required>
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="description" class="form-label">Description of the Service</label>
                        <textarea type="text" name="description"
                                  class="form-control @error('description') is-invalid @enderror" id="description"
                                  required>{{old('description')}}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="department_id" class="form-label">Department Name</label>
                        <select class="form-select" name="department_id" required>
                            <option disabled selected hidden>Please select the department</option>
                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                        @error('department_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="responsible_id" class="form-label">ID of the responsible employee for this
                            service</label>

                        <input type="number" name="responsible_id"
                               class="form-control @error('responsible_id') is-invalid @enderror" id="responsible_id"
                               value="{{old('responsible_id')}}" required>
                        @error('responsible_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Create a new Service</button>

                </form>
            </div>
        </div>
    </div>

@endsection
