<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 ">
            {{ __('Videos') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 px-4 py-8 sm:px-6 mt-6">
        @foreach ($videos as $row)
            @if ($row['type'] == 'public' || $row['user_id'] == auth()->user()->id)
                <?php $userID = $row['user_id'];
                $userID = $userID - 1; ?>
                @if (isset($users[$userID]))
                    <x-video :video="$row['video']" :title="$row['name']" :name="$users[$userID]['name']" />
                @else
                @endif
            @endif
        @endforeach
    </div>
</x-app-layout>
