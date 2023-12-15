<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function create()
    {
        return view('contacts.create');
        // view関数を使って、transactions.createというビューを表示
    }


    public function store(Request $request)
    {
        //  dd($request->all());

        // 新規作成フォーム表示
        //トランザクションをデータベースに保存
        Transaction::create([
            'category_id' => $request->category_id,  // カテゴリーID
            'amount' => $request->amount,            // 金額
            'type' => $request->type,                // 収入か支出かを表すタイプ
            'transaction_date' => $request->transaction_date,  // トランザクションの日付
            'memo' => $request->memo,                // メモ
        ]);
        return redirect()->route('transactions.index');
    }



    public function update(Request $request, $id)
    {
        $transactions = Transaction::find($id);
        $transactions->memo = $request->memo;
        $transactions->save();

        return to_route('transaction.index');
    }
    public function index()
    {
        $transactions = Transaction::all();
        return view('contacts.index', ['transactions' => $transactions]);
    }
}
