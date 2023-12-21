<x-app-layout>
    <x-slot name="header">
        <!-- ページのタイトル -->
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            収支詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- データ詳細のセクション -->
                    <section class="text-gray-600 body-font relative">
                    {{ $transaction->id }}
                        <div class="container px-5 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="flex flex-col space-y-4">
                                    <!-- カテゴリID表示 -->


                                    <div>
                                         <div class="relative">
                                             <label for="name" class="leading-7 text-sm text-gray-600">カテゴリID</label>
                                             <div class="w-full  rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> {{ $transaction->category_id }}</div>
                                         </div>
                                     </div>
                                     <div>
                                         <div class="relative">
                                             <label for="name" class="leading-7 text-sm text-gray-600">金額</label>
                                             <div class="w-full  rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> {{ $transaction->amount }}</div>
                                         </div>
                                     </div>
                                     <div>
                                         <div class="relative">
                                             <label for="name" class="leading-7 text-sm text-gray-600">収支種別</label>
                                             <div class="w-full  rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> {{ $transaction->type == 1 ? '収入' : '支出' }}</div>
                                         </div>
                                     </div>
                                     <div>
                                         <div class="relative">
                                             <label for="name" class="leading-7 text-sm text-gray-600">日付</label>
                                             <div class="w-full  rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> {{ $transaction->transaction_date }}</div>
                                         </div>
                                     </div>
                                     <div>
                                         <div class="relative">
                                             <label for="name" class="leading-7 text-sm text-gray-600">メモ</label>
                                             <div class="w-full  rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> {{ $transaction->memo }}</div>
                                         </div>
                                     </div>
                                     



                                    <!-- 戻るボタン -->
                                    <div class="p-2 w-full">
                                        <a href="{{ route('transactions.index') }}" class="flex mx-auto">戻る</a>
                                    </div>
                                    <form method="get" action="{{ route('transactions.edit', ['id' => $transaction->id]) }}">
                             <div class="p-2 w-full">
                                 <button class="flex mx-auto ">編集する</button>
                             </div>
                         </form>

                         <form id="delete_{{$transaction->id}}" class="mt-40" method="post" action="{{ route('transactions.destroy', ['id' => $transaction->id]) }}">
                             @csrf
                             <div class="p-2 w-full">
                             <a href="#" data-id="{{ $transaction->id }}" onclick="deletePost(this); return false;" class="flex mx-auto ">削除する</a>
                             </div>
                         </form>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

         <!-- 確認メッセージ -->
         <script>
         function deletePost(e) {
             'use strict'
             if (confirm('本当に削除していいですか？'))
             {
                 document.getElementById('delete_' + e.dataset.id).submit()
             }
         }
     </script>

</x-app-layout>
