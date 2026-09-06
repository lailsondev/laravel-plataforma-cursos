@props(['action', 'course', 'id'])
@if($action)
    <a
        href="{{ route('lesson.show', [$course->slug, $action]) }}"
        @class([
            "px-4 py-2 rounded-lg transition",
            "bg-gray-200 text-gray-800 hover:bg-gray-300" => $id === 'previous',
            "bg-blue-600 text-white hover:bg-blue-700" => $id === 'next'
        ])
    >
        @if($id === 'previous')
            <span>&larr;</span>
        @endif
        Aula: {{ Str::limit($action->title, 15) }}
        @if($id === 'next')
            <span>&rarr;</span>
        @endif
    </a>
@else
    <span></span>
@endif

