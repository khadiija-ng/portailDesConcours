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
            $table->string('prenom');
            $table->date('date_de_naissance')->nullable();
            $table->string('nationalite');
            $table->string('address');
            $table->string('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('prenom');
            $table->dropColumn('date_de_naissance');
            $table->dropColumn('nationalite');
            $table->dropColumn('address');
            $table->dropColumn('phone');
        });
    }
};
