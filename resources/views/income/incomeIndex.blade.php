@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        @if (count($period->incomes)>0)
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4"><a class="btn btn-outline-danger btn-block btn-lg" href="{{ URL::previous() }}" role="button">Back</a></div>
                        @can('pass')
                            <div class="col-4"><a class="btn btn-outline-primary btn-block btn-lg" href="{{ route('income.create', $period->id) }}" role="button">New income</a></div>
                        @endcan
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
                                @foreach ($period->incomes as $income)
                                    <tr>
                                        <td>{{ $income->id }}</td>
                                        <td>{{ $income->concept }}</td>
                                        <td>{{ $income->created_at }}</td>
                                        <td><a href=" {{ route('income.show', $income->id) }} " class="btn btn-outline-dark"><i class="icon-list"></i></a></td>
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
                <p class="lead">Do you want add new income?</p>
                <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{ route('income.create', $period->id) }}" role="button">Create</a>
                </p>
            </div>
        @endif
    </div>
</div>
    

@endsection