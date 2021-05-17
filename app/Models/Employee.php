<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "tbl_employees";// custom table name

    protected $primaryKey = "emp_id"; //string data type

    protected $keyType = "string"; //data type string value  

    public $incrementing = false;

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    public $timestamps = false;




}
