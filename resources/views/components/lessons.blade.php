@props(['canAccess', 'course'])

@foreach($course->lessons as $key => $lesson)

    @if($canAccess)
        <li class="flex items-center justify-between">
            <a href="{{ route('lesson.show', [$course->slug, $lesson->slug]) }}" class="flex items-center gap-2 hover:text-indigo-600">
                <span class="text-sm">{{ $key + 1 }}.</span> {{ $lesson->title }}
            </a>
            <span>{{ $lesson->duration }}</span>
        </li>
    @else
        <li class="flex items-center justify-between">
            <a href="#" class="flex items-center gap-2 hover:text-indigo-600">
                <span class="text-sm">🔒 {{ $key + 1 }}.</span> {{ $lesson->title }}
            </a>
            <span>{{ $lesson->duration }}</span>
        </li>
    @endif

@endforeach
