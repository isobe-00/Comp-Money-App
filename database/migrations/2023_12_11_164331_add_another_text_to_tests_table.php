<?php

// database/migrations/xxxx_xx_xx_add_text_to_tests_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 2023_12_11_164331_add_another_text_to_tests_table.php
class AddAnotherTextToTestsTable extends Migration
{
    public function up()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->text('another_text')->after('id');
        });
    }

    public function down()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->dropColumn('another_text');
        });
    }
}
