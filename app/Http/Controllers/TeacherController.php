<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function index(){
        $teachers = Teacher::latest() -> get();
    	return view('teachers.index', [
            'all_teacher' => $teachers
        ]);
    }


    public function create(){
    	return view('teachers.create');
    }


    public function store(Request $request){
        /**
         * Form Validation:
         */
        $this -> validate($request, [
            'name' => 'required',
            'uname' => 'required | min:3 | max:20 | unique:teachers',
            'email' => 'required | unique:teachers',
            'cell' => 'unique:teachers',
            'password' => 'required | min:6',
        ]);

        /**
         * Unique File Name Genarate:
         */
        $unique_name = '';
        if ($request -> hasFile('photo')) {
            $file = $request -> file('photo');
            $unique_name = md5(time(). rand()) . '.' . $file -> getClientOriginalExtension();
            $file -> move(public_path('media/teachers'), $unique_name);
        }


        /**
         * Data Insert:
         */
        Teacher::create([
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
        $show = Teacher::find($id);
    	return view('teachers.show', [
            'profile' => $show
        ]);
    }


    public function delete($id){
        $delete = Teacher::find($id);
        $delete -> delete();

        if (file_exists('media/teachers/' . $delete -> photo)) {
            unlink('media/teachers/' . $delete -> photo);
        }

        return redirect('/teachers/');
    }


    public function edit($id){
        $edit = Teacher::find($id);
        return view('teachers.edit', [
            'edit_data' => $edit
        ]);
    }


    public function update(Request $request, $id){

        if ($request -> hasFile('new_photo')) {
            
            $file = $request -> file('new_photo');
            $unique_name = md5(time().rand()) . '.' . $file -> getClientOriginalExtension();
            $file -> move(public_path('media/teachers'), $unique_name);

            if( file_exists('media/teachers/' . $request -> old_photo) ){
                unlink('media/teachers/' . $request -> old_photo);
            }
        }else{
            $unique_name = $request -> old_photo;
        }


        $update_data = Teacher::find($id);
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
