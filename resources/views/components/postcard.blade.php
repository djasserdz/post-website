@props(['post'])

<div class="border border-gray-200 rounded-lg shadow-md bg-white transition-transform duration-300 hover:scale-105 hover:shadow-xl max-w-md mx-auto">
    <img src="{{ asset('storage/'.$post->image_path) }}" alt="Post image" class="w-full h-48 object-cover rounded-t-lg">
    <div class="p-4">
        <p class="text-xl font-bold text-gray-800 mb-3">{{ $post->title }}</p>
        <div class="text-gray-700 mb-3">
            {{ $slot }}
        </div>
        <p class="text-gray-600 text-sm">{{ $post->body }}</p>
    </div>
</div>
