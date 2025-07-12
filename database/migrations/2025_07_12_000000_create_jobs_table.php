<?php
   use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   return new class extends Migration
   {
       public function up(): void
       {
           Schema::create('jobs', function (Blueprint $table) {
               $table->id();
               $table->string('title');
               $table->enum('type', ['Full Time', 'Part Time', 'Internship']);
               $table->enum('status', ['Active', 'Expired', 'Draft']);
               $table->integer('applications')->default(0);
               $table->string('duration');
               $table->text('description');
               $table->timestamps();
           });
       }

       public function down(): void
       {
           Schema::dropIfExists('jobs');
       }
   };