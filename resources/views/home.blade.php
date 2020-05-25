@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card border-info mb-3">
                <div class="card-header bg-dark"><h4 class="font-weight-bold text-light">Dashboard</h4></div>
                <div class="card-body text-info">
                    @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                    <h5 class="card-title font-weight-bold text-dark">WELCOME !!!&nbsp;&nbsp;<i class="fas fa-glass-cheers"></i></h5>
                    <p class="card-text font-weight-bold">This is Everest Fitness User Management System</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
