<div class="sm:mx-auto sm:w-full sm:max-w-md">
    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        ¿Olvidaste tu contraseña?
    </h2>

    @if (session('status'))
        <div class="mt-4 text-sm text-green-600">{{ session('status') }}</div>
    @endif

    <form wire:submit.prevent="sendLink" class="mt-6 bg-white py-6 px-4 shadow rounded">
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input wire:model="email" type="email" id="email" required autofocus
                   class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 text-sm shadow-sm focus:ring focus:ring-indigo-500 focus:border-indigo-500">
            @error('email')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
                class="mt-6 w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-500">
            Enviar enlace de recuperación
        </button>
    </form>
</div>
