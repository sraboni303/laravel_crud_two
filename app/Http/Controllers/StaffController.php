<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
     // Index Method:
    public function index(){
        $staff = Staff::latest() -> get();
    	return view('staff.index', [
            'all_staff' => $staff
        ]);
    }


    public function create(){
    	return view('staff.create');
    }


    public function store(Request $request){
        /**
         * Form Validation:
         */
        $this -> validate($request, [
            'name' => 'required',
            'uname' => 'required | min:3 | max:20 | unique:staff',
            'email' => 'required | unique:staff',
            'cell' => 'unique:staff',
            'password' => 'required | min:6',
        ]);

        /**
         * Unique File Name Genarate:
         */
        $unique_name = '';
        if ($request -> hasFile('photo')) {
            $file = $request -> file('photo');
            $unique_name = md5(time(). rand()) . '.' . $file -> getClientOriginalExtension();
            $file -> move(public_path('media/staff'), $unique_name);
        }


        /**
         * Data Insert:
         */
        Staff::create([
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
        $show = Staff::find($id);
    	return view('staff.show', [
            'profile' => $show
        ]);
    }


    public function delete($id){
        $delete = Staff::find($id);
        $delete -> delete();

        if (file_exists('public/media/staff/' . $delete -> photo)) {
            unlink('public/media/staff/' . $delete -> photo);
        }

        return redirect('/staff/');
    }


    public function edit($id){
        $edit = Staff::find($id);
        return view('staff.edit', [
            'edit_data' => $edit
        ]);
    }


    public function update(Request $request, $id){

        if ($request -> hasFile('new_photo')) {
            
            $file = $request -> file('new_photo');
            $unique_name = md5(time().rand()) . '.' . $file -> getClientOriginalExtension();
            $file -> move(public_path('media/staff'), $unique_name);

            if( file_exists('media/staff/' . $request -> old_photo) ){
                unlink('media/staff/' . $request -> old_photo);
            }
        }else{
            $unique_name = $request -> old_photo;
        }


        $update_data = Staff::find($id);
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
