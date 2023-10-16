<!-- resources/views/edu/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Assist Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-11/12 md:w-11/12 lg:w11/12"> <!--grid grid-cols-2を削除-->
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
                <form class="mb-6" action="{{ route('assist.store') }}" method="POST"enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col mb-4">
                        <x-input-label for="question" :value="__('問題')" />
                        <textarea class="rounded resize-none",type=question name="question" id="question":cols="30" rows="8" required
                            autofocus>{{ old('question') }}</textarea>
                        <x-input-error :messages="$errors->get('question')" class="mt-2" />
                    </div>
                    <div class="flex flex-col mb-4">
                        <x-input-label for="criterion" :value="__('採点基準')" />
                        <div class="py-4 pb-5">
                            <a onclick=add()
                                class="px-4 py-2 border border-transparet font-semibold text-xs rounded-md dark:bg-gray-200">採点基準の追加</a>
                        </div>
                        <div id="input_plural">
                            <div class="flex">
                                <input type="text" class="mb-2 w-full rounded-md" name="criterion[]">
                                <input
                                    class="items-end px-4 py-2 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs dark:text-gray-800 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                    type="button" value="削除" onclick="del(this)">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col mb-4">
                        <x-input-label for="answer" :value="__('生徒の回答')" />
                        <textarea class="rounded resize-none",type=answer name="answer" id="answer": cols="30" rows="8" required
                            autofocus>{{ old('answer') }}</textarea>
                    </div>
                    <div class="flex flex-col items-center">
                        <x-primary-button class="ml-3">
                            {{ __('Create') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
            <!-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 flex flex-col">
                    <label class="dark:text-white" for="result">解答の評価や修正点</label>
                    <textarea class="rounded resize-none" name="result" id="result" cols="30" rows="32">{{ old('result') }}</textarea>
                </div>
            </div> -->
        </div>
    </div>
</x-app-layout>

<script>
    // フォームのテキストボックスを追加削除する
    let inputPlural = document.getElementById('input_plural');
    var count = 1;

    function add() {
        let div = document.createElement('DIV');
        div.classList.add('flex');

        var input = document.createElement('INPUT');
        input.classList.add("mb-2", "w-full", "rounded-md");
        input.setAttribute("name", "criterion[]");
        div.appendChild(input);

        var input = document.createElement('INPUT');
        input.classList.add("items-end", "px-4", "py-2", "dark:bg-gray-200", "border", "border-transparent",
            "rounded-md", "font-semibold", "text-xs", "dark:text-gray-800", "dark:hover:bg-white",
            "focus:bg-gray-700", "dark:focus:bg-white", "active:bg-gray-900", "dark:active:bg-gray-300",
            "focus:outline-none", "focus:ring-2", "focus:ring-indigo-500", "focus:ring-offset-2",
            "dark:focus:ring-offset-gray-800", "transition", "ease-in-out", "duration-150");
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
