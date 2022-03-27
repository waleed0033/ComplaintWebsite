@extends('layout.app')

@section('content')

    <div class="container">
        <div class="col-lg-6">
            <div class="container my-5 py-3 bg-light border border-secondary rounded-3">
                <form action="{{ route('complaints.store') }}" method="post">
                    @csrf
                    <div class="my-3">
                        <label for="title" class="form-label">Title of the complaint</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}" required>
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="description" class="form-label">Description of the complaint</label>
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
                        <select class="form-select" id="department_id" name="department_id" onchange="fetchDate()"
                                required>
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
                        <label for="service_id" class="form-label">Service Name</label>
                        <select class="form-select" name="service_id" id="service_id" required>
                            <option disabled selected hidden>Please select the service</option>
                        </select>
                        @error('service_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="priority" class="form-label">Priority</label>
                        <input type="range" name="priority" min="1" max="5"
                               class="form-range @error('priority') is-invalid @enderror" id="priority"
                               value="{{old('priority')}}" required>
                        @error('priority')
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

    <script>

        function fetchDate(){
            let id = document.getElementById('department_id').selectedIndex;
            var service_select = document.getElementById('service_id');
            var newOption;

            fetch('http://127.0.0.1:8000/api/departments/'+id+'/services')
            .then(response => response.json())
                .then(service_select.replaceChildren())
            .then(date => date.map(function (x){
                service_select.append(new Option(x['title'],x['id']));
            }))

        };

    </script>

@endsection
