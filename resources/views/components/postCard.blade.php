@props(['post', 'full' => false])

<div class="card bg-slate-800 text-white rounded-md shadow-md p-4 overflow-hidden max-h-screen">
    {{--Cover photo--}}
    <div class="h-52 rounded-md mb-4 w-full object-cover overflow-hidden">
        @if ($post->image)
        <img src="{{ asset('storage/' .$post->image) }}" alt="Cover Photo">
        @else
        <img src="{{ asset('storage/posts_images/default.jpg') }}" alt="Default Cover Photo">
        @endif
    </div>

    {{--Title--}}
    <h2 class="font-bold text-xl truncate">{{ $post->title }}</h2>

    {{-- Author and date --}}
    <div class="text-xs font-light mb-4">
        <span>Posted {{ $post->created_at->diffForHumans() }} by</span>
        <a href="{{ route('posts.user', $post->user->id) }}" class="text-blue-500 font-medium">
            {{ $post->user->username }}
        </a>
    </div>

    {{-- Body --}}
    @if ($full)
        <div class="text-sm overflow-hidden text-ellipsis overflow-wrap break-words">
            <span>{{ $post->body }}</span>
        </div>
    @else
        <div class="text-sm overflow-hidden text-ellipsis overflow-wrap break-words">
            <span>{{ Str::words($post->body, 15) }}</span>
            <a href="{{ route('posts.show', $post) }}" class="text-blue-500 ml-2">Read More</a>
        </div>
    @endif

    <div class="flex items-center justify-end gap-4 mt-6">
        {{ $slot }}
    </div>
</div>
