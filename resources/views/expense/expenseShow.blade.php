@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(isset($expense))
                
                <div class="card border-info mb-3" style="max-width: 18rem;">
                    <div class="card-header text-info"><strong> Period: </strong> {{ $expense->period_id }} </div>
                        <div class="card-body text-info">
                            <h6 class="card-text"><strong> Expense id: </strong> {{ $expense->id }} </h6>
                            <h6 class="card-text"><strong> Quantity: </strong> {{ $expense->quantity }} </h6>
                            <p class="card-text"><strong> Description: </strong> {{ $expense->concept }} </p>
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('period.expense.index', $expense->period->id) }}" class="btn btn-secondary">Back</a>
                                </div>
                                @can('pass', Auth::user())
                                <div class="col-6">
                                    <a href="{{ route('expense.edit', $expense->id) }}" class="btn btn-primary">Edit</a>
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