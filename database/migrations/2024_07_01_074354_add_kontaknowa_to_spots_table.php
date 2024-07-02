<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKontaknowaToSpotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spots', function (Blueprint $table) {
            if (!Schema::hasColumn('spots', 'kontaknowa')) {
                $table->string('kontaknowa')->nullable()->after('kelas_kemiskinan');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spots', function (Blueprint $table) {
            if (Schema::hasColumn('spots', 'kontaknowa')) {
                $table->dropColumn('kontaknowa');
            }
        });
    }
}
