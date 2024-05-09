@props(['video', 'title', 'name'])

<div class="max-w-xs sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl mx-auto">
    <div class="w-full bg-gray-800 shadow-xl rounded-lg overflow-hidden">
        <video class="w-full rounded-lg" controls>
            <source src="{{ asset('upload') }}/{{ $video }}" type="video/mp4">
        </video>
        <div class="p-4">
            <h3 class="text-xl text-gray-800 dark:text-gray-200">
                {{ $title }}
            </h3>
            <p class="dark:text-gray-500"> by {{ $name }}</p>
        </div>
    </div>
</div>
<style>
    video {
        height: 300px;
        width: 100%;
    }
</style>
