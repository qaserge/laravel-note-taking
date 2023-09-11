<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ !$note->trashed() ? __('Note') : __('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex mb-10">
                        @if (!$note->trashed())
                            <p class="opacity-70">
                                Created: {{ $note->created_at->diffForHumans() }}
                            </p>
                            <p class="opacity-70 ml-8">
                                Updated: {{ $note->updated_at->diffForHumans() }}
                            </p>
                            <a href="{{ route('notes.edit', $note) }}" class="btn-link ml-auto">Edit Note</a>
                            <form action="{{ route('notes.destroy', $note) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn-red ml-4"
                                    onclick="return confirm('Delete this note?')">Move to Trash </button>
                            </form>
                        @else
                            <p class="opacity-70">
                                Deleted: {{ $note->deleted_at->diffForHumans() }}
                            </p>

                            <form action="{{ route('trashed.update', $note) }}" method="POST" class="ml-auto">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="btn-link">Restore Note</button>
                            </form>                            

                            <form action="{{ route('trashed.destroy', $note) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn-red ml-4"
                                    onclick="return confirm('Delete this note forever?')">Delete</button>
                            </form>
                        @endif
                    </div>
                    <div class="flex mb-10">
                    </div>
                    <h2 class="font-bold text-4xl"> {{ $note->title }} </h2>
                    <p class="mt-6 whitespace-pre-wrap">{{ $note->text }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
