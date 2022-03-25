@extends('layout.app')

@section('content')
    <div class="container-lg">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            @forelse($department1->employees as $employee)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <th scope="row">{{$employee->name}}</th>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->id}}</td>
                </tr>
            @empty
                <tr>
                    <td>There is no employees in deparment</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
