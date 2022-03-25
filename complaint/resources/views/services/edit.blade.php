@extends('layout.app')

@section('content')

    <div class="container">
        <div class="col-lg-6">
            <div class="container my-5 py-3 bg-light border border-secondary rounded-3">
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
                        <label for="responsible_id" class="form-label">ID of employee is Responsible for this service</label>
                        <input type="text" name="responsible_id"
                               class="form-control @error('responsible_id') is-invalid @enderror" id="responsible_id"
                               value="{{ $service->responsible_id }}">
                        @error('responsible_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update Service</button>
                </form>
            </div>
        </div>
    </div>

@endsection
