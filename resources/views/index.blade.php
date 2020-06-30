@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Welcome To Lab Survey</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            <div class="row-12">
                                <img src={{ asset('images/banner_1.png') }} alt="">
                            </div>
                            
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
