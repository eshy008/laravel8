<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("name", 120);
            $table->string("email", 50)->nullable();
            $table->string("mobile", 20)->nullable();
            // $table->integer("age")->default(1);
            // $table->enum("gender", ["male", "female", "others"]);
            // $table->text("address_info")->comment("Pls provide your address");
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("update_at")->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}
