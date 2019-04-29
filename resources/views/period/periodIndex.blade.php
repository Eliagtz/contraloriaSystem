@extends('layouts.app')

@section('content')

@if(isset($periods))
    <div class="text-center m-3">
        <h3>Periods.</h3>    
    </div> 
    <div class="card-columns">
        @foreach($periods as $period)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> <strong> Period: </strong> {{ $period->start }} to {{ $period->end }} </h5>
                    @if($period->status == 0)
                        <p class="card-text"><span class="badge badge-danger">Inactive</span></p>
                    @elseif($period->status == 1)
                        <p class="card-text"><span class="badge badge-success">Active</span></p>   
                    @else 
                        <p class="card-text"><span class="badge badge-secondary">Finished</span></p>
                    @endif
                    <p class="card-text"> <strong>Description:</strong><br> {{ $period->description }}</p>
                    <p class="card-text"><small class="text-muted">Created by: {{ $period->user->name }}</small></p>
                    <a href=" {{ route('period.show', $period->id) }} " class="btn btn-primary">Details</a>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center m-3">
            <h3>There's no data.</h3>    
    </div>
@endif
    
@endsection