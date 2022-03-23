@extends('layout.app')

@section('content')
    <a href="{{ route('departments.create') }}" class="btn btn-primary">Create new department</a>
    <div class="container-lg">
        {{$department1}}
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
            @forelse($department1->employees as $employe)
                <tr>
                <td>{{$loop->iteration}}</td>
                <th scope="row">{{$employe->name}}</th>
                <td>{{$employe->email}}</td>
                <td>{{$employe->id}}</td>
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
