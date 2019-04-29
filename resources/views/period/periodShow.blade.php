@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(isset($period))

                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><strong> Period: </strong> {{ $period->start }} to {{ $period->end }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><strong> Period id: </strong> {{ $period->id }} </h6>
                        <h6 class="card-subtitle mb-2 text-muted"><strong> Created by: </strong> {{ $period->user->name }} </h6>
                        <h6 class="card-subtitle mb-2 text-muted"><strong> Initial fund: </strong> {{ $period->initial_fund }} </h6>
                        <h6 class="card-subtitle mb-2 text-muted"><strong> Final fund: </strong> {{ $period->final_fund }} </h6>
                        <p class="card-text"><strong> Description: </strong> {{ $period->description }} </p>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('period.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('period.edit', $period->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <div class="col-md-4">
                                <form action="{{ route('period.destroy', $period->id) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @else
                <div class="text-center m-3">
                        <h3>There's no data.</h3>    
                </div>
            @endif
        </div>
    </div>
</div>   
@endsection