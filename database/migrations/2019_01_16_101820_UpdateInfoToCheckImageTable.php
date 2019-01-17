<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateInfoToCheckImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_image', function (Blueprint $table) {
            $table->string('do_kho')->nullable();
            $table->string('ten_nguon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('check_image', function (Blueprint $table) {
            $table->dropColumn('do_kho');
            $table->dropColumn('ten_nguon');
        });
    }
}
