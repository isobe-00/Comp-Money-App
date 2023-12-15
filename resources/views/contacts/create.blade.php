<x-app-layout>
    <x-slot name="header">
        <!-- ページのタイトル -->
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            家計簿アプリ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- フォームのセクション -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <section class="text-gray-600 body-font relative">
                        <!-- お問い合わせフォーム -->
                        <form method="post" action="{{ route('transactions.store') }}">
                            @csrf
                            <div class="container px-5 mx-auto">

                                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                    <div class="flex flex-col space-y-4">
                                        <!-- カテゴリIDの入力フィールド -->
                                        <div class="mt-4">
                                            <div class="relative">
                                                <label for="category_id" class="leading-7 text-sm text-gray-600">カテゴリID</label>
                                                <input type="text" id="category_id" name="category_id" value="{{ old('category_id') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <!-- 金額の入力フィールド -->
                                        <div class="mt-4">
                                            <div class="relative">
                                                <label for="amount" class="leading-7 text-sm text-gray-600">金額</label>
                                                <input type="text" id="amount" name="amount" value="{{ old('amount') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <!-- 収支種別の入力フィールド -->
                                        <div class="mt-4">
                                            <div class="relative">
                                                <label for="type" class="leading-7 text-sm text-gray-600">収支種別</label>
                                                <select name="type">
                                                        <option value="">選択してください</option>
                                                        <option value="1" {{ old('type') == 1 ? 'selected' : ''}}>収入</option>
                                                        <option value="2" {{ old('type') == 2 ? 'selected' : ''}}>支出</option>
                                                        <div>
                                            </div>
                                        </div>
                                        <!-- 日付の入力フィールド -->
                                        <div class="mt-4">
                                            <div class="relative">
                                                <label for="transaction_date" class="leading-7 text-sm text-gray-600">日付</label>
                                                <input type="date" id="transaction_date" name="transaction_date" value="{{ old('transaction_date') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <!-- メモの入力フィールド -->
                                        <div class="mt-4">
                                            <div class="relative">
                                                <label for="memo" class="leading-7 text-sm text-gray-600">メモ</label>
                                                <textarea id="memo" name="memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('contact') }}</textarea>
                                            </div>
                                        </div>
                                        <!-- 送信ボタン -->
                                        <div class="p-2 w-full">
                                            <button class="flex mx-auto ">新規登録する</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>