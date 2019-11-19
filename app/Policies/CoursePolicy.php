<?php

namespace Unopicursos\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Unopicursos\Course;
use Unopicursos\Role;
use Unopicursos\User;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the course.
     *
     * @param  \Unopicursos\User  $user
     * @param  \Unopicursos\Course  $course
     * @return mixed
     Si un usuario puede o no suscribirse a un curso*/
    public function opt_for_course (User $user, Course $course)
    {
        return ! $user->teacher || $user->teacher->id !== $course->teacher_id;
    }

    /**
     * Determine whether the user can create courses.
     *
     * @param  \Unopicursos\User  $user
     * @return mixed
     */
    public function subscribe (User $user)
    {
        return $user->role_id !== Role::ADMIN && ! $user->subscribed('main');
    }

    /**
     * Determine whether the user can update the course.
     *
     * @param  \Unopicursos\User  $user
     * @param  \Unopicursos\Course  $course
     * @return mixed
     */
    public function inscribe(User $user, Course $course)
    {
        return $course->students->contains($user->student->id);
    }

    /**
     * Determine whether the user can delete the course.
     *
     * @param  \Unopicursos\User  $user
     * @param  \Unopicursos\Course  $course
     * @return mixed
     */
    public function delete(User $user, Course $course)
    {
        //
    }

    /**
     * Determine whether the user can restore the course.
     *
     * @param  \Unopicursos\User  $user
     * @param  \Unopicursos\Course  $course
     * @return mixed
     */
    public function restore(User $user, Course $course)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the course.
     *
     * @param  \Unopicursos\User  $user
     * @param  \Unopicursos\Course  $course
     * @return mixed
     */
    public function forceDelete(User $user, Course $course)
    {
        //
    }
}
