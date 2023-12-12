<!-- resources/views/components/app-layout.blade.php -->

<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $header }}
        </h2>
    </x-slot>

    {{ $slot }}
</div>
