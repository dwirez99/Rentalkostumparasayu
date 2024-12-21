<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCosplayCategory extends Migration
{
    public function up()
    {
        // Rename table from 'cosplay_category' to 'kostum_kategory'
        Schema::rename('cosplay_category', 'kostum_kategory');

        // Modify the table structure
        Schema::table('kostum_kategory', function (Blueprint $table) {
            $table->renameColumn('cosplay_id', 'kostum_id'); // Rename column 'cosplay_id' to 'kostum_id'
            $table->float('harga')->nullable();              // Add new column 'harga'
        });
    }

    public function down()
    {
        // Reverse the table rename
        Schema::rename('kostum_kategory', 'cosplay_category');

        // Reverse the column rename and drop the 'harga' column
        Schema::table('cosplay_category', function (Blueprint $table) {
            $table->renameColumn('kostum_id', 'cosplay_id'); // Rename column 'kostum_id' back to 'cosplay_id'
            $table->dropColumn('harga');                      // Drop the 'harga' column
        });
    }
}
