@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-3">
        <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-9">
            <div class="row pb-3">
                <div class="col-7 col-sm-7 col-md-8 col-lg-9 col-xl-10"></div>
                <div class="col-5 col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    @if ($flag)
                        <a href="{{ route('user.index', 0) }}" class="btn btn-secondary">Show Inactives</a>
                    @else
                        <a href="{{ route('user.index', 1) }}" class="btn btn-primary">Show Actives</a>
                    @endif
                </div>
            </div>
            @if (isset($users))
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->description }}</td>
                                    @if ($user->status)
                                        <td><span class="badge badge-pill badge-success">Active</span></td>
                                    @else
                                        <td><span class="badge badge-pill badge-secondary">Inactive</span></td>
                                    @endif
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