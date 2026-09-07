<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class LessonService
{
    public function getLessonData(Course $course, Lesson $lesson): array
    {
        $lesson->load([
            'comments' => fn ($q) => $q->latest('id'),
            'comments.user',
            'comments.replies.user',
        ]);

        $course->load('lessons');

        $canComment = Auth::user()?->can('comment', $lesson);

        $previous = $course->lessons()
            ->where('id', '<', $lesson->id)
            ->latest('id')
            ->first();

        $next = $course->lessons()
            ->where('id', '>', $lesson->id)
            ->oldest('id')
            ->first();

        return compact('lesson', 'course', 'previous', 'next', 'canComment');
    }
}
