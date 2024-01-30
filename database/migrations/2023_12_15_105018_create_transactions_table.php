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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // ID (主キー)
            $table->unsignedBigInteger('category_id'); // カテゴリID (外部キー)
            $table->integer('amount')->unsigned(); // 金額　取引の金額を表す、整数型
            $table->tinyInteger('type'); // 収支種別 (0: 収入, 1: 支出)            
            $table->date('transaction_date'); // 日付　年-月-日の形式で日付を保存可
            $table->text('memo')->nullable(); // メモ　`nullable` 必須ではなく、空白でもok
            $table->timestamps(); // 作成日時と更新日時


        });
        


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
