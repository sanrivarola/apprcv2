<div class="relative flex items-center justify-center min-h-screen px-4 bg-[#44803F]">
    <div class="bg-white bg-opacity-90 p-8 rounded-lg shadow-lg w-full">
  
      @if(session('status'))
        <div class="mb-4 text-sm text-green-700 bg-green-100 px-4 py-2 rounded">
          {{ session('status') }}
        </div>
      @endif
  
      @error('email')
        <div class="mb-4 text-sm text-red-700 bg-red-100 px-4 py-2 rounded">
          {{ $message }}
        </div>
      @enderror
  
      <form wire:submit.prevent="authenticate" class="space-y-6">
        <div>
          <label for="name" class="sr-only">Nombre de usuario</label>
          <input
            wire:model.lazy="name"
            id="name"
            type="text"
            required
            autofocus
            placeholder="Nombre de usuario"
            class="block w-full border-b border-gray-300 bg-transparent px-4 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:border-[#44803F] text-sm"
          />
        </div>
  
        <div>
          <label for="password" class="sr-only">Contraseña</label>
          <input
            wire:model.lazy="password"
            id="password"
            type="password"
            required
            placeholder="Contraseña"
            class="block w-full border-b border-gray-300 bg-transparent px-4 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:border-[#44803F] text-sm"
          />
        </div>
  
        <div class="flex items-center justify-between text-sm">
          <label class="flex items-center space-x-2">
            <input
              type="checkbox"
              wire:model.lazy="remember"
              class="h-4 w-4 text-[#44803F] border-gray-300 focus:ring-[#44803F]"
            />
            <span class="text-gray-700 txt-small">Recordarme</span>
          </label>
          <a
            href="{{ route('password.request') }}"
            class="text-[#44803F] hover:underline"
          >
            ¿Olvidaste tu contraseña?
          </a>
        </div>
  
        <button
          type="submit"
          class="w-full py-3 bg-white border border-[#44803F] text-[#44803F] font-medium rounded-md text-sm hover:bg-[#f9fdf9] transition"
        >
          Iniciar sesión
        </button>
      </form>
  
    </div>
  </div>
  