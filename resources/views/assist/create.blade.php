<!-- resources/views/edu/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Assist Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-2 gap-4 max-w-7xl mx-auto sm:w-11/12 md:w-11/12 lg:w11/12">
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
                <form class="mb-6" action="{{ route('assist.store') }}" method="POST"enctype="multipart/form-data">
                     @csrf
                    <div class="flex flex-col mb-4">
                        <x-input-label for="question" :value="__('問題')" />
                        <textarea class="rounded resize-none",type=question name="question" id="question":value="old('question')" cols="30" rows="8" required autofocus></textarea>
                        <!-- <x-input-error :messages="$errors->get('question')" class="mt-2" /> -->
                    </div>
                    <div class="flex flex-col mb-4">
                        <x-input-label for="criterion" :value="__('採点基準')" />
                        <a onclick=add() class="btn btn-sm btn-light">採点基準の追加</a>
                        <div id="input_plural">
                            <div class="d-flex">
                                <input type="text" class="form-control mb-1" name="criterion">
                                <input type="button" value="削除" onclick="del(this)">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col mb-4">
                        <x-input-label for="answer" :value="__('生徒の回答')" />
                        <textarea class="rounded resize-none",type=answer name="answer" id="answer":value="old('answer')" cols="30" rows="8" required autofocus></textarea>
                        <!-- <x-input-error :messages="$errors->get('answer')" class="mt-2" /> -->
                    </div>
                    <div class="flex flex-col items-center">
                        <x-primary-button class="ml-3">
                            {{ __('Create') }}
                        </x-primary-button>
                    </div>
                </form>              
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
