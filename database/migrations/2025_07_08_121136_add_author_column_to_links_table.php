<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up() : void
    {
        Schema::table('links', function (Blueprint $table) {
            $table->string('author')->nullable();
        });
    }

    public function down() : void
    {
        Schema::table('links', function (Blueprint $table) {
            $table->dropColumn('author');
        });
    }
};
