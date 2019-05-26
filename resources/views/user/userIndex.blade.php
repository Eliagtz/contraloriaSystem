@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-3">
        <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-9">
            @if (isset($users))
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $users->render() !!}
                </div>
            @else
                <h1 class="text-center">There is not data</h1>
            @endif
            
        </div>
    </div>
</div>

@endsection