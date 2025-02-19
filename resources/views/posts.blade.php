<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-xl border-b border-gray-300">
            <a href="/posts/{{ $post['slug'] }}" class="font-medium text-indigo-600 hover:underline">
                <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
            </a>
            <div class="text-base text-gray-500">
                By <a class="hover:underline text-base text-blue-500"
                    href="author/{{ $post->author->username }}">{{ $post->author->name }}</a>
                In <a class="hover:underline text-base text-blue-500"
                    href="category/{{ $post->category->slug }}">{{ $post->category->name }}</a>|
                {{ $post->created_at->diffForHumans() }}
            </div>
            <p class="my-4 font-light">
                {{ Str::limit($post['body'], 100) }}
            </p>
            <a href="/posts/{{ $post['slug'] }}" class="font-medium text-indigo-600 hover:underline">Read more
                &raquo;</a>
        </article>
    @endforeach

</x-layout>
