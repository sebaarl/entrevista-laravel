@extends('layouts.plantilla')

@section('title', 'Reseteo de contraseña')

@section('content')
    <div class="max-w-2xl mx-auto container">
        <div
            class="bg-white shadow-md border border-gray-200 rounded-lg 
max-w-lg p-4 sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700 form-container">
            <form class="space-y-6"
                method="POST"
                action="{{ route('password-update') }}">
                @csrf

                <input type="hidden"
                    name="token"
                    value="{{ $token }}">

                <h3 class="text-xl font-medium text-gray-900 dark:text-white">Crea tu nueva contraseña</h3>
                <div>
                    <label for="email"
                        class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300
                        @error('email') text-red-500 @enderror">Correo
                        electrónico</label>
                    <input id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 
                        dark:border-gray-500 dark:placeholder-gray-400 dark:text-white
                        @error('email') border-red-500 @enderror"
                        placeholder="nombre@ejemplo.com">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="password"
                        class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300
                        @error('password') text-red-500 @enderror">Nueva
                        contraseña</label>
                    <input id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 
                        dark:border-gray-500 dark:placeholder-gray-400 dark:text-white
                        @error('password') border-red-500 @enderror"
                        placeholder="*******">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation"
                        class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300
                        @error('confirmed') text-red-500 @enderror">Confirmar
                        nueva
                        contraseña</label>
                    <input id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg 
                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 
                            dark:border-gray-500 dark:placeholder-gray-400 dark:text-white
                            @error('confirmed') border-red-500 @enderror"
                        placeholder="*******">
                    @error('confirmed')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
        focus:ring-blue-300 font-medium rounded-lg 
        text-sm px-5 py-2.5 text-center dark:bg-blue-600 
        dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Restablecer contraseña
                </button>
            </form>
        </div>
    </div>
@endsection
