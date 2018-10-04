<?php
/**
 * Created by PhpStorm.
 * User: Rambo
 * Date: 2018/9/30
 * Time: 21:42
 */

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class StudentController extends Controller
{
    //学生列表页
    public function index(){
        $students = Student::paginate(5);
        return view('student/index',[
            'students' => $students,
        ]);
    }

    //增加学生信息页面
    public function create(Request $request){
        $data = $request -> input('Student');
        if($request->isMethod('POST')){

            //控制器验证数据
            $this -> validate($request,[
                'Student.name' => 'required|min:2|max:20',
                'Student.age' => 'required|integer',
                'Student.sex' => 'required|integer',
            ]);
//            $this->validate($request, $this->rule());
//
//            $request->flashOnly(['name', 'age','sex']);

//            //模型验证
//            $validator = \Validator::make($request->input(),[
//                'Student.name'=> 'required|min:2|max:20',
//                'Student.age' => 'required|integer',
//                'Student.sex' => 'required|integer',
//            ]);
//            if($validator->fails()){
//                return redirect()->back()->withErrors($validator);
//            }

            if(Student::create($data)){
//                Session::put('success');
                return redirect('student/index')->with('success','添加成功');
            }else{
                return redirect()->back()->with('error','添加失败');
            }
        }
        return view('student.create');
    }

    //增加学生信息操作
    public function save(Request $request){
        $data = $request->input('Student');
        //通过模型新增数据
        $student = new Student();
        $student -> name = $data['name'];
        $student -> age = $data['age'];
        $student -> sex = $data['sex'];
        if($student -> save()){
            return redirect('student/index');
        }else{
            return redirect()->back();
        }
//
//        var_dump($data);
    }

    //更新数据
    public function update(Request $request,$id){
        $student = Student::find($id);
        if($request->isMethod('post')){
            $data = $request->input('Student');
            $student -> name = $data['name'];
            $student -> age = $data['age'];
            $student -> sex = $data['sex'];
            if($student -> save()){
                return redirect('student/index');
            }else{
                return redirect('student/update');
            }
        }
        return view('student.update',[
            'student' => $student
        ]);
    }

    //详情
    public function detail(Request $request ,$id){
        $student = Student::find($id);

        return view('student/detail',[
            'student'=> $student
        ]);
    }

    //删除
    public function delete(Request $request ,$id){
        $student = Student::find($id);
        if($student->delete()){
            return redirect('student/index');
        }else{
            return redirect('index/index');
        }
    }


}