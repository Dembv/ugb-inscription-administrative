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
        Schema::table('users', function (Blueprint $table){
            $table->unsignedBigInteger('role');
            $table->foreign('role')->references('id')->on('roles');
        });

        Schema::table('students', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('registrations', function (Blueprint $table){
            $table->foreign('etudiant')->references('code_etudiant')->on('students');
            $table->foreign('niveau')->references('id')->on('levels');
            $table->foreign('formation')->references('id')->on('formations');
            $table->foreign('annee_academique')->references('id')->on('years');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table){  
            $table->dropForeign('role');
            $table->dropColumn('role');
        });

        Schema::table('students', function (Blueprint $table){
            $table->dropForeign('user_id');
        });

        Schema::table('registrations', function (Blueprint $table){
            $table->dropForeign('etudiant');
            $table->dropForeign('niveau');
            $table->dropForeign('formation');
            $table->dropForeign('annee_academique');
        });
    }
};
