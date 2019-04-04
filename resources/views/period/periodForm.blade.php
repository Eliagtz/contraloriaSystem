@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <strong>Add New Period</strong>
                    </div>
                    <div class="card-body">
                        @if(session()->has('Success'))
                        <div class="col-md-12 py-4">
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('Success') }}
                            </div>
                            </div>
                        @endif
                        <form action="{{ route('period.store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="start">Beginning</label>
                                <div class="col-md-9">
                                    <input class="form-control{{ $errors->has('start') ? ' is-invalid' : '' }}" id="start" type="date" name="start" placeholder="Period begins.." value="{{ old('start') }}">
                                    <span class="help-block">Please enter the beginning of period</span>
                                    @if ($errors->has('start'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="end">Ending</label>
                                <div class="col-md-9">
                                    <input class="form-control{{ $errors->has('end') ? ' is-invalid' : '' }}" id="end" type="date" name="end" placeholder="Period ending.." value="{{ old('end') }}">
                                    <span class="help-block">Please enter the ending of period</span>
                                    @if ($errors->has('end'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="description">Description</label>
                                <div class="col-md-9">
                                <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="description" cols="5" rows="5" style="resize: none;">{{ old('description') }}</textarea>
                                    <span class="help-block">Please enter a little description about the period</span>
                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="initial_fund">Initial fund</label>
                                <div class="col-md-9">
                                    <input class="form-control{{ $errors->has('initial_fund') ? ' is-invalid' : '' }}" id="initial_fund" type="number" name="initial_fund" placeholder="$ Initial fund.." value="{{ old('initial_fund') }}">
                                    <span class="help-block">Please enter the beginning fund of period</span>
                                    @if ($errors->has('initial_fund'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('initial_fund') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="final_fund">Final fund</label>
                                <div class="col-md-9">
                                    <input class="form-control{{ $errors->has('final_fund') ? ' is-invalid' : '' }}" id="final_fund" type="number" name="final_fund" placeholder="$ Final fund.." value="{{ old('final_fund') }}">
                                    <span class="help-block">Please enter the ending fund of period</span>
                                    @if ($errors->has('final_fund'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('final_fund') }}</strong>
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