@extends('layout')

@section('content')

    @foreach($courses as $course)
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4">
            <img src="{{ $course->image }}" class="rounded-xl mb-4" alt="{{ $course->slug }}">
            <h2 class="text-lg font-semibold mb-2">{{ $course->title }}</h2>
            <p class="text-gray-600 text-sm mb-4">
                {{ Str::limit($course->description, 70) }}
            </p>
            <div class="flex items-center justify-between">
                <span class="font-bold text-indigo-600">{{ Number::currency($course->price, 'BRL') }}</span>
                <a href="{{ route('course.show', $course->slug) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700">Ver mais</a>
            </div>
        </div>
    @endforeach
@endsection
