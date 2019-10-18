@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
        @if(Auth::user()->jabatan == 'admin')
                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                You are logged in {{ Auth::user()->jabatan }}!<br>
                     Hello {{ Auth::user()->name }} <br>
                     Email Anda {{ Auth::user()->email }} <br>
                </div>
        @else
           <div class="card-body">
                  You are logged in {{ Auth::user()->jabatan }}!<br>
                     Hello {{ Auth::user()->name }} <br>
                     Email Anda {{ Auth::user()->email }} <br>
                </div>
        @endif
            </div>
        </div>
    </div>
</div>
@endsection
