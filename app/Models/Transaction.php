<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * モデルで代入可能な属性。
     *
     * @var array
     */
    protected $fillable = [
        'category_id',         // カテゴリID
        'amount',              // 金額
        'type',                // 収支種別 (income: 収入, expense: 支出)
        'transaction_date',    // 取引日付
        'memo',                // メモ
    ];
}
