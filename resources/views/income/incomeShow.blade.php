@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(isset($income))
                
                <div class="card border-info mb-3" style="max-width: 18rem;">
                    <div class="card-header text-info"><strong> Period: </strong> {{ $income->period_id }} </div>
                        <div class="card-body text-info">
                            <h6 class="card-text"><strong> Expense id: </strong> {{ $income->id }} </h6>
                            <h6 class="card-text"><strong> Quantity: </strong> {{ $income->quantity }} </h6>
                            <p class="card-text"><strong> Description: </strong> {{ $income->concept }} </p>
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('period.income.index', $income->period->id) }}" class="btn btn-secondary">Back</a>
                                </div>
                                @can('pass')
                                <div class="col-6">
                                    <a href="{{ route('income.edit', $income->id) }}" class="btn btn-primary">Edit</a>
                                </div>
                                @endcan
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