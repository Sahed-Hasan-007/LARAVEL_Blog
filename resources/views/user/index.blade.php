<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                {{ __('User Dashboard') }}
            </h2>
        </x-slot>

        <div>
            <section class="py-5">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-center p-4">
                        <div class="flex justify-center items-center w-48 h-16 rounded-md bg-gradient-to-tr from-indigo-600 via-pink-600 to-purple-600 p-0.5">
                            <div class="w-full h-full rounded-md bg-white  flex items-center justify-center">
                                <p class="text-2xl font-manrope font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-pink-600 to-purple-600">Our latest blog</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                        <!-- # Blog Card -->
                        @foreach ($posts as $post)
                        <div class="group border border-gray-300 rounded-2xl transform transition duration-500 hover:scale-105 hover:shadow-2xl flex flex-col">
                            <div class="flex items-center">
                                <img src="{{ asset('postImage/' . $post->image) }}" alt="blogs tailwind section"
                                    class="rounded-t-2xl w-full h-48 object-cover">
                            </div>
                            <div class="p-4 lg:p-6 transition-all duration-300 rounded-b-2xl flex flex-col justify-between flex-grow">
                                <div class="flex flex-wrap gap-2 mb-4">
                                    @foreach ($post->categories as $category)
                                    <span class="inline-block py-1 px-3 text-sm font-semibold text-white rounded-full"
                                        style="background-color: {{ $category->getRandomColor() }}">
                                        {{ $category->category_name }}
                                    </span>
                                    @endforeach
                                </div>
                                <div class="flex gap-2 mb-4">
                                    <div class="flex items-center gap-3 text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14c-3.31 0-6 2.69-6 6v1h12v-1c0-3.31-2.69-6-6-6z" fill="currentColor" />
                                        </svg>
                                        <span class="font-semibold">{{ $post->user_name }}</span>
                                    </div>
                                    <span class="text-indigo-600 font-medium block">[{{ $post->created_at }}]</span>
                                </div>
                                <h4 class="text-xl font-medium leading-8 mb-5 overflow-hidden line-clamp-2 text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-pink-600 to-purple-600">{{ $post->title }}</h4>
                                <p class="text-gray-500 leading-6 mb-10 overflow-hidden line-clamp-3">{{ $post->content }}</p>
                                <a href="{{ route('userViewPost', ['id' => $post->id]) }}" class="inline-flex items-center px-4 py-2 mr-48 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-black focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-75 transition duration-200 mt-auto">
                                    Explore
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @endforeach

                    </div> <!-- Close the grid -->

                    <!-- Pagination Component -->
                    <div class="flex justify-center mt-10">
                        {{ $posts->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </section>
        </div>
    </x-app-layout>
</body>

</html>