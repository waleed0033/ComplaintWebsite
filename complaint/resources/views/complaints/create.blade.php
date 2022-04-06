@extends('layout.app')

@section('content')

    <div class="container-md">
        <h2 class="display-4">Create a new Service</h2>
        <p class="lead mb-5">Please fill all the information that are required blow</p>

        <div class="row">
            <div class="col-md-5">
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
                        <textarea name="description"
                                  class="form-control @error('description') is-invalid @enderror" id="description"
                                  required>{{old('description')}}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="department_id" class="form-label">
                            Department Name</label>
                        <select class="form-select @error('department_id') is-invalid @enderror" id="department_id" name="department_id" onchange="fetchDate()"
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
                        <select class="form-select @error('service_id') is-invalid @enderror" name="service_id" id="service_id" required>
                            <option disabled selected hidden>Please select the service</option>
                        </select>
                        @error('service_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="priority" class="form-label">Priority <span id="priority_span">Mid</span></label>
                        <input type="range" name="priority" min="1" max="5"
                               class="form-range @error('priority') is-invalid @enderror" id="priority_ranag"
                               value="{{old('priority')}}" onchange="range(this)" required>
                        @error('priority')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark mb-5">Create a new Service</button>

                </form>
            </div>
        </div>
    </div>

    <script>
        function range() {
            let priority_value = document.getElementById('priority_ranag').value;
            let priority_span = document.getElementById('priority_span');
            let message;

            console.log(typeof priority_value);

            switch (priority_value) {
                case '1':
                    message = 'Low';
                    break;
                case '2':
                    message = 'Low mid';
                    break;
                case '3':
                    message = 'Mid';
                    break;
                case '4':
                    message = 'High';
                    break;
                case '5':
                    message = 'Urgent';
                    break;
                default:
                    message = 'other';
            }

            priority_span.textContent = message;
        }

        function fetchDate() {
            let id = document.getElementById('department_id').selectedIndex;
            let service_select = document.getElementById('service_id');

            fetch('/api/departments/' + id + '/services')
                .then(response => response.json())
                .then(service_select.replaceChildren())
                .then(date => date.map(function (x) {
                    service_select.append(new Option(x['title'], x['id']));
                }))

        }

    </script>

@endsection
