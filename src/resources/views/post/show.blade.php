<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            懺悔詳細
        </h2>
    </x-slot>

    <x-message :message="session('message')" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto pb-3 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <img src="{{ isset($post->user->profile_image) ? asset('storage/' . $post->user->profile_image) : asset('images/user_icon.png') }}" class="w-16 h-16 rounded-full object-cover border-none bg-gray-200">
                    {{ $post->user->name }}
                    {{ $post->created_at }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ $post->title }}<br>
                    {{ $post->response }}
                </div>
                <div class="p-6">
                    <div class="flex justify-end space-x-4">
                        @if ($post->user->id === Auth::user()->id)
                        <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">編集</a>
                        <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onClick="return confirm('本当に削除しますか?');">削除</button>
                        </form>
                        @else
                            @if (Auth::user()->favorited_post($post->id))
                                <form method="post" action="{{ route('unfavorite', $post) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">お気に入り解除</button>
                                </form>
                            @else
                                <form method="post" action="{{ route('favorite', $post) }}" >
                                    @csrf
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">お気に入り</button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
