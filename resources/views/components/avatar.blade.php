@if (auth()->user()->profile?->avatar)
    <img src="{{ Storage::url(auth()->user()->profile->avatar) }}"
         alt="{{ auth()->user()->firstName }}"
         class="w-8 h-8 rounded-full object-cover border border-gray-300">
@else
    <div class="w-10 h-10 flex items-center justify-center text-white font-semibold rounded-full {{ auth()->user()->avatar_color }}">
        {{ auth()->user()->initials }}
    </div>
@endif
