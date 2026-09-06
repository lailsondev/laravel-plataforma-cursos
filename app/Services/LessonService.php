<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Lesson;

class LessonService
{
    public function getLessonData(Course $course, Lesson $lesson)
    {
        $lesson->load([
            'comments.user', 'comments.replies.user'
        ]);

        $course->load('lessons');

        $previous = $course->lessons()
            ->where('id', '<', $lesson->id)
            ->latest('id')
            ->first();

        $next = $course->lessons()
            ->where('id', '>', $lesson->id)
            ->oldest('id')
            ->first();

        return compact('lesson', 'course', 'previous', 'next');
    }
}
