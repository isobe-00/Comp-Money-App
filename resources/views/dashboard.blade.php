<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!<br>

                    <!-- 会員一覧へのリンク -->
                    <a href="{{ route('contacts.index') }}" class="text-blue-500 hover:underline">会員一覧</a><br>

                    <!-- 取引一覧へのリンク -->
                    <a href="{{ route('transactions.index') }}" class="text-blue-500 hover:underline">取引一覧</a><br>

                    <!-- 新規会員登録画面へのリンク -->
                    <a href="{{ route('contacts.create') }}" class="text-blue-500 hover:underline">新規会員登録</a><br>

                    <!-- 新規取引登録画面へのリンク -->
                    <a href="{{ route('transactions.create') }}" class="text-blue-500 hover:underline">新規取引登録</a><br>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
