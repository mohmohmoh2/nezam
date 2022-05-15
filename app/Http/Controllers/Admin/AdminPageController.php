<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\completedquiz;
use App\Models\courses;
use Illuminate\Http\Request;
use App\Models\instructors;
use App\Models\lectures;
use App\Models\quizs;

class AdminPageController extends Controller
{
    //
    public function index ()
    {
        # code...
        $instructor['instructors'] = instructors::select('id', 'instructorName', 'instructorImg', 'instructorDesc')
        ->get();

        $courses['courses'] = courses::select('id', 'img', 'courseName', 'shortDesc', 'courseLevel', 'instructor_id')
        ->get();

        $lectures['lectures'] = lectures::select('id', 'lecUrl', 'course_id');

        return view('admin.admin')->with($instructor)->with($courses)->with($lectures);
    }

    public function Instructor (Request $request)
    {
        # code...
        $data = $request->validate([
            'instructorName' => 'required',
            'instructorImg'  => 'required|image|mimes:png,jpg,jpeg',
            'instructorDesc'  => 'required',
        ]);
        $new_name = $data['instructorImg']->hashName();
        $request->instructorImg->move('uploads/instructors',$new_name);
        $data['instructorImg'] = $new_name;
        instructors::create($data);
        return redirect(route('admin'));
    }

    public function Courses (Request $request)
    {
        $data = $request->validate([
            'courseName' => 'required',
            'img'  => 'required|image|mimes:png,jpg,jpeg',
            'courseDesc'  => 'required',
            'shortDesc'  => 'required',
            'courseLevel'  => 'required',
            'instructor_id'  => 'required',
        ]);
        $new_name = $data['img']->hashName();
        $request->img->move('uploads/courses',$new_name);
        $data['img'] = $new_name;
        courses::create($data);
        //return redirect(route('admin'));
    }

    public function Lectures (Request $request)
    {
        $data = $request->validate([
            'lecName' => 'required',
            'lecUrl'  => 'required',
            'course_id'  => 'required',
        ]);
        lectures::create($data);
        return redirect(route('admin'));
    }

    public function quiz (Request $request)
    {
        $data = $request->validate([
            'question' => 'required',
            'ans1'  => 'required',
            'ans2'  => 'required',
            'ans3'  => 'required',
            'ans4'  => 'required',
            'lec_id'  => 'required',
        ]);

        $lecId = $data['lec_id'];
        $lectures['lectures'] = lectures::select('id')->where('lecName', $lecId)
        ->get();

        $data['lec_id'] = $lectures['lectures'][0]['id'];
        quizs::create($data);
        return redirect(route('admin'));
    }


    public function submit (Request $request)
    {
        $quizs['quizs'] = quizs::select('id', 'question', 'ans1', 'lec_id')->where('lec_id', $request['id'])
        ->get();
        $ch = [];
        $count = $request['cid'] -1;
        for ($i=1; $i <= $count; $i++) { 
            if (isset($request['ans'.$i])) {
                if ($request['ans'.$i] == $quizs['quizs'][$i-1]['ans1']) {
                    array_push($ch,"true");
                }else {
                    array_push($ch,"false");
                }
            }
        }
        if (in_array("false",$ch)) {
            setcookie('error', 'msg', time()+8);
            return back();
        }else {
            setcookie('succ', 'msg', time()+8);
            $completed['completed'] = completedquiz::select('id', 'user_id', 'lec_id')->where('lec_id', $request['id'])
            ->get();
            $arr = [];
            foreach ($completed['completed'] as $key => $value) {
                if ($value['user_id'] == auth()->user()->id) {
                    array_push($arr,"true");
                }
            }
            if (in_array("true",$arr)) {
                return back();
            }else {
                $qdata = [
                    'user_id' => auth()->user()->id,
                    'lec_id' => $request['id'],
                    'course_id' => $request['coid'],
                ];
                print_r($qdata);
                completedquiz::create($qdata);
                return back();
            }
            return back();
        }
    }
}
