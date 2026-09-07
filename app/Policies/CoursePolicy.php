<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;

class CoursePolicy
{
    public function access(?User $user, Course $course, ?Lesson $lesson = null): bool
    {
        $isFree = $lesson?->free;

        if (! $user) {
            return $isFree;
        }

        return $user->purchases()
            ->where('course_id', $course->id)
            ->where('payment_status', 'paid')
            ->exists() || $isFree;
    }
}
