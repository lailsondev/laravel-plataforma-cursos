@php use Illuminate\Support\Str; @endphp
@extends('layout')

@section('fullwidth')

    <div class="w-full bg-black">
        <div class="aspect-video max-w-screen-2xl mx-auto">
            <iframe
                class="w-full h-full"
                src="https://www.youtube.com/embed/rqtZ0EmciJ8?si=AQgOSlbeJHR_fPUP"
                title="Aula"
                frameborder="0"
                allowfullscreen
            ></iframe>
        </div>
    </div>

    <!-- Navegação de aulas -->
    <div class="w-full bg-white border-t border-b">
        <div class="max-w-screen-2xl mx-auto flex justify-between items-center px-4 py-4">
            <x-navigate-between-lessons :course="$course" :action="$previous" id="previous" />
            <x-navigate-between-lessons :course="$course" :action="$next" id="next" />
        </div>
    </div>
@endsection

@section('content')
    <div class="md:col-span-2 space-y-6">
        <div class="bg-white rounded-2xl shadow p-6">
            <h1 class="text-2xl font-semibold mb-2">Aula: {{ $lesson->title }}</h1>
            <p class="text-gray-700">
                {{ $lesson->description }}
            </p>
        </div>

        <!-- Comentários -->
        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="text-lg font-semibold mb-4">Comentários ({{ $lesson->comments->count() }})</h2>

            <!-- Formulário -->
            @can('comment')
            <form class="mb-4" method="POST" action="{{ route('comment.store', $lesson) }}">
                @csrf
                <textarea name="comment"
                    class="w-full border rounded-lg p-3"
                    rows="3"
                    placeholder="Deixe seu comentário..."
                ></textarea>
                <button type="submit" class="cursor-pointer mt-2 px-4 py-2 bg-indigo-600 text-white rounded-lg">
                    Enviar
                </button>
            </form>
            @endcan

            <!-- Lista de comentários -->
            @foreach($lesson->comments as $comment)
                <div class="space-y-6">
                    <!-- Comentário principal -->
                    <div class="border-b pb-4">
                        <p class="font-semibold">{{ $comment->user->fullName }} <small title="{{ $comment->created_at->translatedFormat('d \d\e F \d\e Y \à\s H:i') }}">{{ $comment->created_at->diffForHumans() }}</small></p>
                        <p class="text-gray-600 mb-2">{{ $comment->content }}</p>

                        <!-- Botão responder -->
                        <button class="text-sm text-indigo-600 hover:underline">Responder</button>

                        <!-- Respostas -->
                        @foreach ($comment->replies as $reply)
                            <div class="ml-6 mt-3 space-y-3 border-l border-gray-200 pl-4">
                                <div>
                                    <p class="font-semibold text-sm">{{ $reply->user->fullName }} <small title="{{ $reply->created_at->translatedFormat('d \d\e F \d\e Y \à\s H:i') }}">{{ $reply->created_at->diffForHumans() }}</small></p>
                                    <p class="text-gray-600 text-sm">{{ $reply->content }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Sidebar -->
    <aside>
        <div class="bg-white rounded-2xl shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Aulas do Curso</h3>
            <x-course-lessons :course="$course" :currentLesson="$lesson" />
        </div>
    </aside>

@endsection
