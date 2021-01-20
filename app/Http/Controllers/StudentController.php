<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function home(){
        return view('home');
    }

    // Index Method:
    public function index(){
        $students = Student::latest() -> get();
    	return view('students.index', [
            'all_student' => $students
        ]);
    }


    public function create(){
    	return view('students.create');
    }


    public function store(Request $request){
        /**
         * Form Validation:
         */
        $this -> validate($request, [
            'name' => 'required',
            'uname' => 'required | min:3 | max:20 | unique:students',
            'email' => 'required | unique:students',
            'cell' => 'unique:students',
            'password' => 'required | min:6',
        ]);

        /**
         * Unique File Name Genarate:
         */
        $unique_name = '';
        if ($request -> hasFile('photo')) {
            $file = $request -> file('photo');
            $unique_name = md5(time(). rand()) . '.' . $file -> getClientOriginalExtension();
            $file -> move(public_path('media/students'), $unique_name);
        }


        /**
         * Data Insert:
         */
        Student::create([
            'name' => $request -> name,
            'uname' => $request -> uname,
            'email' => $request -> email,
            'cell' => $request -> cell,
            'age' => $request -> age,
            'address' => $request -> address,
            'gender' => $request -> gender,
            'password' => password_hash($request -> password, PASSWORD_DEFAULT),
            'photo' => $unique_name
        ]);

        return redirect() -> back() -> with('success', 'Registration Successful ...');



    }


    public function show($id){
        $show = Student::find($id);
    	return view('students.show', [
            'profile' => $show
        ]);
    }


    public function delete($id){
        $delete = Student::find($id);
        $delete -> delete();

        if (file_exists('media/students/' . $delete -> photo)) {
            unlink('media/students/' . $delete -> photo);
        }

        return redirect('/students/');
    }


    public function edit($id){
        $edit = Student::find($id);
        return view('students.edit', [
            'edit_data' => $edit
        ]);
    }


    public function update(Request $request, $id){

        if ($request -> hasFile('new_photo')) {
            
            $file = $request -> file('new_photo');
            $unique_name = md5(time().rand()) . '.' . $file -> getClientOriginalExtension();
            $file -> move(public_path('media/students'), $unique_name);

            if( file_exists('media/students/' . $request -> old_photo) ){
                unlink('media/students/' . $request -> old_photo);
            }
        }else{
            $unique_name = $request -> old_photo;
        }


        $update_data = Student::find($id);
        $update_data -> name = $request -> name;
        $update_data -> email = $request -> email;
        $update_data -> cell = $request -> cell;
        $update_data -> uname = $request -> uname;
        $update_data -> age = $request -> age;
        $update_data -> address = $request -> address;
        $update_data -> gender = $request -> gender;
        $update_data -> photo = $unique_name;
        $update_data -> update();

        return redirect() -> back() -> with('success', 'Data Updated Successfully');
    }


}
