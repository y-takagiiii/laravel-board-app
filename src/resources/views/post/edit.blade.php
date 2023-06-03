<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            懺悔しなおす
        </h2>
    </x-slot>

    <x-input-error :messages="$errors->all()" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto pb-3 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font relative">
                        <form method="post" action="{{ route('post.update', $post->id) }}" >
                            @csrf
                            @method('patch')
                            <div class="container px-5 mx-auto">
                                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                    <div class="flex flex-wrap -m-2">
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
                                                <textarea id="title" name="title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 h-16 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('title' ,$post->title) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="response" class="leading-7 text-sm text-gray-600">レスポンス</label>
                                            <textarea id="response" name="response" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('response' ,$post->response) }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <button class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-700 rounded text-lg">更新する</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

