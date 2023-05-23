@extends('layouts.plantilla')

@section('title', 'Inicio')

@section('content')
    <div>
        <div class="w-full max-w-sm bg-white border border-gray-200 
    rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 pt-10 home-container"
            style="background-color: {{ $colorBackground }}">
            <div class="flex flex-col items-center pb-10">
                <img class="mb-3 rounded-full shadow-lg"
                    src="{{ asset('images/smiley.png') }}"
                    alt="Bonnie image" />
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bienvenid@ {{ Auth::user()->name }}</h5>
                <h6 class="mb-1 text-sm font-medium text-gray-900 dark:text-white">{{ Auth::user()->email }}</h6>
                <span class="text-sm text-gray-500 dark:text-gray-400">Color actual : {{ $colorBackground }}</span>
            </div>
        </div>
    </div>
@endsection
