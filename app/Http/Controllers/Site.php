<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Site extends Controller
{
    // public function first()
    // {
    //     //echo "<h1>Welcome to First Method.</h1>";
    //     return view("first");
    // }

    public function first()
    {
        // DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
        echo "<h1>ID: </h1>";
        return view("first");
    }

    // To select items from the database
    //also take note of binding parameters :id,["id=>2"]
    public function get_users() {
        $users = DB::select("SELECT * FROM tbl_users");
        //echo "<pre>";
        //print_r($users);
        foreach($users as $user) {
            echo $user->name."</br>";
        }
        
    }
    public function insert_user() {
        $user = DB::Insert("INSERT into tbl_users(name,email, phone_no) VALUES(?,?,?)", ["dave","dave@gmail.com","08056974327"]);

        print_r($user);
    }

    public function update_user() {
        $user = DB::update("UPDATE tbl_users SET email = ? WHERE id= ? ", ["shy@gmail.com", 1]);

        //this below works as above, this 
        // $user = DB::update("UPDATE tbl_users SET email = :email_address WHERE id= :id ", ["email_address => "eshy@gmail.com", "id" => 1]);

        print_r($user);
    }

    public function delete_user() {
        $user = DB::delete("DELETE from tbl_users WHERE id = :id ", ["id" => 5]);

        print_r($user);
    }
}
