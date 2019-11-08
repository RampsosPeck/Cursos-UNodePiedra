<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Unopicursos\Category;
use Unopicursos\Course;
use Unopicursos\Goal;
use Unopicursos\Level;
use Unopicursos\Requirement;
use Unopicursos\Role;
use Unopicursos\Student;
use Unopicursos\Teacher;
use Unopicursos\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        Storage::deleteDirectory('courses');
        Storage::deleteDirectory('users');

        Storage::makeDirectory('courses');
        Storage::makeDirectory('users');

        factory(Role::class, 1)->create(['name' => 'admin']);
        factory(Role::class, 1)->create(['name' => 'teacher']);
        factory(Role::class, 1)->create(['name' => 'student']);

        factory(User::class, 1)->create([
        	'name' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('secret'),
        	'role_id' => Role::ADMIN,
        ])
        ->each(function(User $u){
        	factory(Student::class, 1)->create(['user_id'=>$u->id]);
        });

        factory(User::class, 50)->create()
        	->each(function (User $u){
        		factory(Student::class, 1)->create(['user_id' => $u->id]);
        	});
        factory(User::class, 10)->create()
        	->each(function (User $u){
        		factory(Student::class, 1)->create(['user_id' => $u->id]);
        		factory(Teacher::class, 1)->create(['user_id' => $u->id]);
        	});

        factory(Level::class, 1)->create(['name' => 'Aprendiz']);
        factory(Level::class, 1)->create(['name' => 'Intermedio']);
        factory(Level::class, 1)->create(['name' => 'Avanzado']);
        factory(Category::class, 5)->create();

        factory(Course::class, 50)
            ->create()
            ->each(function (Course $c){
                $c->goals()->saveMany(factory(Goal::class, 2)->create());
                $c->requirements()->saveMany(factory(Requirement::class, 4)->create());
            });
    }
}
