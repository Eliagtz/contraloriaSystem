@extends('layouts.app')

@section('content')
 
<div class="card-body">
    <table class="table table-responsive-sm table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>User Id</th>
                <th>Start</th>
                <th>End</th>
                <th>Description</th>
                <th>Status</th>
                <th>Initial  fund </th>
                <th>Final fund</th>
            </tr>
        </thead>
        <tbody>
            @foreach($periods as $period)
            <tr>
                <td>{{ $period->id }}</td>
                <td>{{ $period->user_id }}</td>
                <td>{{ $period->start }}</td>
                <td>{{ $period->end }}</td>
                <td>{{ $period->description }}</td>
                <td>{{ $period->status }}</td>
                <td>{{ $period->initial_fund }}</td>
                <td>{{ $period->final_fund }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    

@endsection