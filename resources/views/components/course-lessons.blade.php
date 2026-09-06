@props(['course', 'currentLesson'])
<ul class="space-y-2">
    @foreach($course->lessons as $key => $lesson)
        <li><a
            @class([
                'text-indigo-600 hover:underline',
                'bg-indigo-600 text-white' => $lesson->id === $currentLesson->id
            ])
                href="{{ route('lesson.show', [$course->slug, $lesson->slug]) }}" >{{ $key + 1 }}. {{ $lesson->title }}</a></li>
    @endforeach
</ul>
