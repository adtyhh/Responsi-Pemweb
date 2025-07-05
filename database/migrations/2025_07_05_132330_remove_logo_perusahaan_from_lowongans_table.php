<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('lowongans', function (Blueprint $table) {
            $table->dropColumn('logo_perusahaan');
        });
    }


    public function down(): void
    {
        Schema::table('lowongans', function (Blueprint $table) {
            $table->string('logo_perusahaan')->nullable()->after('deskripsi_pekerjaan');
        });
    }
};