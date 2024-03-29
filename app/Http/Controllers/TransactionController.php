<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;


class TransactionController extends Controller
{

    public function create(Request $request)
    {
        // // フォームから送信されたデータの取得
        // $data = $request->all();

        // // Transaction モデルを使用してデータを保存
        // Transaction::create([
        //     'category_id' => $data['category_id'],
        //     'amount' => $data['amount'],
        //     'type' => $data['type'],
        //     'transaction_date' => $data['transaction_date'],
        //     'memo' => $data['memo'],
        //  ]);
        // 
        // データ保存後、一覧画面にリダイレクト
        // データ保存後、ビューを表示        

        return view('transactions.create')->with('message', 'データが保存されました。');
    }


    public function show($id)
    {

        // 指定された ID のトランザクションを取得
        $transaction = Transaction::find($id);

        // 取引詳細ビューを表示
        return view('transactions.show',compact('transaction'));
    }




    public function store(Request $request)
    {
        //  dd($request->all());
        // dd($request->memo);
        // 新規作成フォーム表示
        //トランザクションをデータベースに保存
        Transaction::create([
            'category_id' => $request->category_id,  // カテゴリーID
            'amount' => $request->amount,            // 金額
            'type' => $request->type,                // 収入か支出かを表すタイプ
            'transaction_date' => $request->transaction_date,  // トランザクションの日付
            'memo' => $request->memo,                // メモ

        ]);
        // 一覧画面にリダイレクト
        return redirect()->route('transactions.index');
    }


    public function update(Request $request, $id)
    {

        // 指定された ID のトランザクションを取得
        $transactions = Transaction::find($id);
        
        // トランザクションの各フィールドを更新
        $transactions->category_id = $request->category_id;
        $transactions->amount = $request->amount;
        $transactions->type = $request->type;
        $transactions->transaction_date = $request->transaction_date;
        $transactions->memo = $request->memo;

        $transactions->save();

        // 一覧画面にリダイレクト
        return redirect()->route('transactions.index', ['id' => $id]);
    }

    public function index()
    {
        // 1ページあたりの表示件数を指定
        $perPage = 20;

        // モデルからデータを取得し、ページネーションを適用
        $transactions = Transaction::paginate($perPage);

        // 取引一覧ビューを表示
        return view('transactions.index', ['transactions' => $transactions]);
    }


    public function edit($id)
    {
        // 指定された ID のトランザクションを取得
        $transaction = Transaction::find($id);

        // トランザクション編集ビューを表示
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * 指定されたリソースを削除します。
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 指定された ID のトランザクションを取得し、削除
        $transaction = Transaction::find($id);
        $transaction->delete();

        // 一覧画面にリダイレクト
        return redirect()->route('transactions.index');
    }
}
