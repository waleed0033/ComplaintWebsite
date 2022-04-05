@extends('layout.app')

@section('content')

    <div class="container-md">
        <h2 class="display-5">Complaint details</h2>
        <p class="lead mb-5">All details are shown below</p>

        <div class="row">
            <div class="col-md-5">
                <p class="fw-normal">Complaint ID : {{$complaint->id}}</p>
                <p class="fw-normal">Service Title : {{$complaint->serviceInfo->title}}</p>
                <p class="fw-normal">Complaint issuered by : {{$complaint->issuerBy->name}}</p>
                <p class="fw-normal">Complaint Created at : {{$complaint->created_at}}</p>
                <p class="fw-normal">Complaint Updated at : {{$complaint->updated_at}}</p>
                <p class="fw-normal">Complaint statue : {{$complaint->getStatus()}}</p>
                <form method="post" action="{{route('complaints.close',$complaint)}}">
                    @csrf
                    <button class="btn btn-dark" type="submit">Close complaint</button>
                </form>
            </div>
            <div class="col-md-7">
                @forelse($complaintRecords as $complaintRecord)
                    <div class="card my-4">
                        <div class="card-header">
                            {{$complaintRecord->issueredBy->name}}
                        </div>
                        <div class="card-body">
                            <p class="lead">{{$complaintRecord->description}}</p>
                        </div>
                        <div class="card-footer text-muted">
                            {{$complaintRecord->created_at->format('Y/m/d H:i')}}
                        </div>
                    </div>
                @empty
                    asfs
                @endforelse

                <form action="{{ route('complaints.update',$complaint) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="my-3">
                        <label for="description" class="form-label">Write your reply here</label>
                        <textarea name="description"
                                  class="form-control @error('description') is-invalid @enderror" id="description"
                                  required>{{old('description')}}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark mb-5">Send</button>

                </form>
            </div>
        </div>
    </div>

@endsection
