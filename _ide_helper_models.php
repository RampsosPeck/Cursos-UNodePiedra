<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Unopicursos{
/**
 * Unopicursos\User
 *
 * @property int $id
 * @property int $role_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $picture
 * @property string|null $stripe_id
 * @property string|null $card_brand
 * @property string|null $card_last_four
 * @property string|null $trial_ends_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\User whereCardBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\User whereCardLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\User wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\User whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\User whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace Unopicursos{
/**
 * Unopicursos\Level
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Level newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Level newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Level query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Level whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Level whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Level whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Level whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Level whereUpdatedAt($value)
 */
	class Level extends \Eloquent {}
}

namespace Unopicursos{
/**
 * Unopicursos\Student
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Student whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Student whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Student whereUserId($value)
 */
	class Student extends \Eloquent {}
}

namespace Unopicursos{
/**
 * Unopicursos\Course
 *
 * @property int $id
 * @property int $teacher_id
 * @property int $category_id
 * @property int $level_id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property string|null $picture
 * @property string $status
 * @property bool $previous_approved
 * @property bool $previous_rejected
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course whereLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course wherePreviousApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course wherePreviousRejected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Course whereUpdatedAt($value)
 */
	class Course extends \Eloquent {}
}

namespace Unopicursos{
/**
 * Unopicursos\Role
 *
 * @property int $id
 * @property string $name Nombre del rol de usuario
 * @property string $descriptiom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Role whereDescriptiom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace Unopicursos{
/**
 * Unopicursos\Goal
 *
 * @property int $id
 * @property int $cource_id
 * @property string $goal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Goal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Goal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Goal query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Goal whereCourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Goal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Goal whereGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Goal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Goal whereUpdatedAt($value)
 */
	class Goal extends \Eloquent {}
}

namespace Unopicursos{
/**
 * Unopicursos\Teacher
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $title
 * @property string|null $biography
 * @property string|null $website_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Teacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Teacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Teacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Teacher whereBiography($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Teacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Teacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Teacher whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Teacher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Teacher whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Teacher whereWebsiteUrl($value)
 */
	class Teacher extends \Eloquent {}
}

namespace Unopicursos{
/**
 * Unopicursos\Requirement
 *
 * @property int $id
 * @property int $cource_id
 * @property string $requirement
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Requirement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Requirement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Requirement query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Requirement whereCourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Requirement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Requirement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Requirement whereRequirement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Requirement whereUpdatedAt($value)
 */
	class Requirement extends \Eloquent {}
}

namespace Unopicursos{
/**
 * Unopicursos\Review
 *
 * @property int $id
 * @property int $cource_id
 * @property int $user_id
 * @property float $rating
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Review whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Review whereCourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Review whereUserId($value)
 */
	class Review extends \Eloquent {}
}

namespace Unopicursos{
/**
 * Unopicursos\Category
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Unopicursos\Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

