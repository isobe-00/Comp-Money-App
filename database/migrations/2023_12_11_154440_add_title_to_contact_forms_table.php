<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleToContactFormsTable extends Migration
{
    public function up()
    {
        Schema::table('contact_forms', function (Blueprint $table) {
            $table->string('title', 50)->after('name');
        });
    }

    public function down()
    {
        Schema::table('contact_forms', function (Blueprint $table) {
            // $table->dropColumn('title');
        });
    }
}
