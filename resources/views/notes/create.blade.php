<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('notes.store') }}" method="POST">
                        @csrf

                        <x-text-input type="text" name="title" field='title' placeholder="Title" class="w-full"
                            autocomplete="off" :value="@old('title')"></x-text-input>

                        <x-text-area name="text" field='text' rows="10" placeholder="Start typing here..."
                            class="w-full mt-6" :value="@old('text')"></x-text-area>

                        <x-primary-button class="mt-6">Save Note</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
