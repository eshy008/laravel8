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

    //this is how to use query builder.Meanwhile i added the use DB above N.B we used the first ()method instead off the get method. first methods gives the class object while the collection object for get() method. i can also removed the where() method and use the find() method instead of first()
    public function listStudents() {
            // $students = DB::table("students")->where("id", 5)->select("id", "name", "email as email_address")->first();


        // $students = DB::table("students")->where("email", "like", "%example.org")->get();

        //$students = DB::table("students")->where("id", ">=", 18)->get();

            //this is how to write SELECT * from students WHERE id=3 AND name = "abc"
        // $students = DB::table("students")->where("id", 3)->where("name", "abc")->get();

            //SELECT * from Students WHERE id=2 AND (name=="abc" OR email = "abc@gmail.com")
        // $students = DB::table("students")->where("id", 2)->where(function($query){$query->where("name", "abc")->orWhere("email", "abc@gmail.com")})->get();

            //SELECT * from Students WHERE name ="abc" OR (id =3 AND email="abc@gmail.com")
        // $students = DB::table("students")->where("name", "abc")->orWhere(function($query){$query->where("id", 3)->where("email", "abc@gmail.com");
        // })->get();

            //SELECT * from Students WHERE id Between 2 AND 30
        // $students = DB::table("students")->whereBetween("id", [2,30])->get();

            //SELECT * from Students WHERE id IN(1,100,110,175)
        // $students = DB::table("students")->whereIn("id", [1,100,110,175])->get();

    //this is used in learning joins, right joins and left joins

            // $students = DB::table("students")->select("students.id", "students.name as student_name", "students.email as email", "courses.name as course_name", "courses.amount as amount")->join("courses", "students.id", "=", "courses.student_id")->get();

        
        
            // echo "<pre>";
            //  print_r($students);


    }
        //using query builder method to insert and update db

        public function insertStudent() {
            // DB::table("students")->insert([
            //     "name" => "Sample",
            //     "email" => "sample@test.com",
            //     "mobile" => "897497367665"
            // ]);

            //     $inserted_id = DB::table("students")->insertGetId([
            //         "name" => "Sample",
            //         "email" => "sample@test.com",
            //         "mobile" => "897497367665"
            //     ]);
            // echo "data has been saved with id =" . $inserted_id;


            //this is used to insert bulk items in the database

        //     DB::table("students")->insert(
        //         [
        //     [ "name"=>"A", "email"=>"a@aa.com", "mobile"=>"46893088884"],
        //     [ "name"=>"B", "email"=>"b@aa.com", "mobile"=>"89088884"]
        //         ]
        // );
        //  echo "bulk data has been saved ";

        // this is used to  update details in a databes using the query builder

        // DB::table("students")->where("id", 22)->update([
        //     "name" => "updated value",
        //     "email" => "updated@value.com"
        // ]);
        //     echo "data has been updated";


        //this is to update or insert depending on which is needed, e.g if the email exists, it would update,if the email doesnt exist, it inserts

        // DB::table("students")->updateOrInsert(
        //     ["email" => "a@aa.com"], //conditions
        //     [
        //         "name" => "updated Value of C",
        //         "mobile" => "44444444444"
        //     ] //data
        // );
            //deleting using query builder
        // DB::table("students")->where("id", 7)->delete();
     //truncate also deletes all the data from the table but when inserting the id on the database starts from id=1
        //DB::table("students")->truncate();

    }
}
