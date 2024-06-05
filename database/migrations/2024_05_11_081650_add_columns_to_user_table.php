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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('userLevel')->default(1);
            $table->string('userCategory')->default('Volunteer');
            $table->string('accountStatus')->default('Authorized');
            $table->date('registrationDate')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::dropColumns('users', 'userLevel');
            Schema::dropColumns('users', 'userCategory');
            Schema::dropColumns('users', 'accountStatus');
            Schema::dropColumns('users', 'registrationDate');
        });
    }
};
