@props(['albums', 'artists', 'genres'])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a new track') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('tracks.create') }}">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="text-lg font-medium text-gray-900 dark:text-gray-100">Track
                                name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                   class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="Theatrical State of Mind" required>
                            <x-error for="name" class="pt-2"></x-error>
                        </div>
                        <div class="mb-6">
                            <label for="length" class="text-lg font-medium text-gray-900 dark:text-gray-100">Track
                                length</label>
                            <input type="text" id="length" name="length" value="{{ old('length') }}"
                                   class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="00:03:12" required>
                            <x-error for="length" class="pt-2"></x-error>
                        </div>
                        <div class="mb-6">
                            <label for="artist"
                                   class="text-lg font-medium text-gray-900 dark:text-gray-100">Artists</label>
                            <select id="artist" name="artists[]" multiple="multiple"
                                    class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="null">Select Artists</option>
                                @foreach($artists as $artist)
                                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                                @endforeach
                            </select>
                            <x-error for="artists" class="pt-2"></x-error>
                        </div>
                        <div class="mb-6">
                            <label for="album_id"
                                   class="text-lg font-medium text-gray-900 dark:text-gray-100">Album</label>
                            <select id="album_id" name="album_id"
                                    class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="null">Select Album</option>
                                @foreach($albums as $album)
                                    <option value="{{ $album->id }}">{{ $album->name }}</option>
                                @endforeach
                            </select>
                            <x-error for="album_id" class="pt-2"></x-error>
                        </div>
                        <div class="mb-6">
                            <label for="genres"
                                   class="text-lg font-medium text-gray-900 dark:text-gray-100">Genres</label>
                            <select id="genres" name="genres[]" multiple="multiple"
                                    class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="null">Select genres</option>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                            <x-error for="genres" class="pt-2"></x-error>
                        </div>
                        <div class="mb-6">
                            <label for="price"
                                   class="text-lg font-medium text-gray-900 dark:text-gray-100">Price $</label>
                            <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}"
                                   class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="109.99" required>
                            <x-error for="price" class="pt-2"></x-error>
                        </div>
                        <x-primary-button>{{ __('Submit') }}</x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
