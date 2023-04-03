<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->integer('phone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(Hash::make("00000000"));

            $table->enum('role', ['admin', 'superadmin','teacher','student'])->default('student');

            $table->rememberToken();
            $table->timestamps();
        });


        \App\Models\User::create([
            'name' => 'superadmin',
            'username' => 'superadmin',
            'role' => 'superadmin',
            "phone"=>0,
             'email' => 'superadmin@managentmosque.com',
             'password' => Hash::make("superadmin2023")

         ]);

         \App\Models\User::create([
            'name' => 'admin',
            'username' => 'admin',
            'role' => 'admin',
            "phone"=>0,
             'email' => 'admin@managentmosque.com',
             'password' => Hash::make("admin2023")

         ]);


         \App\Models\User::create([
            'name' => 'student',
            'username' => 'student',
            'role' => 'student',
            "phone"=>12345678,
             'email' => 'student@managentmosque.com',
             'password' => Hash::make("student2023")

         ]);

         \App\Models\User::create([
            'name' => 'teacher',
            'username' => 'teacher',
            'role' => 'teacher',
            "phone"=>0,
             'email' => 'teacher@managentmosque.com',
             'password' => Hash::make("teacher2023")

         ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
