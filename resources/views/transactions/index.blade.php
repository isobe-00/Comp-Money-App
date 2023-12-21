 <!-- アプリケーションの外部レイアウト -->
 <x-app-layout>
     <!-- ヘッダースロットにページタイトルを含む -->
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             取引一覧 <!-- お問い合わせ一覧ページのタイトル -->
         </h2>
     </x-slot>

     <!-- メインコンテンツセクション -->
     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <!-- 影と角丸のあるメインコンテンツのコンテナ -->
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 bg-white border-b border-gray-200">
                     index<br>

                     <!-- 新しいお問い合わせを作成するリンク -->
                     <a href="{{ route('transactions.create') }}" class="text-blue-500">新規登録</a><br>

                     <!-- お問い合わせを検索するためのフォーム -->
                     <form class="mb-8" method="get" action="{{ route('transactions.index')}}">
                         <input type="text" name="search" placeholder="検索"> <!-- 検索入力フィールド -->
                         <button>検索する</button> <!-- 検索ボタン -->
                     </form>

                     

                     <!-- お問い合わせのテーブルを表示 -->
                     <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                         <table class="table-auto w-full text-left whitespace-no-wrap">
                             <thead>
                                 <!-- テーブルヘッダー行 -->
                                 <tr>
                                     <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Id</th>
                                     <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">カテゴリID</th>
                                     <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">金額</th>
                                     <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">収支種別</th>
                                     <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">日付</th>
                                     <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メモ</th>
                                     <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細</th>

                                 </tr>
                             </thead>
                             <tbody>
                                 <!-- お問い合わせの各行を表示 -->
                                 @foreach($transactions as $transaction)
                                 <tr>
                                     <td class="border-t-2 border-gray-200 px-4 py-3">{{$transaction->id}}</td>
                                     <td class="border-t-2 border-gray-200 px-4 py-3">{{$transaction->category_id}}</td>
                                     <td class="border-t-2 border-gray-200 px-4 py-3">{{$transaction->amount}}</td>
                                     <td class="border-t-2 border-gray-200 px-4 py-3">
                                         @if($transaction->type === 0)
                                         収入
                                         @elseif($transaction->type === 1)
                                         支出
                                         @endif
                                     </td>
                                     <td class="border-t-2 border-gray-200 px-4 py-3 ">{{$transaction->created_at}}</td>
                                     <td class="border-t-2 border-gray-200 px-4 py-3">{{$transaction->memo ?? 'test'}}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">
                                        <a class="text-blue-500" href="{{ route('transactions.show', ['id' => $transaction->id]) }}">詳細を表示</a>
                                 </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     </div>

                     <!-- ページネーションを表示 -->
                     {{ $transactions->links() }}
                 </div>
             </div>
         </div>
     </div>
 </x-app-layout>