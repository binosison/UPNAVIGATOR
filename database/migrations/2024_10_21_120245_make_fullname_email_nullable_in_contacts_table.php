<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeFullnameEmailNullableInContactsTable extends Migration
{
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('fullname')->nullable()->change(); // Make fullname nullable
            $table->string('email')->nullable()->change(); // Make email nullable
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('fullname')->nullable(false)->change(); // Revert to not nullable
            $table->string('email')->nullable(false)->change(); // Revert to not nullable
        });
    }
}
