@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        @if (count($period->expenses)>0)
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="row">
                        
                        <div class="col-md-4 col-lg-6 col-xl-8"></div>
                        @can('pass', Auth::user())
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2"><a class="btn btn-outline-primary btn-block btn-lg" href="{{ route('expense.create', $period->id) }}" role="button">New expense</a></div>
                        @else
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2"></div>
                        @endcan
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2"><a class="btn btn-outline-danger btn-block btn-lg" href="{{ URL::previous() }}" role="button">Back</a></div>
                    </div>
                    <br>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Concept</th>
                                    <th>Create at</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($period->expenses as $expense)
                                    <tr>
                                        <td>{{ $expense->id }}</td>
                                        <td>{{ $expense->concept }}</td>
                                        <td>{{ $expense->created_at }}</td>
                                        <td><a href=" {{ route('expense.show', $expense->id) }} " class="btn btn-outline-dark"><i class="icon-list"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="jumbotron">
                <h1 class="display-4">There's no data</h1>
                <p class="lead">Do you want add new expense?</p>
                <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{ route('expense.create', $period->id) }}" role="button">Create</a>
                </p>
            </div>
        @endif
    </div>
</div>
    

@endsection