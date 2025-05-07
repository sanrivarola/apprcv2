@extends('layouts.guest')

@section('title', 'Restablecer contraseña')

<div class="sm:mx-auto sm:w-full sm:max-w-md">
    <a href="{{ route('login') }}">
        <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
    </a>

    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Restablecer contraseña
    </h2>
</div>

<div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white py-8 px-6 shadow sm:rounded-lg sm:px-10">

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">
                    Nueva contraseña
                </label>
                <input id="password" name="password" type="password" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                           placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                           focus:border-indigo-500 sm:text-sm">
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                    Confirmar nueva contraseña
                </label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                           placeholder-gray-400 focus:outline-none focus:ring-indigo-500
                           focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm
                           text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none
                           focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Guardar nueva contraseña
                </button>
            </div>
        </form>
    </div>
</div>
