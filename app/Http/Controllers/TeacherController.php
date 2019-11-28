<?php

namespace Unopicursos\Http\Controllers;

use Illuminate\Http\Request;
use Unopicursos\Course;
use Unopicursos\Mail\MessageToStudent;
use Unopicursos\Student;
use Unopicursos\User;

class TeacherController extends Controller
{
    public function courses () {
        $courses = Course::withCount(['students'])->with('category', 'reviews')
            ->whereTeacherId(auth()->user()->teacher->id)->paginate(12);
        return view('teachers.courses', compact('courses'));
    }

    public function students () {
        $students = Student::with('user', 'courses.reviews')
            ->whereHas('courses', function ($q) {
                $q->where('teacher_id', auth()->user()->teacher->id)->select('teacher_id', 'name')->withTrashed();
            })->get();

        $actions = 'students.datatables.actions';
        return \DataTables::of($students)->addColumn('actions', $actions)->rawColumns(['actions', 'courses_formatted'])->make(true);
    }

    public function sendMessageToStudent () {
        $info = \request('info');
        $data = [];
        parse_str($info, $data);
        $user = User::findOrFail($data['user_id']);
        try {
            \Mail::to($user)->send(new MessageToStudent( auth()->user()->name, $data['message']));
            $success = true;
        } catch (\Exception $exception) {
            $success = false;
        }
        return response()->json(['res' => $success]);
    }
}
