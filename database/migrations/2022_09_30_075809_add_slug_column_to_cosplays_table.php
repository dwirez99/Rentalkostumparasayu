<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kostum', function (Blueprint $table) {
            $table->string('slug', 255)->nullable()->after('title');
            $table->string('cover', 255)->nullable()->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kostum', function (Blueprint $table) {
            if (Schema::hasColumn('kostum', 'slug')) {
                $table->dropColumn('slug');
            }
            if (Schema::hasColumn('kostum', 'cover')) {
                $table->dropColumn('cover');
            }
        });
    }
};
