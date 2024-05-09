<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-xl dark:text-gray-100">
                    {{ __('My videos:') }}
                </div>
            </div>
        </div>



        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 px-4 py-8 sm:px-6 mt-6">
            @foreach ($videos as $row)
                <?php
                $userID = $row['user_id'];
                $userID = $userID - 1;
                ?>
                @if (isset($users[$userID]) && $row['user_id'] == auth()->user()->id)
                    <div class="flex flex-col items-center">
                        <x-video :video="$row['video']" :title="$row['name']" :name="$users[$userID]['name']" />
                        <x-secondary-button class="mt-2" style="width: 6rem;">
                            <a href="/edit/{{ $row['id'] }}"
                                class=" hover:text-gray-400">Edit</a></x-secondary-button>
                    </div>
                @else
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
