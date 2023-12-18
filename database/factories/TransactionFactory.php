<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {       
        return [
            
            'category_id' => $this->faker->numberBetween(1, 10), // カテゴリID（1から10までのランダムな整数）
            'amount' => $this->faker->numberBetween(0, 100000),   // 金額（0から100000までのランダムな整数）
            'type' => $this->faker->randomElement(['income', 'expense']),// 収支種別（'income'または'expense'をランダムに選択）
            'transaction_date' => $this->faker->date(), // 取引日付（ランダムな日付）
            'memo' => $this->faker->sentence, // メモ（ランダムな文章）        
        ];
    }
}
