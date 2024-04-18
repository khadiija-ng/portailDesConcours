<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;
use App\Models\Etablissement;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //$table->foreignIdFor(Role::class)->default(1)
            $table->foreignIdFor(Role::class)->default(3);
            $table->foreignIdFor(Etablissement::class)->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //$table->dropForeign('users_role_id_foreign');
            //$table->dropForeign('users_etablissement_id_foreign');
        });
    }
};