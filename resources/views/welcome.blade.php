<x-guest-layout>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 relative">
        <div class="flex justify-between items-center px-2 py-2 sm:px-6">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-xl font-bold text-black hover:text-gray-800"><x-application-logo
                        class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" /></a>
            </div>
            <div class="flex gap-2">
                @if (Route::has('login'))
                    @auth
                        <x-primary-button>
                            <a href="{{ url('/dashboard') }}" class="text-black hover:text-gray-800">Dashboard</a>
                        </x-primary-button>
                        <x-primary-button>
                            <a href="{{ url('/fetch_video') }}" class="text-black hover:text-gray-800">Videos</a>
                        </x-primary-button>
                        <x-primary-button>
                            <a href="{{ url('/upload_v') }}" class="text-black hover:text-gray-800">Upload</a>
                        </x-primary-button>
                    @else
                        <x-primary-button>
                            <a href="{{ route('login') }}" class="text-black hover:text-gray-800">Log in</a>
                        </x-primary-button>
                        @if (Route::has('register'))
                            <x-primary-button>
                                <a href="{{ route('register') }}" class="text-black hover:text-gray-800">Register</a>
                            </x-primary-button>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
        @if (empty($videos))
            <div class="w-full mt-6 flex justify-center items-center flex-col">
                <div class="flex items-center">
                    <a href="{{ url('/') }}"
                        class="text-xl font-bold text-black hover:text-gray-800"><x-application-logo
                            class="block h-16 w-auto fill-current text-gray-800 dark:text-gray-200" /></a>
                </div>
                <h1 class="text-white text-semibold text-xl">No videos yet</h1>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 px-4 py-8 sm:px-6 py-6">
                @foreach ($videos as $row)
                    <?php
                    $userID = $row['user_id'];
                    $userID = $userID - 1;
                    ?>
                    @if ($row['type'] == 'public')
                        @if (isset($users[$userID]))
                            <x-video :video="$row['video']" :title="$row['name']" :name="$users[$userID]['name']" />
                        @else
                        @endif
                    @endif
                @endforeach

            </div>
        @endif
    </div>
</x-guest-layout>
