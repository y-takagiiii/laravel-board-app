<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            懺悔一覧
        </h2>
    </x-slot>

    <x-message :message="session('message')" />

    <div class="py-12">
        @foreach ($posts as $post)
        <div class="max-w-7xl mx-auto pb-3 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <img src="{{ isset($post->user->profile_image) ? asset('storage/' . $post->user->profile_image) : asset('images/user_icon.png') }}" class="w-16 h-16 rounded-full object-cover border-none bg-gray-200">
                    {{ $post->user->name }}
                    {{ $post->created_at }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>{{ $post->title }}</div><br>
                    <div>{{ $post->response }}</div>
                </div>
                <div class="p-6">
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('post.show', ['post' => $post->id]) }}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">詳細</a>
                        @if ($post->user->id === Auth::user()->id)
                        <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">編集</a>
                        <form method="post" action="{{ route('post.destroy', ['post' => $post->id]) }}" >
                            @csrf
                            @method('delete')
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">削除</button>
                        </form>
                        @else
                        <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">お気に入り</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div>
            ページネーション
        </div>
    </div>
</x-app-layout>
