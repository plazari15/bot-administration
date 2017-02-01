<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeCollunsToPhrases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phrases', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();

            $table->boolean('sponsor')->default('0');
            $table->boolean('sendNow')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phrases', function (Blueprint $table) {
            $table->dropColumn('category_id');

            $table->dropColumn('sponsor');
            $table->dropColumn('sendNow');
        });
    }
}
