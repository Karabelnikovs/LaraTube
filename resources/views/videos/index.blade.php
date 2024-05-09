<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Upload video') }}
        </h2>
    </x-slot>

    <div class="flex flex-col items-center justify-center px-6 sm:px-12 mt-6">
        <form method="post" action="{{ Route('insert.file') }}" enctype="multipart/form-data" class="w-2/3 max-w-lg">
            {{ csrf_field() }}

            <div class="w-full flex items-center justify-center mb-6">
                <label for="dropzone-file"
                    class="w-full px-6 py-4 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 transition duration-700 ease-in-out">
                    <div class="flex flex-col items-center justify-center">
                        <svg class="w-16 h-16 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" name="video" />

                </label>
            </div>

            <x-text-input name="name" class="mb-4" placeholder="Title...">
            </x-text-input>

            <div class="max-w-sm mx-auto w-full mb-4">
                <label class="text-gray-500 dark:text-gray-500" for="type">Select video accessibility:</label>
                <select id="type" name="type"
                    class="mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="public">Public</option>
                    <option value="private">Private</option>
                </select>
            </div>

            <x-secondary-button class="w-full">
                <input type="submit" name="click" value="Upload" />
            </x-secondary-button>
        </form>
        <ul class="w-2/3 max-w-lg dark:text-red-600 text-red-600 mt-3">
            @if ($errors->has('video'))
                <li>{{ $errors->first('video') }}</li>
            @endif
            @if ($errors->has('name'))
                <li>{{ $errors->first('name') }}</li>
            @endif
            @if ($errors->has('type'))
                <li>{{ $errors->first('type') }}</li>
            @endif

        </ul>
    </div>
</x-app-layout>
