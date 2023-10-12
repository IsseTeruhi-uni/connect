<!-- resources/views/edu/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Score the Questions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-2 gap-4 max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 flex flex-col">
                    <label class="dark:text-white" for="question">質問内容</label>
                    <textarea class="rounded" style="resize: none;" name="question" id="question" cols="30" rows="8"></textarea>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 flex flex-col">
                    <label class="dark:text-white" for="criterion">採点基準</label>
                    <textarea class="rounded resize-none" name="criterion" id="criterion" cols="30" rows="8"></textarea>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 flex flex-col">
                    <label class="dark:text-white" for="answer">生徒の回答内容</label>
                    <textarea class="rounded" style="resize: none;" name="answer" id="answer" cols="30" rows="8"></textarea>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 flex flex-col">
                    {{-- ↓ 採点結果（仮）↓ --}}
                    <label class="dark:text-white" for="result">解答の評価や修正点</label>
                    <textarea class="rounded resize-none" name="result" id="result" cols="30" rows="32"></textarea>
                    {{-- ↑ 採点結果（仮）↑ --}}
                </div>
            </div>
        </div>

</x-app-layout>
