<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('dashboard') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            Sign in to your account
        </h2>

        @if (Route::has('register'))
            <p class="mt-2 text-sm text-center text-gray-600 leading-5">
                Or
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    create a new account
                </a>
            </p>
        @endif
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            
            {{-- Mensaje general de error: credenciales incorrectas o cuenta desactivada --}}
            @error('email')
                <div class="mb-4 text-sm text-red-600 bg-red-100 border border-red-300 rounded p-3">
                    {{ $message }}
                </div>
            @enderror

            <form wire:submit.prevent="authenticate">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email address
                    </label>
                    <div class="mt-1">
                        <input wire:model.lazy="email" id="email" name="email" type="email" required autofocus
                        class="appearance-none block w-full px-3 py-2 rounded-md placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm 
                        border @error('email') border-red-500 @else @enderror"
                        />
                    </div>
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <div class="mt-1">
                        <input wire:model.lazy="password" id="password" type="password" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400
                            focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password') @enderror" />
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input wire:model.lazy="remember" id="remember" type="checkbox"
                            class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                        <label for="remember" class="ml-2 block text-sm leading-5 text-gray-900">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-500">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white
                        bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>