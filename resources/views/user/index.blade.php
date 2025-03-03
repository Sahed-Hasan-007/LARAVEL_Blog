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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Dashboard') }}
            </h2>
        </x-slot>

        <div>
            <section class="py-10">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <h2 class="font-manrope text-4xl font-bold text-gray-900 text-center mb-16">Our latest blog</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                        <!-- # Blog Card -->
                        @foreach ($posts as $post)
                        <div class="group border border-gray-300 rounded-2xl transform transition duration-500 hover:scale-105 hover:shadow-2xl">
                            <div class="flex items-center">
                                <img src="{{ asset('postImage/' . $post->image) }}" alt="blogs tailwind section"
                                    class="rounded-t-2xl w-full h-48 object-cover">
                            </div>
                            <div class="p-4 lg:p-6 transition-all duration-300 rounded-b-2xl group-hover:bg-gray-50">
                                <span class="text-indigo-600 font-medium mb-3 block">{{ $post->created_at }}</span>
                                <h4 class="text-xl text-gray-900 font-medium leading-8 mb-5">{{ $post->title }}</h4>
                                <p class="text-gray-500 leading-6 mb-10">{{ $post->content }}</p>
                                <a href="{{ route('userViewPost', ['id' => $post->id]) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-black focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-75 transition duration-200">
                                    Explore
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </section>


        </div>
    </x-app-layout>
</body>

</html>