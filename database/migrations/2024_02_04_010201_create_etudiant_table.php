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
            $table->string('code_etudiant');
            $table->string('prenom');
            $table->string('nom');
            $table->string('email_personnelle')->unique();
            $table->date('date_naissance');
            $table->bigInteger('telephone')->unique();
            $table->string('adresse');
            $table->string('email_institutionnelle')->unique();
            $table->unsignedBigInteger('user_id');

            $table->primary('code_etudiant');
            
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
