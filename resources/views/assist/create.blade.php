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
                <!-- 🔽 採点基準などを入力するフォーム -->
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 flex flex-col">
                    <x-input-label for="question" :value="__('質問内容')" />
                    <textarea class="rounded" style="resize: none;" name="question" id="question" cols="30" rows="8"></textarea>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 flex flex-col">
                    <x-input-label for="criterion" :value="__('採点基準')" />
                    <a onclick=add() class="btn btn-sm btn-light">採点基準の追加</a>
                    <div id="input_plural">
                        <div class="d-flex">
                            <input type="text" class="form-control mb-1" name="criterion">
                            <input type="button" value="削除" onclick="del(this)">
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 flex flex-col">
                    <x-input-label for="answer" :value="__('生徒の回答内容')" />
                    <textarea class="rounded" style="resize: none;" name="answer" id="answer" cols="30" rows="8"></textarea>
                </div>
                <div class="flex flex-col items-center">
                    <x-primary-button class="ml-3">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
                <!-- 🔼 採点基準などを入力するフォーム -->
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 flex flex-col">
                    <!-- ↓ 採点結果（仮）↓ -->
                    <label class="dark:text-white" for="result">解答の評価や修正点</label>
                    <textarea class="rounded resize-none" name="result" id="result" cols="30" rows="32"></textarea>
                    <!-- ↑ 採点結果（仮）↑  -->
                </div>
            </div>
        </div>

</x-app-layout>

<script>
    // フォームのテキストボックスを追加削除する
    let inputPlural = document.getElementById('input_plural');
    var count = 2;

    function add() {
        let div = document.createElement('DIV');
        div.classList.add('d-flex');

        var input = document.createElement('INPUT');
        input.classList.add('form-control');
        input.setAttribute('name', 'ing-name-' + count);
        div.appendChild(input);

        var input = document.createElement('INPUT');
        input.setAttribute('tyep', 'button');
        input.setAttribute('value', '削除');
        input.setAttribute('onclick', 'del(this)');
        div.appendChild(input);

        inputPlural.appendChild(div);
        count++;
    }

    function del(x) {
        x.parentNode.remove();
    }
</script>
