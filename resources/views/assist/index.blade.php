<!-- resources/views/assist/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-900">
            {{ __('Assist Index') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background:linear-gradient(to right, #3498db, #8e44ad); margin: 0;">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-grey-200 dark:border-gray-800">
                    <table class="text-center w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-gray-lightest dark:bg-gray-darkest font-bold uppercase text-lg text-gray-dark dark:text-gray-900 border-b border-grey-light dark:border-grey-dark">
                                    一覧</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assists as $assist)
                                <tr class="hover:bg-gray-lighter">
                                    <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                                        <a href="{{ route('assist.show', $assist->id) }}">
                                            <h3 class="text-left text-lg dark:text-gray-900 w-3/4">
                                                {{ $assist->question }}</h3>
                                        </a>
                                            {{ $assist->updated_at }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
