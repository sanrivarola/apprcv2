<div class="bg-white bg-opacity-95 backdrop-blur-md p-10 rounded-2xl shadow-xl max-w-md w-full">

  @if(session('status'))
    <div class="mb-6 text-center text-sm text-green-700 bg-green-100 px-4 py-2 rounded">
      {{ session('status') }}
    </div>
  @endif

  @error('email')
    <div class="mb-6 text-sm text-red-700 bg-red-100 px-4 py-2 rounded">
      {{ $message }}
    </div>
  @enderror

  <form wire:submit.prevent="sendLink" class="space-y-6">
    <div>
      <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
        Email
      </label>
      <input
        wire:model.lazy="email"
        id="email"
        type="email"
        required
        placeholder="tu@correo.com"
        class="block w-full border-0 border-b-2 border-gray-300 focus:border-indigo-500 
               bg-transparent px-4 py-2 placeholder-gray-400 focus:outline-none text-gray-900 text-sm"
      />
    </div>

    <button
      type="submit"
      class="w-full py-3 bg-white border border-[#44803F] text-[#44803F] font-medium rounded-md text-sm hover:bg-[#f9fdf9] transition"
    >
      Enviar enlace de recuperación
    </button>
  </form>

  <div class="mt-6 text-center">
    <a
      href="{{ route('login') }}"
      class="inline-block py-2 px-4 text-sm font-medium text-[#44803F] border border-[#44803F] rounded-md hover:bg-[#f9fdf9] transition"
    >
      Volver al login
    </a>
  </div>
</div>
