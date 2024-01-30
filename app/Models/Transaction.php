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

    // 可変項目の指定
    protected $fillable = [
        'category_id',         // カテゴリID
        'amount',              // 金額
        'type',                // 収支種別 
        'transaction_date',    // 取引日付
        'memo',                // メモ
    ];

    public function contactForm()
    {
        // この Transaction モデルは ContactForm モデルに属している
        // transactions テーブルの各行は contact_forms テーブルの対応する行と関連している
        return $this->belongsTo(ContactForm::class);
    }
}
