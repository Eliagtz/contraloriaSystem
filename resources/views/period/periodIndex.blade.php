@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if(isset($periods))
        <div class="text-center m-3">
            <h3>Periods.</h3>    
        </div> 
        <div class="card-columns">
            @foreach($periods as $period)
                <div class="card {{ $period->status == 0 ? 'border-secondary' :  'border-primary' }} " style="max-width: 18rem;">
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
                      
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <a href=" {{ route('period.show', $period->id) }} " class="btn btn-outline-info btn-block">Details</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            @if ($period->status == 1)
                                <div class="col-md-6 col-sm-6 col-6">
                                    <a href="#" class="btn btn-outline-secondary btn-block">Income</a>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6">
                                    <a href=" {{ route('period.expense.index', $period->id) }} " class="btn btn-outline-secondary btn-block">Expense</a>
                                </div>  
                            @endif
                        </div> 
                    
                    </div>
                </div>
            @endforeach
        </div>
        @else
            <div class="text-center m-3">
                    <h3>There's no data.</h3>    
            </div>
        @endif
    </div>
</div>
    
@endsection