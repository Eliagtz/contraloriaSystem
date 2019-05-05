@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(isset($period))

                
                    @if ($period->status == 1)                    
                        <div class="card border-info mb-3" style="max-width: 18rem;">
                            <div class="card-header text-info"><strong> Period: </strong> {{ $period->start }} to {{ $period->end }}</div>
                                <div class="card-body text-info">
                                    <h6 class="card-text"><strong> Period id: </strong> {{ $period->id }} </h6>
                                    <h6 class="card-text"><strong> Created by: </strong> {{ $period->user->name }} </h6>
                                    <h6 class="card-text"><strong> Initial fund: </strong> {{ $period->initial_fund }} </h6>
                                    <h6 class="card-text"><strong> Final fund: </strong> {{ $period->final_fund }} </h6>
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
                        </div>
                    @else
                    <div class="card border-secondary mb-3" style="max-width: 18rem;">
                        <div class="card-header text-secondary"><strong> Period: </strong> {{ $period->start }} to {{ $period->end }}</div>
                            <div class="card-body text-secondary">
                                <h6 class="card-text"><strong> Period id: </strong> {{ $period->id }} </h6>
                                <h6 class="card-text"><strong> Created by: </strong> {{ $period->user->name }} </h6>
                                <h6 class="card-text"><strong> Initial fund: </strong> {{ $period->initial_fund }} </h6>
                                <h6 class="card-text"><strong> Final fund: </strong> {{ $period->final_fund }} </h6>
                                <p class="card-text"><strong> Description: </strong> {{ $period->description }} </p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{ route('period.index') }}" class="btn btn-secondary">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
            @else
                <div class="text-center m-3">
                        <h3>There's no data.</h3>    
                </div>
            @endif
        </div>
    </div>
</div>   
@endsection