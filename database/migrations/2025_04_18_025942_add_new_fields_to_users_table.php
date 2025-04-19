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
            $table->string('celular', 15)->after('remember_token');
            $table->string('roles', 250)->default('a:1:{i:0;s:11:"profesional";}')->after('celular');
            $table->boolean('estado')->default(1)->after('roles');
            $table->bigInteger('id_cliente')->default(5169244717)->after('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
