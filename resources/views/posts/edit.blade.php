<x-layout>
    <a href="{{ route('dashboard') }}" class="block mb-2 text-xs text-blue-500">&larr; Go back to your dashboard</a>

    {{-- Update form card --}}
    <div class="card p-4 bg-white shadow-md rounded-md">
        <h2 class="font-bold mb-4 text-xl">Update your post</h2>

        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Post Title --}}
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Post Title</label>
                <input type="text" name="title" value="{{ $post->title }}"
                    class="input mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('title') ring-red-500 @enderror" />

                @error('title')
                    <p class="error text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post Body --}}
            <div class="mb-4">
                <label for="body" class="block text-sm font-medium text-gray-700">Post Content</label>
                <textarea name="body" rows="4" class="input mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('body') ring-red-500 @enderror">{{ $post->body }}</textarea>

                @error('body')
                    <p class="error text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Current cover photo if exists --}}
            @if ($post->image)
                <div class="h-auto rounded-md mb-4 w-1/6 overflow-hidden">
                    <label class="block text-sm font-medium text-gray-700">Current cover photo</label>
                    <img class="object-cover object-center rounded-md" src="{{ asset('storage/' . $post->image) }}" alt="">
                </div>
            @endif

            {{-- Post Image --}}
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Cover photo</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">

                @error('image')
                    <p class="error text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn mt-4 bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Update</button>
        </form>
    </div>
</x-layout>
