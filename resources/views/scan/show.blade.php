<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-900">
            {{ __('Scan') }}
        </h2>
    </x-slot>
    <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="content">
        {{ $content }}
    </p>
</x-app-layout>