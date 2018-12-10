<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVariousFieldsToConsents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consents', function (Blueprint $table) {
            // default consent
            $table->boolean('evaluation')->nullable();
            $table->boolean('class')->nullable();
            $table->boolean('school')->nullable();
            $table->boolean('other_schools')->nullable();
            $table->boolean('illustrations')->nullable();
            $table->boolean('website')->nullable();

            // ministry consent
            $table->boolean('ministry_evaluation')->nullable();
            $table->boolean('ministry_illustration')->nullable();
            $table->boolean('ministry_website')->nullable();

            // verification
            $table->boolean('of_age')->nullable();
            $table->boolean('legal_representative')->nullable();

            // signed
            $table->string('consenter_name')->nullable();
            $table->boolean('truth')->nullable();

            $table->string('ip_address', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consents', function (Blueprint $table) {
            // default consent
            $table->dropColumn('evaluation');
            $table->dropColumn('class');
            $table->dropColumn('school');
            $table->dropColumn('other_schools');
            $table->dropColumn('illustrations');
            $table->dropColumn('website');

            // ministry consent
            $table->dropColumn('ministry_evaluation');
            $table->dropColumn('ministry_illustration');
            $table->dropColumn('ministry_website');

            // verification
            $table->dropColumn('of_age');
            $table->dropColumn('legal_representative');

            // signed
            $table->dropColumn('consenter_name');
            $table->dropColumn('truth');
        });
    }
}
