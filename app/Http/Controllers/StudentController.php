<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use DB;

class StudentController extends Controller
{
    public function myForm(Request $req)
    {
        if ($req->isMethod("post")) {
            //This is to validate the details entered in a form
            $req->validate([
                "name" => "required|min:4|max:20",
                "email" => "required|unique:students,email",
                "mobile" => "required|digits_between:9,11"
            ], [
                "name.required" => "Name Value is needed" //this is used to add custom error response
            ]);
            print_r($req->all());
        }
        return view("my-form");
    }

    public function submitStudent(Request $rquest)
    {
        // print_r($request->all()); //to get all values in my form

        // print_r($request->input()); // same as the upper one.

        // print_r($rquest->input("name")); // to get one single value
    }

    public function addStudent()
    {

        return view("add-student");
    }
    //  this is the function used to save item from form    data.
    public function storeStudent(Request $request)
    {

        $student_obj = new Student;

        //setting values into the database
        $student_obj->name = $request->name;
        $student_obj->email = $request->email;
        $student_obj->mobile = $request->mobile;

        //to save data , we call the save method
        $student_obj->save();

        //this is to set flash message or notification

        //these are diffrernt methods to do this 
        // session()->flash("key", "message");
        $request->session()->flash("success", "student created successfully");

        //this is used for redirection after notification. both methods can be used, but the simpler one first.
        // return redirect()->to("add-student");
        return redirect("add-student");
    }

    public function selectData()
    {
        $students = Student::all();
        return view("list-students", [
            "students" => $students
        ]);
        // $students = Student::all();
        //we can also use this method below to select of find data

        // $students = Student::find(4); // we use an array to find more records e.g [4,6,8]

        //We can also use the where method in this case below.
        //$students = Student::Where("email", "eshy008@gmail.com");

        // echo "<pre/>";
        //print_r($students);

        // We can also select a data using this method when we use the where method, we wont need the foreach, since its just one or 2 objects

        // print_r($students->email);

        //to display all our selected data.

        //foreach($students as $student){
        //echo $student->email. "<br/>";
        //}
    }

    //this is the showStudentData for editing the student info
    public function showStudentData($student_id)
    {
        $student = Student::find($student_id);

        return view("show-data", [
            "student" => $student
        ]);
    }

    public function submitEditStudent(Request $request)
    {
        //print_r($request->all());
        //echo $request['student_id'];die;

        $student = Student::find($request["student_id"]);

        print_r($student);
        $student->name = $request['name'];
        $student->email = $request['email'];
        $student->mobile = $request['mobile'];

        $student->save();

        //this is used to return a flash message

        session()->flash("success", "student data updated succesfully");

        return redirect("list-data");

    }

    //this is the delete function

    public function deleteStudent($student_id)
    {

        $student = Student::find($student_id);
        $student->delete();

        session()->flash("success", "Student has been deleted succesfully");

        return redirect("list-data");
    }

    //this is how to use query builder.Meanwhile i added the use DB above N.B we used the first ()method instead off the get method. first methods goves the class object while the collection object for get() method. i can also removed the where() method and use the find() method instead of first()
    public function listStudents() {
        // $students = DB::table("students")->where("id", 5)->select("id", "name", "email as email_address")->first();


        // $students = DB::table("students")->where("email", "like", "%example.org")->get();

        $students = DB::table("students")->where("id", ">=", 18)->get();

        echo "<pre>";

        print_r($students);


    }
}
