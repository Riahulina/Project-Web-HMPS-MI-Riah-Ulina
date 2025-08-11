<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasColumn('blogs', 'kategori')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->string('kategori')->nullable()->after('judul');
            });
        }
    }
    
    
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }
};
    