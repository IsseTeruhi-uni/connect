<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-900">
            {{ __('Scan') }}
        </h2>
    </x-slot>
    <div class="py-12" style="background:linear-gradient(to right, #3498db, #8e44ad); margin: 0;">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white dark:bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-white border-b border-gray-200 dark:border-gray-800">
                    <form class="mb-6" action="{{route('scan.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col mb-4">
                            <x-input-label for="question" :value="__('画像')" />
                            <input type="file" name="image" id="image" required autofocus>
                        </div>
                        <div class="flex flex-col items-center">
                        <x-primary-button class="ml-3">
                            {{ __('Create') }}
                        </x-primary-button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>