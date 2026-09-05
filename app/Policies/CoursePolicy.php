<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;

class CoursePolicy
{
    public function access(User $user, Course $course): bool
    {
        return $user->purchases()
            ->where('course_id', $course->id)
            ->where('payment_status', 'paid')
            ->exists();
    }
}
