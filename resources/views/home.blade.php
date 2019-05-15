@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->hasRole('Administrator'))
                    <div>You are logged in like administrator!</div>
                    @else 
                    <div>You are logged in like simple user!</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
