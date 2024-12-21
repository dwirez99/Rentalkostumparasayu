<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCosplayTableToKostumAndModifyColumns extends Migration
{
    public function up()
    {
        // Rename table from 'cosplay' to 'kostum'

        // Modify the table structure
        Schema::table('kostum', function (Blueprint $table) {
            $table->renameColumn('cosplay_code', 'id_kostum'); // Rename column 'cosplay' to 'kostum'
            $table->decimal('harga',10,2)->nullable();        // Add a new column 'harga'
        });
    }

    public function down()
    {
        // Reverse the table rename
        Schema::rename('kostum', 'cosplay');

        // Reverse the table structure changes
        Schema::table('cosplays', function (Blueprint $table) {
            $table->renameColumn('id_kostum', 'id_cosplay'); // Rename column 'kostum' back to 'cosplay'
            $table->dropColumn('harga');              // Drop the 'harga' column
        });
    }
}
