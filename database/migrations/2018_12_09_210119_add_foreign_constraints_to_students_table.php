<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignConstraintsToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->integer('schoolclass_id')->unsigned();
            $table->foreign('schoolclass_id')->references('id')->on('schoolclasses')->onDelete('CASCADE');

            //$table->integer('school_id')->unsigned();
            //$table->foreign('school_id')->references('íd')->on('schools')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('schoolclass_id')->references('id')->on('schoolclasses');
            $table->dropColumn('schoolclass_id')->unsigned();

            $table->dropForeign('school_id')->references('íd')->on('schools');
            $table->dropColumn('school_id')->unsigned();
        });
    }
}
