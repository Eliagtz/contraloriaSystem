@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <strong>New Expense</strong>
                </div>
                <div class="card-body">
                    @if(session()->has('Success'))
                        <div class="col-md-12 py-4">
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('Success') }}
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('expense.store') }}" method="POST">

                        @csrf
                        <input type="hidden" name="period_id" value="{{ $period->id }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="quantity">Total $:</label>
                                <div class="col-md-9">
                                <input class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" id="quantity" type="float" name="quantity" placeholder="Expense quantity.." value="{{ isset($expense) ? $expense->quantity : old('quantity') }}">
                                        <span class="help-block">Please enter the expense quantity</span>
                                        @if ($errors->has('quantity'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('quantity') }}</strong>
                                        </span>
                                        @endif
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="concept">Concept:</label>
                                <div class="col-md-9">
                                    <input class="form-control{{ $errors->has('concept') ? ' is-invalid' : '' }}" id="concept" type="string" name="concept" placeholder="Concept.." value="{{ isset($expense) ? $expense->concept : old('concept') }}">
                                        <span class="help-block">Please enter the expense concept</span>
                                        @if ($errors->has('concept'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('concept') }}</strong>
                                        </span>
                                        @endif
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="movementType" class="col-md-3 col-form-label">Movement Type:</label>
                            <div class="col-md-9">
                                <select name="movement_type" class="custom-select custom-select mb-3 {{ $errors->has('movement_type') ? ' is-invalid' : '' }}">
                                    <option value="0" selected>Cash</option>
                                    <option value="1">Card</option>
                                    <option value="2">Check</option>
                                </select>
                                @if ($errors->has('movement_type'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('movement_type') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <button class="btn btn-block btn-danger" type="reset">Reset</button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-block btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection