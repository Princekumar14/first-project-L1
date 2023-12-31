<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            // $table->integer('student_id');
            // $table->string('name');
            // $table->string('email')->unique()->nullable();
            // $table->float('percentage', 3, 2)->comment('student percentage');
            // $table->primary('student_id');
            // $table->string('city',30)->default('No City');
            // $table->integer('age')->unsigned();
            
//----------------------- Seeders ---------------------------------
            // $table->id();
            // $table->string('name',30);
            // $table->string('email',40)->unique()->nullable();
            // $table->timestamps();

//----------------------- Factory ---------------------------------
            $table->id();
            $table->string('name',30);
            $table->integer('age')->unsigned();
            $table->string('email',40)->unique()->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('phone');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
