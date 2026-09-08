@auth
    <div x-data="{open: false}" class="relative">
        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none cursor-pointer">
            {{-- Avatar --}}
            <x-avatar />

            {{-- Nome --}}
            <span class="text-sm font-medium text-gray-700">
        {{ auth()->user()->fullName }}
      </span>

            {{-- Ícone seta --}}
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-4 w-4 text-gray-500"
                 viewBox="0 0 20 20"
                 fill="currentColor">
                <path fill-rule="evenodd"
                      d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.25a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                      clip-rule="evenodd" />
            </svg>
        </button>

        {{-- Dropdown --}}
        <div
            x-show="open"
            x-transition
            @click.away="open = false"
            x-cloak
            class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg py-2 z-50">
            <a href="{{ route('profile.edit') }}"
               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Perfil
            </a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 cursor-pointer">
                    Sair
                </button>
            </form>
        </div>
    </div>
@else
    <a href="{{ route('login.index') }}" class="hover:text-indigo-600">Entrar</a>
    <a href="{{ route('user.create') }}" class="hover:text-indigo-600">Cadastrar</a>
@endauth
