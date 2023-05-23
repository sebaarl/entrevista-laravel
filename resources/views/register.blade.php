@extends('layouts.plantilla')

@section('content')
    <div class="max-w-2xl mx-auto container">
        <div
            class="bg-white shadow-md border border-gray-200 rounded-lg 
    max-w-lg p-4 sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700 form-container">
            @if (session()->has('error'))
                <x-alert type="danger"
                    class="ms-4">
                    <x-slot name="title">
                        {{ session()->get('error') }}
                    </x-slot>
                </x-alert>
            @endif
            <form class="space-y-6"
                action="{{ route('validar-registro') }}"
                method="POST">
                @csrf
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">Crea tu cuenta</h3>
                <div>
                    <label for="email"
                        class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300
                        @error('email') text-red-500 @enderror">Correo
                        electrónico</label>
                    <input type="email"
                        name="email"
                        id="email"
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
                    <label for="name"
                        class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300
                        @error('name') text-red-500 @enderror">Nombre</label>
                    <input type="text"
                        name="name"
                        id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 
                        dark:border-gray-500 dark:placeholder-gray-400 dark:text-white
                        @error('name') border-red-500 @enderror"
                        placeholder="Homero Simpson">
                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="password"
                        class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300
                        @error('password') text-red-500 @enderror">Contraseña</label>
                    <input type="password"
                        name="password"
                        id="password"
                        placeholder="•••••••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 
                        dark:border-gray-500 dark:placeholder-gray-400 dark:text-white
                        @error('password') border-red-500 @enderror">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label for=""
                        class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Colores
                        favoritos</label>
                    <input type="color"
                        name="color1"
                        id="color1"
                        placeholder=""
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                        dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white
                        @error('color1') border-red-500 @enderror">
                    @error('color1')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                    <input type="color"
                        name="color2"
                        id="color2"
                        placeholder=""
                        class="mt-6 bg-gray-50 border border-gray-300 text-gray-900 
                        sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block 
                        w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white
                        @error('color2') border-red-500 @enderror">
                    @error('color2')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                    <input type="color"
                        name="color3"
                        id="color3"
                        placeholder=""
                        class="mt-6 bg-gray-50 border border-gray-300 text-gray-900 
                        sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 
                        block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 
                        dark:text-white
                        @error('color3') border-red-500 @enderror">
                    @error('color3')
                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
            focus:ring-blue-300 font-medium rounded-lg 
            text-sm px-5 py-2.5 text-center dark:bg-blue-600 
            dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Registarte
                </button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Ya estás registrado? <a href="{{ route('login') }}"
                        class="text-blue-700 hover:underline dark:text-blue-500"> Inicia sesión aquí</a>
                </div>
            </form>
        </div>
    </div>
@endsection
