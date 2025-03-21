@extends('navbar.navbar')

@section('title')

@section('content')
    <style>
        @keyframes subtleMove {
            0% {
                transform: translateX(-5px);
            }

            50% {
                transform: translateX(5px);
            }

            100% {
                transform: translateX(-5px);
            }
        }

        .animate-subtle-move {
            animation: subtleMove 1s ease-in-out infinite;
        }
    </style>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-10 text-center">
            <h1 class="fw-bold animate-subtle-move" style="font-size: 7rem;">
                <a href="{{ url('/') }}" class="no-underline text-secondary">Welcome Admin</a>
            </h1>
        </div>
    </div>

@endsection
