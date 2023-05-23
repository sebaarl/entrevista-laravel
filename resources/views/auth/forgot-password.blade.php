@extends('layouts.plantilla')

@section('title', 'Olvidaste tu contraseña?')

@section('content')
    <div class="w-full mx-auto container">
        <div
            class="bg-white shadow-md border border-gray-200 rounded-lg 
    max-w-lg p-4 sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700 form-container">
            <form class="space-y-6"
                action="{{ route('password-email') }}"
                method="POST">
                @csrf
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">Recuperar contraseña</h3>
                <div>
                    <label for="email"
                        class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300
                    @error('email') text-red-500 @enderror">Correo
                        electrónico</label>
                    <input type="email"
                        name="email"
                        id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg 
                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                    dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white
                    @error('email') border-red-500 @enderror"
                        placeholder="nombre@ejemplo.com"
                        value="{{ old('email') }}"
                        autocomplete="email">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
            focus:ring-blue-300 font-medium rounded-lg 
            text-sm px-5 py-2.5 text-center dark:bg-blue-600 
            dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Enviar link
                </button>
            </form>
        </div>
    </div>
@endsection
