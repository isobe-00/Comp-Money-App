<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;

     // 可変項目の指定
    protected $fillable = [
        'name',
        'title',
        'email',
        'url',
        'gender',
        'age',
        'contact',
    ];

    public function scopeSearch($query, $search)
    {
        if ($search !== null) {
            // 検索文字列の整形
            $search_split = mb_convert_kana($search, 's'); // 全角スペースを半角
            $search_split2 = preg_split('/[\s]+/', $search_split); // 空白で区切る

            // 各検索ワードに対して部分一致で検索条件を追加
            foreach ($search_split2 as $value) {
                $query->where('name', 'like', '%' . $value . '%');
            }
        }

        return $query;
    }
    

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
