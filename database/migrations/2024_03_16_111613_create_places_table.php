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
         Schema::create('places', function (Blueprint $table) {
             $table->id();
             $table->string('place')->default('Unknown');
             $table->string('location');
             $table->string('photo', 300)->nullable(); // Use varchar instead of string
             $table->text('description');
             $table->text('map_link')->nullable();
             $table->timestamps();
         });
     }
 
     /**
      * Reverse the migrations.
      */
     public function down(): void
     {
         Schema::dropIfExists('places'); // Change 'products' to 'places'
     }
 };