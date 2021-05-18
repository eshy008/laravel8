<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Site;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view("services", "services"); // direct routing, the first is the (url)route (services)and the second is the blade file/webpage

// Route::get("/first", [Site::class, "first"]); //main routing

Route::get("/first", [Site::class, "first"]); //the website link first, the class and its name:: and the method

Route::get("services/{id?}/{name}", [ServiceController::class, "services"]); //Parameter Routing. if u wnt d route parameter to work even if its not there, then add the ? mark.

//Permament redirect routing...........

Route::get("/about-us", function(){
    echo "<h1>This is a sample page</h1>";
});

Route:: redirect("/product", "/about-us"); //This redirects from product page to about-us page , once the product page isnt available.We could also do this below, once we just finished with a poage and we want to redirect.   
// return redirect("/product")



// Routing with Regular Expression
//this routing through parameters and also making sure they are strictly typed... the ->where*

Route::get("/service/{id}/{name}", function($id, $name){
    echo "<h1>ID: ". $id . "</h1>";
    echo "<h1>NAME: ". $name . "</h1>";
})->where (["id" => "[0-9]+", "name" => "[a-zA-Z]+"]);


// this is how to pass a value to the front end.
Route::get('/about-us', function () {
    $email = "eshy008@gmail.com";
    $name = "Jay";
    return view('about' , compact("email", "name"));
});

Route::get('/about-us', function () {
    return view('about');
});

// creating layouts

Route::get('/about-us', function () {
    return view('about');
});

//creating forms and submitting /render form layout

// Route::get("add-student", [StudentController::class, "myForm"]);

// this is used to represent either the get/ post method instead of spereating them.

// Route::match(['get', 'post'], "/add-student", [StudentController::class, "myForm"]);

// Route::post("submit-student", [StudentController::class, "submitStudent"]); //Route for the post form submission/ form data post

Route::get("users", [Site::class, "get_users"]);

//Route, to insert users to the database
Route::get("insert_user", [Site::class, "insert_user"]);

//Route to update user
Route::get("update_user", [Site::class, "update_user"]);

//this is the delete route
Route::get("delete_user", [Site::class, "delete_user"]); 

//to save items in the database from a form

//this is route for the form/layout
Route::get("add-student", [StudentController::class, "addStudent"]);

//route to submit and save data
Route::post("save-student", [StudentController::class, "storeStudent"]);

//Route to select data or show data from the database
Route::get("list-data", [StudentController::class, "selectData"]);

Route::get("list-students", [StudentController::class, "selectData"]);

// this is a route to use in deleteing the student info

Route::get("delete/{id}", [StudentController::class, "deleteStudent"]);

//Edit student route
Route::get("edit/{id}", [StudentController::class, "showStudentData"]);

//To submit edited data
Route::post("edit-student", [StudentController::class, "submitEditStudent"]);

//Route for query builder
Route::get("students", [StudentController::class, "listStudents"]);

//Route for insert method using query builder

Route::get("save-student", [StudentController::class, "insertStudent"]);