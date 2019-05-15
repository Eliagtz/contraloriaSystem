@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        @if (count($period->expenses)>0)
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4"></div>
                        <div class="col-4"><a class="btn btn-outline-primary btn-block btn-lg" href="{{ route('expense.create') }}" role="button">New expense</a></div>
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
                                        <td><a href="#" class="btn btn-outline-dark"><i class="icon-list"></i></a></td>
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