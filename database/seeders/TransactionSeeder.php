<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;// Transaction モデルを使うために追加

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::factory(100)->create([
            'type' => 0, // 収入
        ]);

        Transaction::factory(100)->create([
            'type' => 1, // 支出
        ]);
    }
}